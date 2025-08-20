@extends('welcome.layouts.app')

@section('title', 'Kelas Reguler')

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
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Kelas <span class="text-yellow-300">Reguler</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Belajar bersama dalam grup dengan harga terjangkau. Dapatkan pengalaman pembelajaran yang interaktif dengan sesama siswa.
            </p>
            
            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-5xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">15-25 Siswa per Kelas</h3>
                    <p class="text-blue-100 text-sm">Grup belajar yang ideal untuk diskusi dan interaksi</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Jadwal Tetap</h3>
                    <p class="text-blue-100 text-sm">Senin-Jumat 19:00-21:00 atau Weekend</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Harga Terjangkau</h3>
                    <p class="text-blue-100 text-sm">Mulai dari Rp 499.000 per bulan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Categories -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Program Kelas Reguler
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Pilih kategori kursus yang sesuai dengan minat dan tujuan karier Anda. Semua kelas dilengkapi dengan materi lengkap dan sertifikat.
            </p>
        </div>
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap justify-center mb-12 gap-4">
            <button class="filter-btn active px-6 py-3 rounded-full text-sm font-semibold transition-all duration-200" data-filter="all">
                Semua Kursus
            </button>
            @php
                $kategoris = \App\Models\Kategori::all();
            @endphp
            @foreach($kategoris as $kategori)
                <button class="filter-btn px-6 py-3 rounded-full text-sm font-semibold transition-all duration-200" data-filter="kategori-{{ $kategori->id }}">
                    {{ $kategori->nama }}
                </button>
            @endforeach
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="course-grid">
            @php
                $kursusList = \App\Models\Kursus::with(['kategori', 'pendaftaran' => function($q) { $q->where('status', 'paid'); }])->where('status', 'aktif')->get();
            @endphp
            @foreach($kursusList as $kursus)
                <div class="course-card kategori-{{ $kursus->kategoris_id }} bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition duration-300">
                    <div class="relative">
                        <img src="{{ $kursus->thumbnail ? asset('storage/' . $kursus->thumbnail) : 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}" 
                             alt="{{ $kursus->nama }}" 
                             class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $kursus->kategori->nama ?? '-' }}</span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <span class="bg-green-600 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $kursus->kuota ? $kursus->kuota . ' Kursi Tersisa' : 'Tersedia' }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="text-gray-600 text-sm ml-1">{{ $kursus->rating ?? '-' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span class="text-gray-600 text-sm ml-1">{{ $kursus->pendaftaran->count() }} siswa</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $kursus->nama }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">
                            {{ $kursus->deskripsi }}
                        </p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-sm text-gray-500">
                                <p><i class="fas fa-clock mr-2"></i>{{ $kursus->durasi ?? '-' }}</p>
                                <p class="mt-1"><i class="fas fa-calendar mr-2"></i>Batch: {{ $kursus->tanggal_mulai ? \Carbon\Carbon::parse($kursus->tanggal_mulai)->format('d M Y') : '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-blue-600">Rp {{ number_format($kursus->harga_diskon ?? $kursus->harga_asli, 0, ',', '.') }}</span>
                                @if($kursus->harga_diskon)
                                    <span class="text-sm text-gray-500 line-through ml-2">Rp {{ number_format($kursus->harga_asli, 0, ',', '.') }}</span>
                                @endif
                            </div>
                            <a href="{{ url('/program-kursus/detail/' . $kursus->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-150">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Keunggulan Kelas Reguler
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Dapatkan pengalaman belajar terbaik dengan berbagai fasilitas dan dukungan yang kami sediakan.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Peer Learning</h3>
                <p class="text-gray-600">Belajar bersama teman-teman sekelas, saling membantu dan bertukar pengalaman dalam grup diskusi.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Harga Terjangkau</h3>
                <p class="text-gray-600">Dapatkan kualitas pembelajaran premium dengan harga yang lebih ekonomis karena dibagi dalam grup.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Networking</h3>
                <p class="text-gray-600">Bangun koneksi dan jaringan profesional dengan sesama peserta dari berbagai latar belakang industri.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Materi Terstruktur</h3>
                <p class="text-gray-600">Kurikulum yang tersusun sistematis dengan project-based learning dan studi kasus nyata.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Live Session</h3>
                <p class="text-gray-600">Sesi pembelajaran langsung dengan instruktur, Q&A interaktif, dan feedback real-time.</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Sertifikat Resmi</h3>
                <p class="text-gray-600">Dapatkan sertifikat yang diakui industri untuk meningkatkan nilai CV dan kredibilitas profesional.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Bergabung dengan Kelas Reguler?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Jangan lewatkan kesempatan untuk belajar bersama ribuan siswa lainnya. Daftar sekarang dan dapatkan early bird discount!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/daftar') }}" 
                   class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Daftar Kelas Reguler
                </a>
                <a href="{{ url('/hubungi-kami') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Konsultasi Gratis
                </a>
            </div>
            <p class="text-blue-100 mt-6 text-sm">
                * Early bird discount 30% untuk pendaftaran sebelum tanggal 25 Agustus 2025
            </p>
        </div>
    </div>
</section>

<style>
.filter-btn {
    @apply bg-gray-100 text-gray-600;
}
.filter-btn.active {
    @apply bg-blue-600 text-white;
}
.filter-btn:hover:not(.active) {
    @apply bg-gray-200 text-gray-800;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const courseCards = document.querySelectorAll('.course-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter courses
            courseCards.forEach(card => {
                if (filter === 'all' || card.classList.contains(filter)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection