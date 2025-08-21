<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KursusController extends Controller
{
    /**
     * 📋 Tampilkan daftar kursus dengan pencarian dan paginasi
     */
    public function index(Request $request)
    {
        // Search dan pagination
        $keyword = $request->query('search');

        $kursus = Kursus::with('kategori')
            ->when($keyword, function ($q) use ($keyword) {
                $q->where(function ($q2) use ($keyword) {
                    $q2->where('nama', 'like', "%{$keyword}%")
                       ->orWhere('kode', 'like', "%{$keyword}%")
                       ->orWhere('deskripsi', 'like', "%{$keyword}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $keyword]);

        // Data untuk dropdown di form
        $kategoris = Kategori::orderBy('nama')->get();

        return view('admin.kursus.index', compact('kursus', 'keyword', 'kategoris'));
    }

    /**
     * 💾 Simpan kursus baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'kategoris_id' => 'required|exists:kategoris,id',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'rating' => 'nullable|numeric|min:0|max:5',
            'harga_asli' => 'nullable|numeric|min:0',
            'harga_diskon' => 'nullable|numeric|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'level' => 'required|in:pemula,menengah,lanjutan',
        ]);

        // Jika kode kosong, generate 5 digit angka random yang unik
        if (empty($validated['kode'])) {
            do {
                $validated['kode'] = str_pad(random_int(10000, 99999), 5, '0', STR_PAD_LEFT);
            } while (Kursus::where('kode', $validated['kode'])->exists());
        }

        // Upload thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        Kursus::create($validated);

        return back()->with('success', 'Kursus berhasil ditambahkan dengan kode: ' . $validated['kode']);
    }

    /**
     * ✏️ Update kursus yang ada
     */
    public function update(Request $request, $id)
    {
        try {
            // Cari kursus berdasarkan ID
            $kursus = Kursus::findOrFail($id);
            
            $validated = $request->validate([
                'nama' => 'required|max:255',
                'deskripsi' => 'nullable|string|max:500',
                'kategoris_id' => 'required|exists:kategoris,id',
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|in:aktif,nonaktif',
                'rating' => 'nullable|numeric|min:0|max:5',
                'harga_asli' => 'nullable|numeric|min:0',
                'harga_diskon' => 'nullable|numeric|min:0',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'level' => 'required|in:pemula,menengah,lanjutan',
            ]);

            // Handle upload thumbnail baru
            if ($request->hasFile('thumbnail')) {
                // Hapus thumbnail lama jika ada
                if ($kursus->thumbnail && Storage::disk('public')->exists($kursus->thumbnail)) {
                    Storage::disk('public')->delete($kursus->thumbnail);
                }

                $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
            }

            $kursus->update($validated);

            Log::info('Kursus updated', [
                'id' => $kursus->id,
                'kode' => $kursus->kode,
                'nama' => $kursus->nama
            ]);

            return back()->with('success', 'Kursus berhasil diperbarui!');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Kursus not found', ['id' => $id]);
            return back()->with('error', 'Kursus tidak ditemukan!');
        } catch (\Exception $e) {
            Log::error('Kursus update error', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Gagal mengupdate kursus: ' . $e->getMessage());
        }
    }

    /**
     * ✏️ Menampilkan form untuk mengedit kursus
     */
    public function edit($id)
    {
        try {
            // Cari kursus berdasarkan ID
            $kursus = Kursus::findOrFail($id);
            
            // Data untuk dropdown di form
            $kategoris = Kategori::orderBy('nama')->get();
            
            return view('admin.kursus.edit', compact('kursus', 'kategoris'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Kursus not found for edit', ['id' => $id]);
            return back()->with('error', 'Kursus tidak ditemukan!');
        } catch (\Exception $e) {
            Log::error('Error saat menampilkan form edit kursus', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Gagal menampilkan form edit: ' . $e->getMessage());
        }
    }

    /**
     * 🗑️ Hapus kursus
     */
    public function destroy($id)
    {
        try {
            // Cari kursus berdasarkan ID
            $kursus = Kursus::findOrFail($id);

            // Hapus thumbnail jika ada
            if ($kursus->thumbnail && Storage::disk('public')->exists($kursus->thumbnail)) {
                Storage::disk('public')->delete($kursus->thumbnail);
            }

            $kursus->delete();

            Log::info('Kursus deleted', [
                'id' => $kursus->id,
                'kode' => $kursus->kode,
                'nama' => $kursus->nama
            ]);

            return back()->with('success', 'Kursus berhasil dihapus!');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Kursus not found for delete', ['id' => $id]);
            return back()->with('error', 'Kursus tidak ditemukan!');
        } catch (\Exception $e) {
            Log::error('Kursus delete error', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Gagal menghapus kursus: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan daftar peserta yang terdaftar dan telah membayar pada suatu kursus
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function peserta($id)
    {
        try {
            // Ambil data kursus beserta dengan pendaftaran yang memiliki status paid
            $kursus = Kursus::with(['pendaftaran' => function ($query) {
                $query->where('status', 'paid');
            }])->findOrFail($id);

            // Log aktivitas
            Log::info('Admin melihat daftar peserta kursus', [
                'admin_id' => auth()->id(),
                'kursus_id' => $id,
                'kursus_nama' => $kursus->nama
            ]);

            return view('admin.kursus.peserta', compact('kursus'));
        } catch (\Exception $e) {
            Log::error('Error saat menampilkan peserta kursus', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Gagal menampilkan daftar peserta: ' . $e->getMessage());
        }
    }
}