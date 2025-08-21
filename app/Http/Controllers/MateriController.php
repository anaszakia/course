<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MateriController extends Controller
{
    /**
     * Display a listing of the materials for a course.
     */
    public function index($kursus_id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $materis = Materi::where('kursus_id', $kursus_id)->orderBy('urutan', 'asc')->get();
        
        return view('admin.materi.index', compact('kursus', 'materis'));
    }

    /**
     * Show the form for creating a new material.
     */
    public function create($kursus_id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        return view('admin.materi.create', compact('kursus'));
    }

    /**
     * Store a newly created material in storage.
     */
    public function store(Request $request, $kursus_id)
    {
        // Debug: Check what's being sent
        // dd($request->all()); // Uncomment this to debug
        
        $rules = [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:file,link',
            'urutan' => 'required|integer|min:1',
        ];

        // Add conditional rules based on type
        if ($request->tipe == 'file') {
            $rules['file'] = 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240';
        } elseif ($request->tipe == 'link') {
            $rules['link_url'] = 'required|url';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $materi = new Materi();
        $materi->kursus_id = $kursus_id;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->tipe = $request->tipe;
        $materi->urutan = $request->urutan;

        if ($request->tipe == 'file' && $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('materis', $fileName, 'public');
            $materi->file_path = $filePath;
            $materi->file_type = $file->getClientOriginalExtension();
        } else if ($request->tipe == 'link') {
            $materi->link_url = $request->link_url;
        }

        $materi->save();

        return redirect()->route('admin.materi.index', $kursus_id)->with('success', 'Materi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified material.
     */
    public function edit($kursus_id, $id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $materi = Materi::findOrFail($id);
        
        return view('admin.materi.edit', compact('kursus', 'materi'));
    }

    /**
     * Update the specified material in storage.
     */
    public function update(Request $request, $kursus_id, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|in:file,link',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:10240',
            'link_url' => 'required_if:tipe,link|url',
            'urutan' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $materi = Materi::findOrFail($id);
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->tipe = $request->tipe;
        $materi->urutan = $request->urutan;

        if ($request->tipe == 'file' && $request->hasFile('file')) {
            // Delete old file if exists
            if ($materi->file_path) {
                Storage::disk('public')->delete($materi->file_path);
            }
            
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('materis', $fileName, 'public');
            
            $materi->file_path = $filePath;
            $materi->file_type = $file->getClientOriginalExtension();
            $materi->link_url = null;
        } else if ($request->tipe == 'link') {
            // Delete old file if exists and type changed
            if ($materi->tipe == 'file' && $materi->file_path) {
                Storage::disk('public')->delete($materi->file_path);
            }
            
            $materi->link_url = $request->link_url;
            $materi->file_path = null;
            $materi->file_type = null;
        }

        $materi->save();

        return redirect()->route('admin.materi.index', $kursus_id)->with('success', 'Materi berhasil diperbarui');
    }

    /**
     * Remove the specified material from storage.
     */
    public function destroy($kursus_id, $id)
    {
        $materi = Materi::findOrFail($id);
        
        // Delete file if exists
        if ($materi->tipe == 'file' && $materi->file_path) {
            Storage::disk('public')->delete($materi->file_path);
        }
        
        $materi->delete();
        
        return redirect()->route('admin.materi.index', $kursus_id)->with('success', 'Materi berhasil dihapus');
    }
}
