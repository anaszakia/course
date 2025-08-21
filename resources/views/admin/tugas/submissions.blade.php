@extends('layouts.app')

@section('title', 'Pengumpulan Tugas')

@section('content')
<div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div class="flex flex-col md:flex-row mb-4 justify-between">
            <div>
                <h2 class="text-2xl leading-tight mb-2">
                    Pengumpulan Tugas: {{ $tugas->judul }}
                </h2>
                <p class="text-gray-600">Kursus: {{ $kursus->nama }}</p>
                @if($tugas->batas_waktu)
                    <p class="text-gray-600">Batas Waktu: {{ $tugas->batas_waktu->format('d-m-Y') }}
                    @if($tugas->batas_waktu < now())
                        <span class="text-red-500">(Berakhir)</span>
                    @endif
                    </p>
                @endif
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.tugas.index', $kursus->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Kembali ke Daftar Tugas
                </a>
            </div>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="mb-4 p-4 bg-white border rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-2">Deskripsi Tugas</h3>
            <p class="text-gray-700">{{ $tugas->deskripsi ?: 'Tidak ada deskripsi.' }}</p>
        </div>
        
        <div class="mt-4">
            @if($submissions->isEmpty())
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-lg p-6 text-center">
                    Belum ada pengumpulan untuk tugas ini.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Siswa
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Waktu Pengumpulan
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    File
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nilai
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap font-medium">
                                                    {{ $submission->user->name }}
                                                </p>
                                                <p class="text-gray-600 whitespace-no-wrap text-xs">
                                                    {{ $submission->user->email }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $submission->created_at->format('d-m-Y H:i') }}
                                        @if($submission->updated_at > $submission->created_at)
                                            <p class="text-xs text-gray-500">(Diperbarui: {{ $submission->updated_at->format('d-m-Y H:i') }})</p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="{{ route('courses.pengumpulan.download', [$kursus->id, $tugas->id, $submission->id]) }}" class="text-blue-600 hover:underline flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Unduh File
                                        </a>
                                        @if($submission->komentar)
                                            <p class="text-xs text-gray-500 mt-1">
                                                <span class="font-semibold">Komentar:</span> {{ $submission->komentar }}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($submission->status == 'submitted')
                                            <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                                <span aria-hidden class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Menunggu Nilai</span>
                                            </span>
                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Sudah Dinilai</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if($submission->nilai !== null)
                                            <span class="font-bold">{{ $submission->nilai }}</span>/100
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                        
                                        @if($submission->feedback)
                                            <p class="text-xs text-gray-500 mt-1">
                                                <span class="font-semibold">Feedback:</span> {{ $submission->feedback }}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="{{ route('admin.tugas.grade.show', [$kursus->id, $tugas->id, $submission->id]) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs">
                                            {{ $submission->status == 'graded' ? 'Ubah Nilai' : 'Beri Nilai' }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- No modal needed as we now use a separate page for grading -->
@endsection
