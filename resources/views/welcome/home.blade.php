@extends('welcome.layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 right-0" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="white" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    Tingkatkan <span class="text-yellow-300">Skill</span> Anda dengan Kursus Online Terbaik
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100">
                    Pelajari keahlian baru dari instruktur terpercaya dengan fleksibilitas waktu dan tempat sesuai keinginan Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ url('/program-kursus/kelas-reguler') }}" 
                       class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300 text-center">
                        Mulai Belajar Sekarang
                    </a>
                    <a href="{{ url('/tentang-kami') }}" 
                       class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300 text-center">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-12">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300">1000+</div>
                        <div class="text-blue-100">Siswa Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300">50+</div>
                        <div class="text-blue-100">Kursus Tersedia</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-yellow-300">95%</div>
                        <div class="text-blue-100">Tingkat Kepuasan</div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="relative z-10">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                         alt="Students Learning Online" 
                         class="rounded-2xl shadow-2xl">
                </div>
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-pulse"></div>
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-white rounded-full opacity-10 animate-pulse delay-1000"></div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Mengapa Memilih Course Online?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan pembelajaran online terbaik dengan berbagai keunggulan yang akan membantu Anda mencapai tujuan karier.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition duration-300">
                    <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kurikulum Terstruktur</h3>
                <p class="text-gray-600">
                    Materi pembelajaran yang disusun secara sistematis dan mudah dipahami, dari level pemula hingga mahir.
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 transition duration-300">
                    <svg class="w-8 h-8 text-green-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Instruktur Berpengalaman</h3>
                <p class="text-gray-600">
                    Belajar dari para ahli dan praktisi industri yang memiliki pengalaman bertahun-tahun di bidangnya.
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-600 transition duration-300">
                    <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Fleksibilitas Waktu</h3>
                <p class="text-gray-600">
                    Belajar kapan saja dan di mana saja sesuai dengan jadwal dan kenyamanan Anda.
                </p>
            </div>
            
            <!-- Feature 4 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-600 transition duration-300">
                    <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sertifikat Resmi</h3>
                <p class="text-gray-600">
                    Dapatkan sertifikat yang diakui industri setelah menyelesaikan kursus untuk meningkatkan kredibilitas Anda.
                </p>
            </div>
            
            <!-- Feature 5 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 transition duration-300">
                    <svg class="w-8 h-8 text-red-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Support 24/7</h3>
                <p class="text-gray-600">
                    Tim support kami siap membantu Anda kapan saja jika mengalami kesulitan dalam proses pembelajaran.
                </p>
            </div>
            
            <!-- Feature 6 -->
            <div class="group bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 border border-gray-100">
                <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 transition duration-300">
                    <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Update Materi Berkala</h3>
                <p class="text-gray-600">
                    Materi pembelajaran selalu diperbarui mengikuti perkembangan teknologi dan tren industri terkini.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Courses Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Kursus Populer
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pilih dari berbagai kursus populer yang telah dipercaya ribuan siswa untuk mengembangkan karier mereka.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($popularCourses as $course)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                <div class="relative">
                    <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : 'https://via.placeholder.com/500x200?text=No+Image' }}" 
                         alt="{{ $course->nama }}" 
                         class="w-full h-48 object-cover">
                    <div class="absolute top-4 left-4">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ ucfirst($course->level) }}
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-blue-600 text-sm font-medium">{{ $course->kategori->nama ?? '-' }}</span>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-gray-600 text-sm ml-1">{{ $course->rating ?? '-' }}</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">
                        {{ $course->nama }}
                    </h3>
                    <p class="text-gray-600 mb-4">
                        {{ $course->deskripsi }}
                    </p>
                    <p class="text-gray-700">
                        <span class="text-blue-600 font-medium">{{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d-m-Y') }}</span> 
                        - 
                        <span class="text-green-600 font-medium">{{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d-m-Y') }}</span>
                    </p>
                    <div class="flex items-center justify-between">
                        @if($course->harga_diskon && $course->harga_diskon != $course->harga_asli)
                            <div class="flex flex-col">
                                <span class="line-through text-gray-400 text-sm">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                                <span class="text-2xl font-bold text-blue-600">Rp. {{ number_format($course->harga_diskon, 0, ',', '.') }}</span>
                            </div>
                        @else
                            <span class="text-2xl font-bold text-blue-600">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                        @endif
                        
                        <a href="{{ url('/program-kursus/detail/' . ($course->slug ?? $course->id)) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ url('/program-kursus/kelas-reguler') }}" 
               class="inline-flex items-center bg-blue-600 text-white px-8 py-3 rounded-lg text-lg font-medium hover:bg-blue-700 transition duration-150">
                Lihat Semua Kursus
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Apa Kata Mereka?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dengarkan testimonial dari ribuan siswa yang telah berhasil mengembangkan karier mereka.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700 mb-6 italic">
                    "Kursus web development di sini sangat lengkap dan mudah dipahami. Instrukturnya juga sangat responsif dalam menjawab pertanyaan. Sekarang saya sudah bekerja sebagai Full Stack Developer!"
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                         alt="Sarah" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <div class="font-semibold text-gray-900">Sarah Wijaya</div>
                        <div class="text-gray-600 text-sm">Full Stack Developer</div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700 mb-6 italic">
                    "Platform pembelajaran yang sangat user-friendly. Materi digital marketing sangat aplikatif dan langsung bisa dipraktekkan untuk bisnis saya. Omzet meningkat 200%!"
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                         alt="Budi" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <div class="font-semibold text-gray-900">Budi Santoso</div>
                        <div class="text-gray-600 text-sm">Digital Marketing Specialist</div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="bg-gray-50 p-8 rounded-2xl">
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700 mb-6 italic">
                    "Sebagai pemula di bidang data analytics, saya merasa sangat terbantu dengan materi yang disajikan secara bertahap. Sekarang saya bekerja sebagai Data Analyst di perusahaan multinasional."
                </p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                         alt="Maya" 
                         class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <div class="font-semibold text-gray-900">Maya Putri</div>
                        <div class="text-gray-600 text-sm">Data Analyst</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Mulai Perjalanan Pembelajaran Anda?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Bergabunglah dengan ribuan siswa yang telah merasakan manfaat belajar di platform kami. Dapatkan akses ke semua kursus dengan harga terjangkau.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/daftar') }}" 
                   class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Daftar Sekarang
                </a>
                <a href="{{ url('/program-kursus/kelas-reguler') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Lihat Semua Kursus
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Dipercaya oleh Perusahaan Ternama</h3>
            <p class="text-gray-600">Alumni kami bekerja di berbagai perusahaan teknologi terkemuka</p>
        </div>
                 
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
            <!-- Google Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" 
                     alt="Google" 
                     class="h-10 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            
            <!-- Microsoft Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" 
                     alt="Microsoft" 
                     class="h-8 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            
            <!-- Python Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" 
                     alt="Python" 
                     class="h-12 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            
            <!-- Laravel Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" 
                     alt="Laravel" 
                     class="h-10 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            
            <!-- PHP Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" 
                     alt="PHP" 
                     class="h-12 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
            
            <!-- Windows Logo -->
            <div class="flex items-center justify-center h-16 hover:scale-105 transition-transform duration-300">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/windows8/windows8-original.svg" 
                     alt="Windows" 
                     class="h-10 w-auto filter grayscale hover:grayscale-0 transition-all duration-300">
            </div>
        </div>
    </div>
</section>
@endsection