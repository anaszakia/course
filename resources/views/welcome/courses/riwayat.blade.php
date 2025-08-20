@extends('welcome.layouts.app')

@section('title', 'Riwayat Pendaftaran Kursus')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Riwayat Pendaftaran Kursus</h1>
        @if($pendaftarans->isEmpty())
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 rounded-lg p-6 text-center">
                Anda belum pernah mendaftar kursus apapun.
            </div>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-left">Kursus</th>
                        <th class="px-4 py-2 border-b text-left">Tanggal Daftar</th>
                        <th class="px-4 py-2 border-b text-left">Total Bayar</th>
                        <th class="px-4 py-2 border-b text-left">Status</th>
                        <th class="px-4 py-2 border-b text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftarans as $p)
                    <tr>
                        <td class="px-4 py-2 border-b">
                            <div class="font-semibold text-gray-900">{{ $p->kursus->nama }}</div>
                            <div class="text-xs text-gray-500">{{ $p->kursus->kategori->nama ?? '-' }}</div>
                        </td>
                        <td class="px-4 py-2 border-b">{{ $p->created_at->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-2 border-b">Rp. {{ number_format($p->total_bayar, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border-b">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold
                                @if($p->status == 'pending') bg-yellow-100 text-yellow-800
                                @elseif($p->status == 'paid') bg-green-100 text-green-800
                                @elseif($p->status == 'canceled') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 border-b">
                            @if($p->status == 'pending')
                                <a href="{{ route('courses.register.success', ['id' => $p->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-blue-700 transition duration-150">Bayar Sekarang</a>
                            @else
                                <span class="text-gray-400 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>
@endsection
