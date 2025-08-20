<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        //search and pagination
        $keyword = $request->query('search');

        $kategoris = Kategori::query()
            ->when($keyword, function ($q) use ($keyword) {
                $q->where(function ($q2) use ($keyword) {
                    $q2->where('nama',  'like', "%{$keyword}%")
                    ->orWhere('kode', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(5)
            ->appends(['search' => $keyword]);

        return view('admin.kategori.index', compact('kategoris', 'keyword'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'      => 'nullable',
            'nama'     => 'required|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        // Jika kode kosong, generate 5 digit angka random
        if (empty($validated['kode'])) {
            $validated['kode'] = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        }

        Kategori::create($validated);

        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'kode'      => 'required',
            'nama'     => 'required|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $kategori->update($validated);

        return back()->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}