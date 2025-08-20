<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pendaftaran;
use App\Exports\TransaksiExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Log akses ke halaman ini
        Log::info('Admin mengakses daftar transaksi', [
            'admin_id' => auth()->id(),
        ]);

        // Filter untuk pencarian
        $status = $request->status;
        $keyword = $request->keyword;
        
        // Query dasar dengan eager loading
        $query = Pendaftaran::with(['user', 'kursus'])
            ->orderBy('created_at', 'desc');

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }

        // Filter berdasarkan keyword jika ada
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('kode_pendaftaran', 'like', "%$keyword%")
                  ->orWhere('nama', 'like', "%$keyword%")
                  ->orWhere('email', 'like', "%$keyword%")
                  ->orWhere('transaction_id', 'like', "%$keyword%")
                  ->orWhereHas('user', function ($q) use ($keyword) {
                      $q->where('name', 'like', "%$keyword%")
                        ->orWhere('email', 'like', "%$keyword%");
                  })
                  ->orWhereHas('kursus', function ($q) use ($keyword) {
                      $q->where('nama', 'like', "%$keyword%");
                  });
            });
        }

        // Paginate hasil
        $transaksi = $query->paginate(15);

        // Hitung total pendapatan berdasarkan transaksi yang sudah terbayar
        $totalPendapatan = Pendaftaran::where('status', 'paid')->sum('total_bayar');

        // Hitung jumlah transaksi per status
        $countByStatus = [
            'all' => Pendaftaran::count(),
            'pending' => Pendaftaran::where('status', 'pending')->count(),
            'paid' => Pendaftaran::where('status', 'paid')->count(),
            'canceled' => Pendaftaran::where('status', 'canceled')->count(),
        ];

        // Return view dengan data
        return view('admin.transaksi.index', compact(
            'transaksi',
            'totalPendapatan',
            'countByStatus',
            'status',
            'keyword'
        ));
    }

    /**
     * Display the specified transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Pendaftaran::with(['user', 'kursus'])
            ->findOrFail($id);

        // Log akses detail transaksi
        Log::info('Admin melihat detail transaksi', [
            'admin_id' => auth()->id(),
            'transaksi_id' => $id
        ]);

        return view('admin.transaksi.show', compact('transaksi'));
    }

    /**
     * Update the status of the transaction.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'status' => 'required|in:pending,paid,canceled',
        ]);

        $transaksi = Pendaftaran::findOrFail($id);
        $oldStatus = $transaksi->status;
        
        // Update status
        $transaksi->update([
            'status' => $request->status,
        ]);

        // Log perubahan status
        Log::info('Admin mengubah status transaksi', [
            'admin_id' => auth()->id(),
            'transaksi_id' => $id,
            'status_lama' => $oldStatus,
            'status_baru' => $request->status
        ]);
        
        // Tambahkan ke AuditLog
        \App\Models\AuditLog::create([
            'log_name' => 'transaction',
            'description' => 'Status transaksi diubah dari ' . ucfirst($oldStatus) . ' menjadi ' . ucfirst($request->status),
            'subject_type' => 'App\Models\Pendaftaran',
            'subject_id' => $id,
            'causer_type' => 'App\Models\User',
            'causer_id' => auth()->id(),
            'properties' => json_encode([
                'old_status' => $oldStatus,
                'new_status' => $request->status,
                'transaction_id' => $transaksi->transaction_id,
                'total' => $transaksi->total_bayar
            ])
        ]);

        return redirect()->route('admin.transaksi.show', $id)
            ->with('success', "Status transaksi berhasil diubah menjadi " . ucfirst($request->status));
    }

    /**
     * Export transactions to Excel/CSV.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        // Validasi request
        $filters = [
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'kursus_id' => $request->kursus_id, // Tambahkan filter berdasarkan kursus_id
        ];

        // Log aktivitas export
        Log::info('Admin mengexport data transaksi', [
            'admin_id' => auth()->id(),
            'filters' => $filters
        ]);

        // Buat nama file yang sesuai
        $filename = 'transaksi_' . date('Y-m-d');
        if ($request->kursus_id) {
            $kursus = \App\Models\Kursus::find($request->kursus_id);
            if ($kursus) {
                $filename = 'peserta_' . \Str::slug($kursus->nama) . '_' . date('Y-m-d');
            }
        }

        // Gunakan TransaksiExport untuk export data
        return Excel::download(new TransaksiExport($filters), $filename . '.xlsx');
    }
}
