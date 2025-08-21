@extends('layouts.app')
@section('title', 'Edit Kursus')

@section('content')
<div class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Edit Kursus</h1>
                <p class="text-sm text-gray-500 mt-1">Edit kursus yang sudah ada</p>
            </div>
            <a href="{{ route('admin.kursus.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2.5 rounded-lg transition-colors font-medium flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    {{-- FORM --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form method="POST" action="{{ route('admin.kursus.update', $kursus->id) }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="kode" class="block text-sm font-medium text-gray-700 mb-2">Kode Kursus</label>
                    <input type="text" name="kode" id="kode" value="{{ $kursus->kode }}" class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('kode')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Kursus</label>
                    <input type="text" name="nama" id="nama" value="{{ $kursus->nama }}" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('nama')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $kursus->deskripsi }}</textarea>
                    @error('deskripsi')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="kategoris_id" class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategoris_id" id="kategoris_id" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ $kursus->kategoris_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategoris_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="aktif" {{ $kursus->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ $kursus->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level</label>
                    <select name="level" id="level" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="pemula" {{ $kursus->level == 'pemula' ? 'selected' : '' }}>Pemula</option>
                        <option value="menengah" {{ $kursus->level == 'menengah' ? 'selected' : '' }}>Menengah</option>
                        <option value="lanjutan" {{ $kursus->level == 'lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                    </select>
                    @error('level')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating (0-5)</label>
                    <input type="number" name="rating" id="rating" value="{{ $kursus->rating }}" min="0" max="5" step="0.1" class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('rating')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="harga_asli" class="block text-sm font-medium text-gray-700 mb-2">Harga Asli</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="harga_asli" id="harga_asli" value="{{ $kursus->harga_asli }}" min="0" class="w-full border-gray-300 rounded-lg pl-12 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    @error('harga_asli')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="harga_diskon" class="block text-sm font-medium text-gray-700 mb-2">Harga Diskon</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="text-gray-500 sm:text-sm">Rp</span>
                        </div>
                        <input type="number" name="harga_diskon" id="harga_diskon" value="{{ $kursus->harga_diskon }}" min="0" class="w-full border-gray-300 rounded-lg pl-12 px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    @error('harga_diskon')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ $kursus->tanggal_mulai }}" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('tanggal_mulai')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ $kursus->tanggal_selesai }}" required class="w-full border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('tanggal_selesai')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail</label>
                    
                    @if($kursus->thumbnail)
                        <div class="mb-3 flex items-center space-x-2">
                            <img src="{{ Storage::url($kursus->thumbnail) }}" alt="{{ $kursus->nama }}" class="h-20 w-20 object-cover rounded-lg border border-gray-200">
                            <p class="text-sm text-gray-500">Thumbnail saat ini</p>
                        </div>
                    @endif
                    
                    <div class="border-dashed border-2 border-gray-300 rounded-lg p-6 text-center">
                        <input type="file" name="thumbnail" id="thumbnail" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="mt-2 text-xs text-gray-500">PNG, JPG, WEBP hingga 2MB</p>
                    </div>
                    @error('thumbnail')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    Update Kursus
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
