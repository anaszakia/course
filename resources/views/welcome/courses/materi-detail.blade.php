@extends('welcome.layouts.app')

@section('title', $materi->judul . ' - Materi Kursus')

@section('content')
<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row">
                <!-- Sidebar -->
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <div class="bg-white rounded-lg shadow-md p-5 mb-5">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $kursus->nama }}</h2>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($kursus->tanggal_mulai && $kursus->tanggal_selesai)
                                <span>{{ \Carbon\Carbon::parse($kursus->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($kursus->tanggal_selesai)->format('d M Y') }}</span>
                            @else
                                <span>Self-paced</span>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-5">
                        <h3 class="font-bold text-gray-700 mb-3">Materi Kursus</h3>
                        <ul class="space-y-3">
                            @foreach($all_materis as $m)
                                <li>
                                    <a href="{{ route('courses.materi.show', [$kursus->id, $m->id]) }}" class="flex items-center px-3 py-2 text-sm rounded-md transition-colors {{ $m->id == $materi->id ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100' }}">
                                        @if($m->tipe == 'file')
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                            </svg>
                                        @endif
                                        <span>{{ $m->judul }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-5 mt-5">
                        <a href="{{ route('courses.materi', $kursus->id) }}" class="text-blue-600 hover:text-blue-800 flex items-center text-sm font-medium">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Halaman Kelas
                        </a>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="w-full md:w-3/4 md:pl-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-bold text-gray-800">{{ $materi->judul }}</h1>
                            <span class="text-sm text-gray-500">Materi #{{ $materi->urutan }}</span>
                        </div>
                        
                        @if($materi->deskripsi)
                            <div class="prose max-w-none mb-8 pb-6 border-b">
                                {{ $materi->deskripsi }}
                            </div>
                        @endif
                        
                        <div class="mt-4">
                            @if($materi->tipe == 'file')
                                @php
                                    $fileExtension = $materi->file_type ?? pathinfo($materi->file_path, PATHINFO_EXTENSION);
                                @endphp
                                
                                @if(in_array($fileExtension, ['pdf']))
                                    <div class="mb-4">
                                        <iframe src="{{ Storage::url($materi->file_path) }}" class="w-full h-screen rounded border"></iframe>
                                    </div>
                                @elseif(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <div class="mb-4">
                                        <img src="{{ Storage::url($materi->file_path) }}" alt="{{ $materi->judul }}" class="max-w-full h-auto rounded">
                                    </div>
                                @else
                                    <div class="mb-4">
                                        <div class="bg-gray-100 rounded-lg p-6 text-center">
                                            <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            <h3 class="mt-2 text-xl font-semibold text-gray-700">{{ strtoupper($fileExtension) }} File</h3>
                                            <p class="mt-1 text-gray-600">File ini perlu diunduh untuk dibuka.</p>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="mt-6">
                                    <a href="{{ Storage::url($materi->file_path) }}" download class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Unduh Materi
                                    </a>
                                </div>
                                
                            @elseif($materi->tipe == 'link')
                                <div class="mb-4">
                                    <div class="bg-blue-50 rounded-lg p-6">
                                        <p class="text-blue-800 mb-4">Materi ini berupa tautan ke sumber eksternal. Silakan klik tombol di bawah untuk mengaksesnya.</p>
                                        <a href="{{ $materi->link_url }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 transition ease-in-out duration-150">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                            Buka Tautan
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Navigation between materials -->
                        <div class="mt-10 pt-6 border-t flex justify-between">
                            @php
                                $currentIndex = $all_materis->search(function($m) use ($materi) {
                                    return $m->id === $materi->id;
                                });
                                
                                $prevMateri = $currentIndex > 0 ? $all_materis[$currentIndex - 1] : null;
                                $nextMateri = $currentIndex < count($all_materis) - 1 ? $all_materis[$currentIndex + 1] : null;
                            @endphp
                            
                            @if($prevMateri)
                                <a href="{{ route('courses.materi.show', [$kursus->id, $prevMateri->id]) }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    {{ $prevMateri->judul }}
                                </a>
                            @else
                                <span></span>
                            @endif
                            
                            @if($nextMateri)
                                <a href="{{ route('courses.materi.show', [$kursus->id, $nextMateri->id]) }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                                    {{ $nextMateri->judul }}
                                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            @else
                                <span></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
