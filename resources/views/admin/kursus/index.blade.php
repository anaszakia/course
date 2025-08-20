@extends('layouts.app')
@section('title', 'Manajemen Kursus')

@section('content')
<div x-data="{ 
    openCreate: false,
    editModals: {},
    detailModals: {},
    toggleModal(type, kursusId = null) {
        if (type === 'create') {
            this.openCreate = !this.openCreate;
            document.body.style.overflow = this.openCreate ? 'hidden' : '';
        } else {
            this[type + 'Modals'][kursusId] = !this[type + 'Modals'][kursusId];
            document.body.style.overflow = this[type + 'Modals'][kursusId] ? 'hidden' : '';
        }
    }
}" class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->role === 'admin' ? 'Manajemen Kursus' : 'Daftar Kursus' }}</h1>
                <p class="text-sm text-gray-500 mt-1">{{ auth()->user()->role === 'admin' ? 'Kelola kursus sistem' : 'Informasi kursus sistem' }}</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                {{-- Search Form --}}
                <form method="GET" action="{{ auth()->user()->role === 'admin' ? route('admin.kursus.index') : route('user.kursus.index') }}" class="flex gap-2">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, kode..."
                               class="border-gray-300 rounded-lg px-4 py-2.5 text-sm w-64 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm px-4 py-2.5 rounded-lg transition-colors font-medium">Cari</button>
                </form>
                {{-- Add Button --}}
                @if(auth()->user()->role === 'admin')
                <button @click="toggleModal('create')" class="bg-blue-600 text-white px-4 py-2.5 rounded-lg hover:bg-blue-700 transition-colors font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Kursus
                </button>
                @endif
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Level</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rating</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga Asli</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga Diskon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Mulai</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Selesai</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($kursus as $kursus)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $kursus->kode }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $kursus->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $kursus->deskripsi }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $kursus->kategori->nama ?? '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $kursus->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($kursus->status) }}
                            </span>
                        </td>
                       <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold 
                                {{ $kursus->level === 'pemula' ? 'bg-green-100 text-green-800' : 
                                ($kursus->level === 'menengah' ? 'bg-yellow-100 text-yellow-800' : 
                                'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($kursus->level) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $kursus->rating >= 4 ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $kursus->rating }} <svg class="w-3 h-3 inline-block ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-3.09 1.626a1 1 0 01-1.45-1.054l.59-3.44L3.18 9.09a1 1 0 01.56-1.71l3.47-.504L8.5 4.18a1 1 0 011.79 0l1.29 2.69 3.47.504a1 1 0 01.56 1.71l-2.53 2.032.59 3.44a1 1 0 01-1.45 1.054L10 15z"/></svg>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Rp. {{ number_format($kursus->harga_asli, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            @if($kursus->harga_diskon)
                                Rp. {{ number_format($kursus->harga_diskon, 0, ',', '.') }}
                            @else
                                <span class="text-gray-400">Tidak ada diskon</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            @if($kursus->tanggal_mulai)
                                {{ \Carbon\Carbon::parse($kursus->tanggal_mulai)->format('d M Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            @if($kursus->tanggal_selesai)
                                {{ \Carbon\Carbon::parse($kursus->tanggal_selesai)->format('d M Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <div class="flex items-center space-x-2">
                                <button @click="toggleModal('detail', {{ $kursus->id }})" title="Detail"
                                        class="inline-flex items-center p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.kursus.peserta', $kursus->id) }}" title="Lihat Peserta"
                                   class="inline-flex items-center p-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </a>
                                <button @click="toggleModal('edit', {{ $kursus->id }})" title="Edit"
                                        class="inline-flex items-center p-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <form action="{{ route('admin.kursus.destroy', $kursus) }}" method="POST" class="inline delete-form">
                                    @csrf @method('DELETE')
                                    <button type="button" title="Hapus" onclick="confirmDelete(this.closest('form'), '{{ $kursus->nama }}')"
                                            class="inline-flex items-center p-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>

                    {{-- DETAIL MODAL --}}
                <div x-show="detailModals[{{ $kursus->id }}]" x-cloak 
                    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
                    <div @click.away="toggleModal('detail', {{ $kursus->id }})" 
                        class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto modal-scroll">
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                <h2 class="text-lg font-semibold text-gray-900">Detail Kursus</h2>
                                <button @click="toggleModal('detail', {{ $kursus->id }})" class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-6 py-6">
                                <div class="text-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full mx-auto flex items-center justify-center text-white text-2xl font-bold">
                                        {{ strtoupper(substr($kursus->nama, 0, 1)) }}
                                    </div>
                                    <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $kursus->nama }}</h3>
                                    <p class="text-sm text-gray-500">{{ $kursus->kode }}</p>
                                    <p class="text-sm text-gray-500">{{ $kursus->deskripsi }}</p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Status</dt>
                                        <dd class="mt-1 text-sm">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $kursus->status === 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($kursus->status) }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Level</dt>
                                        <dd class="mt-1 text-sm">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold 
                                                {{ $kursus->level === 'pemula' ? 'bg-green-100 text-green-800' : 
                                                ($kursus->level === 'menengah' ? 'bg-yellow-100 text-yellow-800' : 
                                                'bg-blue-100 text-blue-800') }}">
                                                {{ ucfirst($kursus->level) }}
                                            </span>
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Rating</dt>
                                        <dd class="mt-1 text-sm">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $kursus->rating >= 4 ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $kursus->rating }} <svg class="w-3 h-3 inline-block ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-3.09 1.626a1 1 0 01-1.45-1.054l.59-3.44L3.18 9.09a1 1 0 01.56-1.71l3.47-.504L8.5 4.18a1 1 0 011.79 0l1.29 2.69 3.47.504a1 1 0 01.56 1.71l-2.53 2.032.59 3.44a1 1 0 01-1.45 1.054L10 15z"/></svg>
                                            </span>
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                        <dd class="mt-1 text-sm font-mono text-gray-900">{{ $kursus->kategori->nama ?? '-' }}</dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Harga Asli</dt>
                                        <dd class="mt-1 text-sm text-gray-900">Rp. {{ number_format($kursus->harga_asli, 0, ',', '.') }}</dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Harga Diskon</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($kursus->harga_diskon)
                                                Rp. {{ number_format($kursus->harga_diskon, 0, ',', '.') }}
                                            @else
                                                <span class="text-gray-400">Tidak ada diskon</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Mulai</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($kursus->tanggal_mulai)
                                                {{ \Carbon\Carbon::parse($kursus->tanggal_mulai)->format('d M Y') }}
                                            @else
                                                -
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Tanggal Selesai</dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            @if($kursus->tanggal_selesai)
                                                {{ \Carbon\Carbon::parse($kursus->tanggal_selesai)->format('d M Y') }}
                                            @else
                                                -
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Terdaftar</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $kursus->created_at?->format('d M Y H:i') ?? '-' }}</dd>
                                    </div>
                                    <div class="bg-gray-50 rounded-lg p-4">
                                        <dt class="text-sm font-medium text-gray-500">Update Terakhir</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $kursus->updated_at?->format('d M Y H:i') ?? '-' }}</dd>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
                                <button @click="toggleModal('detail', {{ $kursus->id }})" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- EDIT MODAL --}}
                    @if(auth()->user()->role === 'admin')
                <div x-show="editModals[{{ $kursus->id }}]" x-cloak 
                    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
                    <div @click.away="toggleModal('edit', {{ $kursus->id }})" 
                        class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto modal-scroll">
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                <h2 class="text-lg font-semibold text-gray-900">Edit Kursus</h2>
                                <button @click="toggleModal('edit', {{ $kursus->id }})" class="text-gray-400 hover:text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-6 py-4">
                                <form method="POST" action="{{ route('admin.kursus.update', $kursus) }}" class="space-y-4" enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Kode</label>
                                            <input type="text" name="kode" value="{{ $kursus->kode }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                            <input type="text" name="nama" value="{{ $kursus->nama }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                            <textarea name="deskripsi" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $kursus->deskripsi }}</textarea>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                                            <select name="kategoris_id" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                                @foreach(App\Models\Kategori::all() as $kategori)
                                                    <option value="{{ $kategori->id }}" {{ $kursus->kategoris_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                            <select name="status" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                                <option value="aktif" {{ $kursus->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="nonaktif" {{ $kursus->status == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                                            <select name="level" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                                <option value="pemula" {{ $kursus->level == 'pemula' ? 'selected' : '' }}>Pemula</option>
                                                <option value="menengah" {{ $kursus->level == 'menengah' ? 'selected' : '' }}>Menengah</option>
                                                <option value="lanjutan" {{ $kursus->level == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                                            <input type="number" name="rating" value="{{ $kursus->rating }}" step="0.1" min="0" max="5" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Asli</label>
                                            <input type="number" name="harga_asli" value="{{ $kursus->harga_asli }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Diskon</label>
                                            <input type="number" name="harga_diskon" value="{{ $kursus->harga_diskon }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                            <input type="date" name="tanggal_mulai" value="{{ $kursus->tanggal_mulai }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                            <input type="date" name="tanggal_selesai" value="{{ $kursus->tanggal_selesai }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        </div>
                                        <div class="col-span-2">
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                                            <input type="file" name="thumbnail" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @if($kursus->thumbnail)
                                                <div class="mt-2">
                                                    <p class="text-xs text-gray-500">Thumbnail saat ini: {{ basename($kursus->thumbnail) }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-3 pt-4">
                                        <button type="button" @click="toggleModal('edit', {{ $kursus->id }})" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">Batal</button>
                                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                                </svg>
                                <p class="text-lg font-medium">Tidak ada data Kursus</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    @if(isset($kursus) && method_exists($kursus, 'links'))
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">{{ $kursus->links() }}</div>
    @endif

    {{-- CREATE MODAL --}}
    @if(auth()->user()->role === 'admin')
    <div x-show="openCreate" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4">
        <div @click.away="toggleModal('create')" class="bg-white rounded-xl shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto modal-scroll">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Tambah Kursus</h2>
            </div>
            <div class="px-6 py-4">
                <form method="POST" action="{{ route('admin.kursus.store') }}" id="createForm" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="deskripsi" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="kategoris_id" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Kategori::all() as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategoris_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non Aktif</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                            <select name="level" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="pemula" {{ old('level') == 'pemula' ? 'selected' : '' }}>Pemula</option>
                                <option value="menengah" {{ old('level') == 'menengah' ? 'selected' : '' }}>Menengah</option>
                                <option value="lanjutan" {{ old('level') == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                            <input type="number" name="rating" value="{{ old('rating') }}" step="0.1" min="0" max="5" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Asli</label>
                            <input type="number" name="harga_asli" value="{{ old('harga_asli') }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Harga Diskon</label>
                            <input type="number" name="harga_diskon" value="{{ old('harga_diskon') }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                            <input type="file" name="thumbnail" class="w-full border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-6 py-4 border-t border-gray-200 flex justify-end space-x-3">
                <button @click="toggleModal('create')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">Batal</button>
                <button type="submit" form="createForm" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">Simpan</button>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
[x-cloak] { display: none !important; }
.modal-scroll::-webkit-scrollbar { width: 6px; }
.modal-scroll::-webkit-scrollbar-track { background: #f1f5f9; border-radius: 3px; }
.modal-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
.modal-scroll::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
@endsection