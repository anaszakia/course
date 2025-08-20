<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class TransaksiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Pendaftaran::with(['user', 'kursus']);

        // Filter berdasarkan status jika ada
        if (isset($this->filters['status']) && $this->filters['status']) {
            $query->where('status', $this->filters['status']);
        } else {
            // Default hanya menampilkan transaksi yang sudah dibayar jika tidak ada filter status
            // dan ada filter kursus_id (untuk export peserta kursus)
            if (isset($this->filters['kursus_id']) && $this->filters['kursus_id']) {
                $query->where('status', 'paid');
            }
        }

        // Filter berdasarkan kursus_id jika ada
        if (isset($this->filters['kursus_id']) && $this->filters['kursus_id']) {
            $query->where('kursus_id', $this->filters['kursus_id']);
        }

        // Filter berdasarkan tanggal mulai jika ada
        if (isset($this->filters['start_date']) && $this->filters['start_date']) {
            $query->whereDate('created_at', '>=', $this->filters['start_date']);
        }

        // Filter berdasarkan tanggal selesai jika ada
        if (isset($this->filters['end_date']) && $this->filters['end_date']) {
            $query->whereDate('created_at', '<=', $this->filters['end_date']);
        }

        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * @var Pendaftaran $pendaftaran
     */
    public function map($pendaftaran): array
    {
        return [
            $pendaftaran->kode_pendaftaran ?? 'T-' . $pendaftaran->id,
            $pendaftaran->created_at->format('d/m/Y H:i:s'),
            $pendaftaran->nama,
            $pendaftaran->email,
            $pendaftaran->user ? $pendaftaran->user->name : '-',
            $pendaftaran->kursus ? $pendaftaran->kursus->nama : '-',
            'Rp ' . number_format($pendaftaran->total_bayar, 0, ',', '.'),
            $this->formatStatus($pendaftaran->status),
            $pendaftaran->transaction_id ?? '-',
            $pendaftaran->updated_at->format('d/m/Y H:i:s'),
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Pendaftaran',
            'Tanggal Pendaftaran',
            'Nama Pendaftar',
            'Email',
            'Akun User',
            'Kursus',
            'Total Bayar',
            'Status',
            'ID Transaksi',
            'Terakhir Update',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text
            1    => ['font' => ['bold' => true]],
        ];
    }

    private function formatStatus($status)
    {
        switch ($status) {
            case 'paid':
                return 'Terbayar';
            case 'pending':
                return 'Menunggu Pembayaran';
            case 'canceled':
                return 'Dibatalkan';
            default:
                return ucfirst($status);
        }
    }
}
