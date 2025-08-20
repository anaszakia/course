@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Transaksi</h1>
        
        <!-- Breadcrumb -->
        <nav class="flex mt-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500">Transaksi</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Data Table -->
    <div class="bg-white rounded-lg shadow-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">Data Transaksi</h3>
                </div>
                <button type="button" onclick="openExportModal()" class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Export Data
                </button>
            </div>
        </div>
        
        <div class="p-6">
            <!-- Filter Form -->
            <div class="mb-6">
                <form action="{{ route('admin.transaksi.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
                    <div class="flex-1">
                        <input type="text" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Cari nama, email, kode..." 
                               name="keyword" 
                               value="{{ $keyword ?? '' }}">
                    </div>
                    <div class="sm:w-48">
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" name="status">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                            <option value="paid" {{ $status == 'paid' ? 'selected' : '' }}>Terbayar</option>
                            <option value="canceled" {{ $status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors" type="submit">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                            Filter
                        </button>
                        @if($keyword || $status)
                            <a href="{{ route('admin.transaksi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-700 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path>
                                </svg>
                                Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kursus</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($transaksi as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kode_pendaftaran ?? 'T-' . $item->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->nama }}</div>
                                    <div class="text-sm text-gray-500">{{ $item->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $item->kursus->nama ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->status == 'paid')
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                            Terbayar
                                        </span>
                                    @elseif($item->status == 'pending')
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Menunggu
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                            Dibatalkan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="showTransactionDetail({{ json_encode($item) }})" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded hover:bg-blue-200 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        Lihat
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada data transaksi</h3>
                                        <p class="text-gray-500">Belum ada transaksi yang tersedia untuk ditampilkan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-end mt-6">
                {{ $transaksi->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Export Modal -->
<div id="exportModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="{{ route('admin.transaksi.export') }}" method="POST">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Export Data Transaksi</h3>
                        
                        <div class="mb-4">
                            <label for="exportStatus" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="exportStatus" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Semua Status</option>
                                <option value="pending">Menunggu Pembayaran</option>
                                <option value="paid">Terbayar</option>
                                <option value="canceled">Dibatalkan</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" id="start_date" name="start_date">
                        </div>
                        
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" id="end_date" name="end_date">
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center items-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Download
                    </button>
                    <button type="button" onclick="closeExportModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <div class="bg-white px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">Detail Transaksi</h3>
                    <button type="button" onclick="closeDetailModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="bg-white px-6 py-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Transaction Info -->
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Informasi Transaksi</h4>
                        <dl class="space-y-3">
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">ID Transaksi</dt>
                                <dd class="text-sm text-gray-900 font-medium" id="detail-id"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Kode Pendaftaran</dt>
                                <dd class="text-sm text-gray-900 font-mono" id="detail-kode"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Tanggal</dt>
                                <dd class="text-sm text-gray-900" id="detail-tanggal"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Status</dt>
                                <dd class="text-sm" id="detail-status"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Total Bayar</dt>
                                <dd class="text-sm font-bold text-green-600" id="detail-total"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Transaction ID</dt>
                                <dd class="text-sm text-gray-900 font-mono" id="detail-transaction-id"></dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Customer Info -->
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Informasi Pelanggan</h4>
                        <dl class="space-y-3">
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Nama</dt>
                                <dd class="text-sm text-gray-900 font-medium" id="detail-nama"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">Email</dt>
                                <dd class="text-sm text-gray-900" id="detail-email"></dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-sm text-gray-500">No. HP</dt>
                                <dd class="text-sm text-gray-900" id="detail-hp"></dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Course Info -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Informasi Kursus</h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-500 mb-1">Nama Kursus</dt>
                                <dd class="text-sm text-gray-900 font-medium" id="detail-kursus"></dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500 mb-1">Kategori</dt>
                                <dd class="text-sm text-gray-900" id="detail-kategori"></dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500 mb-1">Level</dt>
                                <dd class="text-sm text-gray-900" id="detail-level"></dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500 mb-1">Periode</dt>
                                <dd class="text-sm text-gray-900" id="detail-periode"></dd>
                            </div>
                        </dl>
                        <div class="mt-4">
                            <dt class="text-sm text-gray-500 mb-1">Catatan</dt>
                            <dd class="text-sm text-gray-900" id="detail-catatan"></dd>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex justify-end">
                    <button type="button" onclick="closeDetailModal()" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openExportModal() {
    document.getElementById('exportModal').classList.remove('hidden');
}

function closeExportModal() {
    document.getElementById('exportModal').classList.add('hidden');
}

function showTransactionDetail(transaction) {
    document.getElementById('detailModal').classList.remove('hidden');
    
    // Fill transaction details
    document.getElementById('detail-id').textContent = transaction.id;
    document.getElementById('detail-kode').textContent = transaction.kode_pendaftaran || 'T-' + transaction.id;
    document.getElementById('detail-tanggal').textContent = formatDate(transaction.created_at);
    document.getElementById('detail-total').textContent = 'Rp ' + formatCurrency(transaction.total_bayar);
    document.getElementById('detail-transaction-id').textContent = transaction.transaction_id || '-';
    
    // Fill customer details
    document.getElementById('detail-nama').textContent = transaction.nama;
    document.getElementById('detail-email').textContent = transaction.email;
    document.getElementById('detail-hp').textContent = transaction.no_hp || '-';
    
    // Fill course details
    document.getElementById('detail-kursus').textContent = transaction.kursus ? transaction.kursus.nama : 'N/A';
    document.getElementById('detail-kategori').textContent = transaction.kursus && transaction.kursus.kategori ? transaction.kursus.kategori.nama : '-';
    document.getElementById('detail-level').textContent = transaction.kursus ? capitalizeFirst(transaction.kursus.level) : '-';
    
    if (transaction.kursus) {
        const startDate = formatDateOnly(transaction.kursus.tanggal_mulai);
        const endDate = formatDateOnly(transaction.kursus.tanggal_selesai);
        document.getElementById('detail-periode').textContent = startDate + ' s/d ' + endDate;
    } else {
        document.getElementById('detail-periode').textContent = '-';
    }
    
    document.getElementById('detail-catatan').textContent = transaction.catatan || '-';
    
    // Set status (read-only)
    const statusElement = document.getElementById('detail-status');
    
    if (transaction.status === 'paid') {
        statusElement.innerHTML = '<span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">✓ Terbayar</span>';
    } else if (transaction.status === 'pending') {
        statusElement.innerHTML = '<span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">⏳ Menunggu Pembayaran</span>';
    } else if (transaction.status === 'canceled') {
        statusElement.innerHTML = '<span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">✗ Dibatalkan</span>';
    } else {
        statusElement.innerHTML = '<span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">' + transaction.status + '</span>';
    }
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', {
        day: '2-digit',
        month: '2-digit', 
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });
}

function formatDateOnly(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });
}

function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID').format(amount);
}

function capitalizeFirst(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Close modals when clicking outside
document.getElementById('exportModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeExportModal();
    }
});

document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailModal();
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Close modal with Escape key
    if (e.key === 'Escape') {
        closeDetailModal();
        closeExportModal();
    }
});

// Copy transaction code to clipboard
function copyTransactionCode(code) {
    navigator.clipboard.writeText(code).then(function() {
        // Show success message
        showToast('Kode transaksi berhasil disalin!', 'success');
    });
}

// Simple toast notification
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300 ${
        type === 'success' ? 'bg-green-500 text-white' : 
        type === 'error' ? 'bg-red-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Animate in
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
        toast.style.opacity = '1';
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)';
        toast.style.opacity = '0';
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}
</script>
@endsection