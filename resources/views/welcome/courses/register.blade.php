@extends('welcome.layouts.app')

@section('title', 'Formulir Pendaftaran Kursus')

@section('content')
<section class="py-20 bg-white relative">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Tombol Kembali -->
        <a href="#" onclick="event.preventDefault(); window.history.back();" class="absolute left-4 top-4 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow transition duration-200 flex items-center z-20">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Pendaftaran Kursus</h1>
        <!-- Detail Kursus -->
        <div class="bg-gray-50 rounded-xl shadow p-6 mb-8 flex flex-col md:flex-row gap-6">
            <div class="md:w-1/3 flex-shrink-0">
                <img src="{{ $course->thumbnail ? asset('storage/'.$course->thumbnail) : 'https://via.placeholder.com/400x200?text=No+Image' }}" alt="{{ $course->nama }}" class="rounded-lg w-full h-40 object-cover mb-4 md:mb-0">
            </div>
            <div class="md:w-2/3">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $course->nama }}</h2>
                <div class="flex gap-2 mb-2">
                    <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">{{ ucfirst($course->level) }}</span>
                    <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">{{ $course->kategori->nama ?? '-' }}</span>
                </div>
                <p class="text-gray-700 text-sm mb-2">{{ $course->deskripsi }}</p>
                <div class="text-gray-600 text-sm mb-2">
                    <span>Mulai: <span class="text-blue-600 font-medium">{{ \Carbon\Carbon::parse($course->tanggal_mulai)->format('d-m-Y') }}</span></span>
                    <span class="mx-2">-</span>
                    <span>Selesai: <span class="text-green-600 font-medium">{{ \Carbon\Carbon::parse($course->tanggal_selesai)->format('d-m-Y') }}</span></span>
                </div>
                <div class="mt-2">
                    @if($course->harga_diskon && $course->harga_diskon != $course->harga_asli)
                        <span class="line-through text-gray-400 text-base">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                        <span class="text-2xl font-bold text-blue-600 ml-2">Rp. {{ number_format($course->harga_diskon, 0, ',', '.') }}</span>
                    @else
                        <span class="text-2xl font-bold text-blue-600">Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <!-- Formulir Pendaftaran -->
    <form action="{{ route('pendaftaran.store', ['kursusId' => $course->id]) }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" value="{{ auth()->user()->name }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-gray-100" readonly required>
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="w-full border border-gray-300 rounded-lg px-4 py-3 bg-gray-100" readonly required>
            </div>
            <div>
                <label for="no_hp" class="block text-gray-700 font-semibold mb-2">No. HP/WhatsApp</label>
                <input type="text" id="no_hp" name="no_hp" value="" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="catatan" class="block text-gray-700 font-semibold mb-2">Catatan</label>
                <textarea id="catatan" name="catatan" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 flex items-center justify-between">
                <span class="font-semibold text-blue-700">Total Pembayaran</span>
                <span class="text-2xl font-bold text-blue-600">
                    @if($course->harga_diskon && $course->harga_diskon != $course->harga_asli)
                        Rp. {{ number_format($course->harga_diskon, 0, ',', '.') }}
                    @else
                        Rp. {{ number_format($course->harga_asli, 0, ',', '.') }}
                    @endif
                </span>
            </div>
            <button type="submit" class="w-full bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                Daftar & Lanjutkan Pembayaran
            </button>
        </form>
    </div>
</section>
@endsection
