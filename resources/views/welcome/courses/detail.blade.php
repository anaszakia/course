@extends('welcome.layouts.app')

@section('title', $course->nama)

@section('content')
<section class="py-20 bg-white relative">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Tombol Kembali -->
        <a href="#" onclick="event.preventDefault(); window.history.back();" class="absolute left-4 top-4 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow transition duration-200 flex items-center z-20">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <div class="flex flex-col md:flex-row gap-10">
            <div class="md:w-1/2">
                <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : 'https://via.placeholder.com/500x300?text=No+Image' }}" 
                     alt="{{ $course->nama }}" 
                     class="rounded-2xl shadow-2xl w-full h-72 object-cover mb-6">
                <div class="flex gap-2 mb-4">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                        {{ ucfirst($course->level) }}
                    </span>
                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $course->kategori->nama ?? '-' }}
                    </span>
                </div>
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-gray-600 text-sm">{{ $course->rating ?? '-' }}</span>
                </div>
            </div>
            <div class="md:w-1/2">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $course->nama }}</h1>
                <p class="text-gray-700 mb-6">{{ $course->deskripsi }}</p>
                <div class="mb-4">
                    <span class="text-blue-600 font-medium">Mulai: {{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d-m-Y') }}</span>
                    <span class="mx-2">-</span>
                    <span class="text-green-600 font-medium">Selesai: {{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d-m-Y') }}</span>
                </div>
                <div class="mb-6">
                    @if($course->harga_diskon && $course->harga_diskon != $course->harga_asli)
                        <span class="line-through text-gray-400 text-lg">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                        <span class="text-3xl font-bold text-blue-600 ml-2">Rp. {{ number_format($course->harga_diskon, 0, ',', '.') }}</span>
                    @else
                        <span class="text-3xl font-bold text-blue-600">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                    @endif
                </div>
                @guest
                <button type="button" onclick="showLoginAlert()" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Daftar Sekarang
                </button>
                <script>
                function showLoginAlert() {
                    if (window.Swal) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Login Diperlukan',
                            html: 'Silakan <a href=\'{{ url('/user/login') }}\' class=\'text-blue-600 underline\'>masuk</a> ke akun Anda atau <a href=\'{{ url('/user/register') }}\' class=\'text-blue-600 underline\'>buat akun baru</a> untuk mendaftar kursus.',
                            confirmButtonText: 'Tutup'
                        });
                    } else {
                        alert('Silakan login atau daftar akun terlebih dahulu untuk mendaftar kursus.');
                    }
                }
                </script>
                @else
                <a href="{{ url('/program-kursus/daftar/' . $course->id) }}" class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Daftar Sekarang
                </a>
                @endguest
            </div>
        </div>
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Kursus</h2>
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($course->deskripsi_lengkap ?? $course->deskripsi)) !!}
            </div>
        </div>
    </div>
</section>
@endsection
