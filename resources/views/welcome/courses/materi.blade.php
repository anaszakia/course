@extends('welcome.layouts.app')

@section('title', 'Materi Kursus')

@section('content')
<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row">
                <!-- Sidebar -->
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <div class="bg-white rounded-lg shadow-md p-5 mb-5">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">{{ $kursus->nama }}</h2>
                        <div class="flex items-center text-sm text-gray-600 mb-4">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            @if($kursus->tanggal_mulai && $kursus->tanggal_selesai)
                                <span>{{ \Carbon\Carbon::parse($kursus->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($kursus->tanggal_selesai)->format('d M Y') }}</span>
                            @else
                                <span>Self-paced</span>
                            @endif
                        </div>
                        <div class="text-sm text-gray-600">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Instruktur: Admin</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <span>{{ $kursus->materi->count() }} Materi</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-md p-5">
                        <h3 class="font-bold text-gray-700 mb-3">Materi Kursus</h3>
                        <ul class="space-y-3">
                            @forelse($kursus->materi as $m)
                                <li>
                                    <a href="{{ route('courses.materi.show', [$kursus->id, $m->id]) }}" class="flex items-center px-3 py-2 text-sm rounded-md transition-colors {{ request()->is("courses/{$kursus->id}/materi/{$m->id}") ? 'bg-blue-100 text-blue-700' : 'hover:bg-gray-100' }}">
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
                            @empty
                                <li class="text-gray-500 text-sm italic">Belum ada materi tersedia.</li>
                            @endforelse
                        </ul>
                        
                        @if($tugas->isNotEmpty())
                            <h3 class="font-bold text-gray-700 mt-6 mb-3">Tugas & Kuis</h3>
                            <ul class="space-y-3">
                                @foreach($tugas as $t)
                                    <li>
                                        <a href="{{ route('courses.tugas.submit', [$kursus->id, $t->id]) }}" class="flex items-center px-3 py-2 text-sm rounded-md hover:bg-gray-100">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                            </svg>
                                            <div>
                                                <span class="font-medium">{{ $t->judul }}</span>
                                                @if(isset($pengumpulan[$t->id]))
                                                    @if($pengumpulan[$t->id]->status == 'graded')
                                                        <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Nilai: {{ $pengumpulan[$t->id]->nilai }}</span>
                                                    @else
                                                        <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">Submitted</span>
                                                    @endif
                                                @elseif($t->batas_waktu && $t->batas_waktu < now())
                                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Berakhir</span>
                                                @endif
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="w-full md:w-3/4 md:pl-6">
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h1 class="text-2xl font-bold text-gray-800 mb-6">Selamat Datang di Kelas</h1>
                        
                        <div class="prose max-w-none">
                            <p class="mb-4">Selamat datang di kursus <strong>{{ $kursus->nama }}</strong>! Anda telah terdaftar dalam kursus ini dan dapat mengakses semua materi pembelajaran.</p>
                            
                            <p class="mb-4">Cara menggunakan halaman kelas:</p>
                            
                            <ol class="list-decimal list-inside mb-6 space-y-2">
                                <li>Pilih materi dari daftar di sebelah kiri untuk mulai belajar</li>
                                <li>Kerjakan tugas dan kuis yang tersedia untuk menguji pemahaman Anda</li>
                                <li>Unduh materi untuk dipelajari secara offline</li>
                            </ol>
                            
                            <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 mb-6">
                                <p class="font-medium">Petunjuk Penting:</p>
                                <ul class="list-disc list-inside mt-2">
                                    <li>Pastikan mengumpulkan tugas sebelum batas waktu yang ditentukan</li>
                                    <li>Nilai minimal untuk kelulusan adalah 70 dari 100</li>
                                    <li>Untuk pertanyaan, silahkan hubungi admin melalui email</li>
                                </ul>
                            </div>
                            
                            @if($kursus->materi->isNotEmpty())
                                <div class="mt-6">
                                    <a href="{{ route('courses.materi.show', [$kursus->id, $kursus->materi->first()->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                        Mulai Belajar
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
