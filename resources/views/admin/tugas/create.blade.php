@extends('layouts.app')

@section('title', 'Tambah Tugas Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 class="text-xl font-bold text-gray-800">Tambah Tugas Baru untuk Kursus: {{ $kursus->nama }}</h2>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.tugas.store', $kursus->id) }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Tugas</label>
                    <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul') }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Tugas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi') }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Jelaskan detail tugas, petunjuk pengerjaan, format file yang diharapkan, dll.</p>
                </div>
                
                <div class="mb-4">
                    <label for="batas_waktu" class="block text-gray-700 text-sm font-bold mb-2">Batas Waktu Pengumpulan</label>
                    <input type="date" name="batas_waktu" id="batas_waktu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('batas_waktu') }}">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ada batas waktu.</p>
                </div>
                
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('admin.tugas.index', $kursus->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
