@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 class="text-xl font-bold text-gray-800">Edit Tugas: {{ $tugas->judul }}</h2>
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

            <form action="{{ route('admin.tugas.update', [$kursus->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Tugas</label>
                    <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul', $tugas->judul) }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Tugas</label>
                    <textarea name="deskripsi" id="deskripsi" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Jelaskan detail tugas, petunjuk pengerjaan, format file yang diharapkan, dll.</p>
                </div>
                
                <div class="mb-4">
                    <label for="batas_waktu" class="block text-gray-700 text-sm font-bold mb-2">Batas Waktu Pengumpulan</label>
                    <input type="datetime-local" name="batas_waktu" id="batas_waktu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('batas_waktu', $tugas->batas_waktu ? $tugas->batas_waktu->format('Y-m-d\TH:i') : '') }}">
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ada batas waktu.</p>
                </div>
                
                <div class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File Tugas (opsional)</label>
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @if($tugas->file_path)
                        <div class="mt-2">
                            <p class="text-sm text-gray-600">File saat ini:</p>
                            <a href="{{ route('courses.tugas.download', [$kursus->id, $tugas->id]) }}" class="text-blue-500 hover:underline flex items-center text-sm mt-1">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Unduh File Tugas
                            </a>
                            <p class="text-xs text-gray-500 mt-1">Upload file baru untuk mengganti file yang ada.</p>
                        </div>
                    @endif
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
