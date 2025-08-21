@extends('welcome.layouts.app')

@section('title', 'Pengumpulan Tugas')

@section('content')
<section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-indigo-600 text-white">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold">{{ $tugas->judul }}</h2>
                        <span class="text-sm">
                            @if($tugas->batas_waktu)
                                Batas Waktu: {{ $tugas->batas_waktu->format('d M Y') }}
                                @if($tugas->batas_waktu < now())
                                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded ml-2">Berakhir</span>
                                @endif
                            @else
                                Tidak ada batas waktu
                            @endif
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    {{-- Error Message --}}
                    @if(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Task Description Section --}}
                    <div class="prose max-w-none mb-6 pb-6 border-b">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Deskripsi Tugas</h3>
                        <div>
                            {!! nl2br(e($tugas->deskripsi)) !!}
                        </div>
                        
                        {{-- Task File Download --}}
                        @if($tugas->file_path)
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <h4 class="font-medium text-gray-800 mb-2">File Tugas</h4>
                                <a href="{{ route('courses.tugas.download', [$kursus->id, $tugas->id]) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Unduh File Tugas
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- Submission Status and Forms --}}
                    @if($pengumpulan && is_object($pengumpulan) && isset($pengumpulan->status) && $pengumpulan->status == 'graded')
                        {{-- Graded Submission --}}
                        <div class="mb-8 p-5 bg-green-50 border border-green-200 rounded-lg">
                            <h4 class="font-semibold text-green-800 mb-3">Nilai Anda</h4>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">File yang dikumpulkan:</span>
                                <a href="{{ Storage::url($pengumpulan->file_path) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    {{ basename($pengumpulan->file_path) }}
                                </a>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">Tanggal Pengumpulan:</span>
                                <span>{{ $pengumpulan->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">Nilai:</span>
                                <span class="font-bold text-xl">{{ $pengumpulan->nilai ?? 0 }}/100</span>
                            </div>
                            @if(isset($pengumpulan->feedback) && $pengumpulan->feedback)
                                <div class="mt-3 pt-3 border-t border-green-200">
                                    <h5 class="font-semibold text-green-800 mb-1">Feedback dari Pengajar:</h5>
                                    <p class="text-gray-700">{{ $pengumpulan->feedback }}</p>
                                </div>
                            @endif
                            
                            {{-- Resubmit Form for Graded Assignment --}}
                            <div class="mt-4">
                                <p class="font-medium text-gray-700">Ingin mengumpulkan ulang?</p>
                                <form action="{{ route('courses.tugas.submit.post', [$kursus->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="file" class="block text-gray-700 text-sm font-medium mb-2">Upload File Baru</label>
                                        <input type="file" name="file" id="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                                        <p class="mt-1 text-sm text-gray-500">Format file: PDF, Word, Excel, PowerPoint, ZIP. Maksimal 10MB.</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="komentar" class="block text-gray-700 text-sm font-medium mb-2">Komentar (opsional)</label>
                                        <textarea name="komentar" id="komentar" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('komentar') }}</textarea>
                                    </div>
                                    
                                    <div class="flex items-center justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Kirim Ulang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @elseif($pengumpulan && is_object($pengumpulan))
                        {{-- Submitted but Not Graded --}}
                        <div class="mb-8 p-5 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <h4 class="font-semibold text-yellow-800 mb-3">Tugas Sudah Dikumpulkan</h4>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">File yang dikumpulkan:</span>
                                <a href="{{ Storage::url($pengumpulan->file_path) }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    {{ basename($pengumpulan->file_path) }}
                                </a>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">Tanggal Pengumpulan:</span>
                                <span>{{ $pengumpulan->created_at->format('d M Y, H:i') }}</span>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-700">Status:</span>
                                @if(isset($pengumpulan->status))
                                    @if($pengumpulan->status == 'pending')
                                        <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full text-xs">Menunggu Penilaian</span>
                                    @elseif($pengumpulan->status == 'reviewed')
                                        <span class="px-2 py-1 bg-blue-200 text-blue-800 rounded-full text-xs">Sedang Direview</span>
                                    @else
                                        <span class="px-2 py-1 bg-gray-200 text-gray-800 rounded-full text-xs">{{ ucfirst($pengumpulan->status) }}</span>
                                    @endif
                                @else
                                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full text-xs">Menunggu Penilaian</span>
                                @endif
                            </div>

                            @if(isset($pengumpulan->komentar) && $pengumpulan->komentar)
                                <div class="mt-3 pt-3 border-t border-yellow-200">
                                    <h5 class="font-semibold text-yellow-800 mb-1">Komentar Anda:</h5>
                                    <p class="text-gray-700">{{ $pengumpulan->komentar }}</p>
                                </div>
                            @endif
                            
                            {{-- Resubmit Form for Pending Assignment --}}
                            <div class="mt-4">
                                <p class="font-medium text-gray-700">Ingin mengumpulkan ulang?</p>
                                <form action="{{ route('courses.tugas.submit.post', [$kursus->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="file" class="block text-gray-700 text-sm font-medium mb-2">Upload File Baru</label>
                                        <input type="file" name="file" id="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                                        <p class="mt-1 text-sm text-gray-500">Format file: PDF, Word, Excel, PowerPoint, ZIP. Maksimal 10MB.</p>
                                    </div>
                                    
                                    <div class="mb-4">
                                        <label for="komentar" class="block text-gray-700 text-sm font-medium mb-2">Komentar (opsional)</label>
                                        <textarea name="komentar" id="komentar" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('komentar', $pengumpulan->komentar ?? '') }}</textarea>
                                    </div>
                                    
                                    <div class="flex items-center justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Kirim Ulang
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @else
                        {{-- New Submission Form --}}
                        <div class="mb-8">
                            <h4 class="font-semibold text-gray-800 mb-4">Kumpulkan Tugas Anda</h4>
                            
                            {{-- Check if deadline has passed --}}
                            @if($tugas->batas_waktu && $tugas->batas_waktu < now())
                                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                                    <p class="font-medium">Batas waktu pengumpulan telah berakhir!</p>
                                    <p class="text-sm">Anda masih dapat mengumpulkan tugas, namun akan dianggap terlambat.</p>
                                </div>
                            @endif

                            <form action="{{ route('courses.tugas.submit.post', [$kursus->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="mb-4">
                                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Upload File</label>
                                    <input type="file" name="file" id="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                                    <p class="mt-1 text-sm text-gray-500">Format file: PDF, Word, Excel, PowerPoint, ZIP. Maksimal 10MB.</p>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="komentar" class="block text-gray-700 text-sm font-bold mb-2">Komentar (opsional)</label>
                                    <textarea name="komentar" id="komentar" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Tambahkan komentar atau catatan untuk tugas ini...">{{ old('komentar') }}</textarea>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <a href="{{ route('courses.materi', $kursus->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-300 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                        Kembali
                                    </a>
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:border-blue-800 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                        Kirim Tugas
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Loading Overlay for Form Submission --}}
<div id="loadingOverlay" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                <svg class="animate-spin h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Mengunggah File...</h3>
            <p class="text-sm text-gray-500 mt-2">Mohon tunggu, file sedang diproses.</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show loading overlay on form submission
    const forms = document.querySelectorAll('form[enctype="multipart/form-data"]');
    const loadingOverlay = document.getElementById('loadingOverlay');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const fileInput = this.querySelector('input[type="file"]');
            if (fileInput && fileInput.files.length > 0) {
                loadingOverlay.classList.remove('hidden');
            }
        });
    });
    
    // File validation
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Check file size (10MB = 10 * 1024 * 1024 bytes)
                const maxSize = 10 * 1024 * 1024;
                if (file.size > maxSize) {
                    alert('Ukuran file terlalu besar. Maksimal 10MB.');
                    this.value = '';
                    return;
                }
                
                // Check file type
                const allowedTypes = [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/vnd.ms-powerpoint',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                    'application/zip',
                    'application/x-zip-compressed'
                ];
                
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan: PDF, Word, Excel, PowerPoint, atau ZIP.');
                    this.value = '';
                    return;
                }
                
                // Show file name
                const fileName = file.name;
                const fileSize = (file.size / 1024 / 1024).toFixed(2);
                console.log(`File selected: ${fileName} (${fileSize}MB)`);
            }
        });
    });
});
</script>
@endpush
@endsection