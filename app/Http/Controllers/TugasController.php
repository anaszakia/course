<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TugasController extends Controller
{
    /**
     * Display a listing of the assignments for a course.
     */
    public function index($kursus_id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $tugases = Tugas::where('kursus_id', $kursus_id)->get();
        
        return view('admin.tugas.index', compact('kursus', 'tugases'));
    }

    /**
     * Show the form for creating a new assignment.
     */
    public function create($kursus_id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        return view('admin.tugas.create', compact('kursus'));
    }

    /**
     * Store a newly created assignment in storage.
     */
    public function store(Request $request, $kursus_id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filePath = null;
        $fileType = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('tugas', 'public');
            $fileType = $file->getClientOriginalExtension();
        }

        Tugas::create([
            'kursus_id' => $kursus_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return redirect()->route('admin.tugas.index', $kursus_id)->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified assignment.
     */
    public function edit($kursus_id, $id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $tugas = Tugas::findOrFail($id);
        
        return view('admin.tugas.edit', compact('kursus', 'tugas'));
    }

    /**
     * Update the specified assignment in storage.
     */
    public function update(Request $request, $kursus_id, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'batas_waktu' => 'nullable|date',
            'file' => 'nullable|file|max:10240', // Max 10MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tugas = Tugas::findOrFail($id);
        
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'batas_waktu' => $request->batas_waktu,
        ];
        
        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($tugas->file_path) {
                Storage::disk('public')->delete($tugas->file_path);
            }
            
            $file = $request->file('file');
            $data['file_path'] = $file->store('tugas', 'public');
            $data['file_type'] = $file->getClientOriginalExtension();
        }
        
        $tugas->update($data);

        return redirect()->route('admin.tugas.index', $kursus_id)->with('success', 'Tugas berhasil diperbarui');
    }

    /**
     * Remove the specified assignment from storage.
     */
    public function destroy($kursus_id, $id)
    {
        $tugas = Tugas::findOrFail($id);
        
        // Delete all submissions related to this assignment first
        foreach($tugas->pengumpulan as $submission) {
            if ($submission->file_path) {
                Storage::disk('public')->delete($submission->file_path);
            }
            $submission->delete();
        }
        
        $tugas->delete();
        
        return redirect()->route('admin.tugas.index', $kursus_id)->with('success', 'Tugas berhasil dihapus');
    }
    
    /**
     * Display a listing of submissions for an assignment.
     */
    public function submissions($kursus_id, $id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $tugas = Tugas::findOrFail($id);
        $submissions = PengumpulanTugas::where('tugas_id', $id)->with('user')->get();
        
        return view('admin.tugas.submissions', compact('kursus', 'tugas', 'submissions'));
    }
    
    /**
     * Show the form for grading a submission.
     */
    public function showGradeForm($kursus_id, $tugas_id, $submission_id)
    {
        $kursus = Kursus::findOrFail($kursus_id);
        $tugas = Tugas::findOrFail($tugas_id);
        $submission = PengumpulanTugas::with('user')->findOrFail($submission_id);
        
        return view('admin.tugas.grade', compact('kursus', 'tugas', 'submission'));
    }

    /**
     * Grade a submission.
     */
    public function grade(Request $request, $kursus_id, $tugas_id, $submission_id)
    {
        $validator = Validator::make($request->all(), [
            'nilai' => 'required|integer|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $submission = PengumpulanTugas::findOrFail($submission_id);
        $submission->update([
            'nilai' => $request->nilai,
            'feedback' => $request->feedback,
            'status' => 'graded'
        ]);

        return redirect()->route('admin.tugas.submissions', [$kursus_id, $tugas_id])
            ->with('success', 'Nilai berhasil diberikan');
    }
}
