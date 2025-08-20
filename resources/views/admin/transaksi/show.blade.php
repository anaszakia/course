@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-6">
        <h1 class="text-3xl font-bold text-gray-900">Detail Transaksi</h1>
        
        <!-- Breadcrumb -->
        <nav class="flex mt-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('admin.transaksi.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Transaksi</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500">Detail</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-md p-4" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" onclick="this.parentElement.parentElement.parentElement.parentElement.style.display='none'" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Transaction Information -->
            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900">Informasi Transaksi</h3>
                        </div>
                        <a href="{{ route('admin.transaksi.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Transaction Details -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Detail Transaksi</h4>
                            <dl class="space-y-3">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">ID Transaksi</dt>
                                    <dd class="text-sm text-gray-900">{{ $transaksi->id }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Kode Pendaftaran</dt>
                                    <dd class="text-sm text-gray-900 font-mono">{{ $transaksi->kode_pendaftaran ?? 'T-' . $transaksi->id }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Tanggal Pendaftaran</dt>
                                    <dd class="text-sm text-gray-900">{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</dd>
                                </div>
                                <div class="flex justify-between items-center">
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="text-sm">
                                        @if($transaksi->status == 'paid')
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Terbayar
                                            </span>
                                        @elseif($transaksi->status == 'pending')
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Menunggu Pembayaran
                                            </span>
                                        @else
                                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                Dibatalkan
                                            </span>
                                        @endif
                                    </dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Total Bayar</dt>
                                    <dd class="text-sm font-bold text-green-600">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Transaction ID</dt>
                                    <dd class="text-sm text-gray-900 font-mono">{{ $transaksi->transaction_id ?? '-' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Customer Details -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pelanggan</h4>
                            <dl class="space-y-3">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Nama</dt>
                                    <dd class="text-sm text-gray-900">{{ $transaksi->nama }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                    <dd class="text-sm text-gray-900">{{ $transaksi->email }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">No. HP</dt>
                                    <dd class="text-sm text-gray-900">{{ $transaksi->no_hp ?? '-' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-gray-500">Akun User</dt>
                                    <dd class="text-sm">
                                        @if($transaksi->user)
                                            <a href="{{ route('admin.users.show', $transaksi->user_id) }}" class="text-blue-600 hover:text-blue-800 transition-colors">
                                                {{ $transaksi->user->name }}
                                            </a>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <!-- Course Details -->
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-6">Detail Kursus</h4>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Nama Kursus</dt>
                                    <dd class="text-sm">
                                        @if($transaksi->kursus)
                                            <a href="{{ route('admin.kursus.show', $transaksi->kursus_id) }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                                                {{ $transaksi->kursus->nama }}
                                            </a>
                                        @else
                                            <span class="text-red-500">Data kursus tidak ditemukan</span>
                                        @endif
                                    </dd>
                                </div>
                                
                                @if($transaksi->kursus)
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 mb-1">Kategori</dt>
                                        <dd class="text-sm text-gray-900">{{ $transaksi->kursus->kategori->nama ?? '-' }}</dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 mb-1">Level</dt>
                                        <dd class="text-sm text-gray-900">
                                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-800">
                                                {{ ucfirst($transaksi->kursus->level) }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div>
                                        <dt class="text-sm font-medium text-gray-500 mb-1">Periode</dt>
                                        <dd class="text-sm text-gray-900">
                                            <div class="flex items-center space-x-2">
                                                <span>{{ \Carbon\Carbon::parse($transaksi->kursus->tanggal_mulai)->format('d-m-Y') }}</span>
                                                <span class="text-gray-400">s/d</span>
                                                <span>{{ \Carbon\Carbon::parse($transaksi->kursus->tanggal_selesai)->format('d-m-Y') }}</span>
                                            </div>
                                        </dd>
                                    </div>
                                @endif
                                
                                <div class="md:col-span-2">
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Catatan</dt>
                                    <dd class="text-sm text-gray-900">
                                        @if($transaksi->catatan)
                                            <p class="bg-white p-3 rounded border">{{ $transaksi->catatan }}</p>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Actions -->
            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">Aksi</h3>
                    </div>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.transaksi.updateStatus', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Ubah Status</label>
                            <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                <option value="paid" {{ $transaksi->status == 'paid' ? 'selected' : '' }}>Terbayar</option>
                                <option value="canceled" {{ $transaksi->status == 'canceled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Timeline / History -->
            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900">Riwayat</h3>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flow-root">
                        <ul role="list" class="-mb-8">
                            <!-- Registration Created -->
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-900">Pendaftaran Dibuat</span>
                                                </div>
                                                <p class="mt-0.5 text-sm text-gray-500">{{ $transaksi->created_at->format('d-m-Y H:i:s') }}</p>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-700">
                                                <p>Pendaftaran untuk kursus <span class="font-medium">{{ $transaksi->kursus->nama ?? 'Tidak tersedia' }}</span> berhasil dibuat.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Status Update -->
                            @if($transaksi->updated_at->gt($transaksi->created_at))
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full {{ $transaksi->status == 'paid' ? 'bg-green-500' : ($transaksi->status == 'canceled' ? 'bg-red-500' : 'bg-yellow-500') }} flex items-center justify-center ring-8 ring-white">
                                                @if($transaksi->status == 'paid')
                                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                    </svg>
                                                @elseif($transaksi->status == 'canceled')
                                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                @else
                                                    <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-900">Status Diperbarui: </span>
                                                    @if($transaksi->status == 'paid')
                                                        <span class="text-green-600 font-medium">Terbayar</span>
                                                    @elseif($transaksi->status == 'pending')
                                                        <span class="text-yellow-600 font-medium">Menunggu Pembayaran</span>
                                                    @else
                                                        <span class="text-red-600 font-medium">Dibatalkan</span>
                                                    @endif
                                                </div>
                                                <p class="mt-0.5 text-sm text-gray-500">{{ $transaksi->updated_at->format('d-m-Y H:i:s') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif

                            <!-- Payment Received -->
                            @if($transaksi->transaction_id)
                            <li>
                                <div class="relative pb-8">
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-900">Pembayaran Diterima</span>
                                                </div>
                                                <p class="mt-0.5 text-sm text-gray-500 font-mono">ID: {{ $transaksi->transaction_id }}</p>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-700">
                                                <p>Total pembayaran: <span class="font-semibold text-green-600">Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif

                            <!-- Audit Logs -->
                            @php
                                $auditLogs = \App\Models\AuditLog::where('log_name', 'transaction')
                                    ->where('subject_id', $transaksi->id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
                            @endphp
                            
                            @foreach($auditLogs as $log)
                            <li>
                                <div class="relative {{ !$loop->last ? 'pb-8' : '' }}">
                                    @if(!$loop->last)
                                        <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    @endif
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-900">{{ $log->description }}</span>
                                                </div>
                                                <p class="mt-0.5 text-sm text-gray-500">{{ $log->created_at->format('d-m-Y H:i:s') }}</p>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-700">
                                                <p>Oleh: <span class="font-medium">{{ optional($log->causer)->name ?? 'System' }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom scrollbar for better appearance */
.overflow-x-auto::-webkit-scrollbar {
    height: 8px;
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f5f9;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

.overflow-x-auto::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Smooth transitions */
* {
    transition: all 0.2s ease-in-out;
}

/* Focus states for better accessibility */
.focus\:ring-blue-500:focus {
    --tw-ring-color: rgb(59 130 246 / 0.5);
}

/* Custom badge animations */
@keyframes badge-pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

.animate-badge-pulse {
    animation: badge-pulse 2s ease-in-out infinite;
}

/* Status-specific styling */
.status-paid {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

.status-pending {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
}

.status-canceled {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
}

/* Timeline enhancements */
.timeline-marker {
    box-shadow: 0 0 0 3px white, 0 0 0 6px #e5e7eb;
}

/* Card hover effects */
.card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Button loading state */
.btn-loading {
    position: relative;
    pointer-events: none;
}

.btn-loading::after {
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    margin: auto;
    border: 2px solid transparent;
    border-top-color: #ffffff;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive improvements */
@media (max-width: 640px) {
    .grid-cols-1.md\:grid-cols-2 {
        gap: 1rem;
    }
    
    .px-6 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem;
    }
}

/* Print styles */
@media print {
    .no-print {
        display: none !important;
    }
    
    body {
        print-color-adjust: exact;
    }
    
    .bg-white {
        background-color: white !important;
    }
    
    .text-gray-900 {
        color: black !important;
    }
    
    .shadow-lg {
        box-shadow: none !important;
        border: 1px solid #e5e7eb !important;
    }
}

/* Dark mode support (if needed) */
@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: rgb(31 41 55);
    }
    
    .dark\:text-white {
        color: rgb(255 255 255);
    }
    
    .dark\:border-gray-700 {
        border-color: rgb(55 65 81);
    }
}

/* Loading states for AJAX updates */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f4f6;
    border-top: 4px solid #3b82f6;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Success/Error message animations */
.alert-slide-in {
    animation: slideInDown 0.3s ease-out;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translate3d(0, -100%, 0);
    }
    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}

.alert-fade-out {
    animation: fadeOut 0.3s ease-out forwards;
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
        transform: translateY(-10px);
    }
}
</style>

<script>
// Auto-hide success messages
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('[role="alert"]');
    alerts.forEach(alert => {
        // Add slide-in animation
        alert.classList.add('alert-slide-in');
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            alert.classList.add('alert-fade-out');
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 5000);
    });
});

// Form submission with loading state
document.querySelector('form').addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.classList.add('btn-loading');
    submitBtn.disabled = true;
    
    // Create loading overlay
    const overlay = document.createElement('div');
    overlay.className = 'loading-overlay';
    overlay.innerHTML = '<div class="spinner"></div>';
    this.style.position = 'relative';
    this.appendChild(overlay);
});

// Print functionality
function printTransaction() {
    // Hide non-essential elements
    document.querySelectorAll('.no-print, nav, .sidebar').forEach(el => {
        el.style.display = 'none';
    });
    
    window.print();
    
    // Restore elements
    document.querySelectorAll('.no-print, nav, .sidebar').forEach(el => {
        el.style.display = '';
    });
}

// Copy transaction ID to clipboard
function copyTransactionId() {
    const transactionId = '{{ $transaksi->kode_pendaftaran ?? "T-" . $transaksi->id }}';
    navigator.clipboard.writeText(transactionId).then(() => {
        // Show success message
        const message = document.createElement('div');
        message.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg z-50';
        message.textContent = 'Kode pendaftaran disalin!';
        document.body.appendChild(message);
        
        setTimeout(() => {
            message.remove();
        }, 2000);
    });
}

// Status update confirmation
document.querySelector('select[name="status"]').addEventListener('change', function() {
    const currentStatus = '{{ $transaksi->status }}';
    const newStatus = this.value;
    
    if (currentStatus !== newStatus) {
        const confirmation = confirm('Apakah Anda yakin ingin mengubah status transaksi ini?');
        if (!confirmation) {
            this.value = currentStatus; // Reset to original value
        }
    }
});

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl+P for print
    if (e.ctrlKey && e.key === 'p') {
        e.preventDefault();
        printTransaction();
    }
    
    // Escape to go back
    if (e.key === 'Escape') {
        window.location.href = '{{ route("admin.transaksi.index") }}';
    }
});

// Tooltips for status badges
const statusBadges = document.querySelectorAll('[data-tooltip]');
statusBadges.forEach(badge => {
    badge.addEventListener('mouseenter', function() {
        // Create tooltip implementation if needed
    });
});

// Real-time status updates (if WebSockets are available)
if (typeof window.Echo !== 'undefined') {
    window.Echo.channel('transaction-updates')
        .listen('TransactionStatusUpdated', (e) => {
            if (e.transactionId === {{ $transaksi->id }}) {
                // Update status badge and timeline
                location.reload();
            }
        });
}

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Mobile menu toggle (if needed)
function toggleMobileMenu() {
    const menu = document.querySelector('.mobile-menu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

// Initialize any third-party libraries
document.addEventListener('DOMContentLoaded', function() {
    // Initialize date pickers, modals, or other components here
    console.log('Transaction detail page loaded');
});
</script>
@endsection