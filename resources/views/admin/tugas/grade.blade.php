@extends('layouts.app')

@section('title', 'Penilaian Tugas')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-800">
                            Penilaian Tugas
                        </h2>
                        <a href="{{ route('admin.tugas.submissions', [$kursus->id, $tugas->id]) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
                
                <div class="p-6">
                    @if($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                            <ul class="list-disc pl-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Detail Tugas</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="mb-2">
                                    <span class="font-medium text-gray-700">Judul Tugas:</span>
                                    <span class="ml-2">{{ $tugas->judul }}</span>
                                </div>
                                @if($tugas->batas_waktu)
                                    <div class="mb-2">
                                        <span class="font-medium text-gray-700">Batas Waktu:</span>
                                        <span class="ml-2">{{ $tugas->batas_waktu->format('d M Y, H:i') }}</span>
                                        @if($tugas->batas_waktu < now())
                                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded ml-2">Berakhir</span>
                                        @endif
                                    </div>
                                @endif
                                <div class="mb-2">
                                    <span class="font-medium text-gray-700">Kursus:</span>
                                    <span class="ml-2">{{ $kursus->nama }}</span>
                                </div>
                                @if($tugas->file_path)
                                    <div class="mt-3">
                                        <a href="{{ route('courses.tugas.download', [$kursus->id, $tugas->id]) }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            Download File Tugas
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Pengumpulan</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="mb-2">
                                    <span class="font-medium text-gray-700">Siswa:</span>
                                    <span class="ml-2">{{ $submission->user->name }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="font-medium text-gray-700">Tanggal Dikumpulkan:</span>
                                    <span class="ml-2">{{ $submission->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="mb-2">
                                    <span class="font-medium text-gray-700">File:</span>
                                    <a href="{{ route('courses.pengumpulan.download', [$kursus->id, $tugas->id, $submission->id]) }}" class="ml-2 text-blue-600 hover:text-blue-800 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        Download File
                                    </a>
                                </div>
                                @if($submission->komentar)
                                    <div class="mt-3">
                                        <span class="font-medium text-gray-700">Komentar Siswa:</span>
                                        <p class="mt-1 text-gray-600">{{ $submission->komentar }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-semibold mb-3">Berikan Penilaian</h3>
                        
                        <form action="{{ route('admin.tugas.grade', [$kursus->id, $tugas->id, $submission->id]) }}" method="POST">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="nilai" class="block text-gray-700 text-sm font-bold mb-2">Nilai</label>
                                <input type="number" name="nilai" id="nilai" min="0" max="100" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nilai', $submission->nilai) }}" required>
                                <p class="text-sm text-gray-500 mt-1">Masukkan nilai dari 0-100.</p>
                            </div>
                            
                            <div class="mb-6">
                                <label for="feedback" class="block text-gray-700 text-sm font-bold mb-2">Feedback</label>
                                <textarea name="feedback" id="feedback" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('feedback', $submission->feedback) }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Berikan feedback atau komentar terhadap tugas yang dikumpulkan.</p>
                            </div>
                            
                            <div class="flex items-center justify-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Simpan Penilaian
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
