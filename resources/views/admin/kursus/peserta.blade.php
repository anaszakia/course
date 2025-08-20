@extends('layouts.app')
@section('title', 'Daftar Peserta Kursus')

@section('content')
<div class="space-y-6">
    {{-- HEADER --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Daftar Peserta Kursus</h1>
                <p class="text-sm text-gray-500 mt-1">{{ $kursus->nama }} ({{ $kursus->kode }})</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('admin.kursus.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <form method="POST" action="{{ route('admin.transaksi.export') }}" class="inline-block">
                    @csrf
                    <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-medium">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Export Data Peserta
                    </button>
                </form>
            </div>
        </div>
    </div>



    {{-- DAFTAR PESERTA --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Daftar Peserta ({{ $kursus->pendaftaran->count() }} orang)</h2>
        </div>
        
        <div class="overflow-x-auto">
            @if($kursus->pendaftaran->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kode</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No. HP</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal Daftar</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pembayaran</th>
                        <!-- kolom aksi dihapus -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($kursus->pendaftaran as $index => $pendaftaran)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $pendaftaran->kode_pendaftaran ?? 'T-' . $pendaftaran->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $pendaftaran->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $pendaftaran->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span id="nohp-{{ $pendaftaran->id }}">{{ $pendaftaran->no_hp ?? '-' }}</span>
                            @if($pendaftaran->no_hp)
                            <button type="button" class="ml-2 text-gray-400 hover:text-blue-600 copy-btn" title="Copy" data-target="nohp-{{ $pendaftaran->id }}">
                                <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8a2 2 0 002-2V8a2 2 0 00-2-2H8a2 2 0 00-2 2v6a2 2 0 002 2zm0 0v2a2 2 0 002 2h4a2 2 0 002-2v-2" />
                                </svg>
                            </button>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $pendaftaran->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Rp {{ number_format($pendaftaran->total_bayar, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="py-12 text-center">
                <div class="flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <p class="text-lg font-medium">Belum ada peserta yang terdaftar dan membayar</p>
                    <p class="text-sm text-gray-400 mt-1">Peserta akan muncul setelah melakukan pendaftaran dan pembayaran</p>
                </div>
            </div>
            @endif
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.copy-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var targetId = btn.getAttribute('data-target');
                var text = document.getElementById(targetId).innerText;
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(text);
                } else {
                    // fallback untuk browser lama
                    var tempInput = document.createElement('input');
                    tempInput.value = text;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                }
                btn.classList.add('text-green-600');
                setTimeout(function() {
                    btn.classList.remove('text-green-600');
                }, 1000);
            });
        });
    });
    </script>
        </div>
    </div>
</div>
@endsection
