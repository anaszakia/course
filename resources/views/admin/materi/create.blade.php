@extends('layouts.app')

@section('title', 'Tambah Materi Baru')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 class="text-xl font-bold text-gray-800">Tambah Materi Baru untuk Kursus: {{ $kursus->nama }}</h2>
        </div>
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.materi.store', $kursus->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Materi</label>
                    <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul') }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi') }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="urutan" class="block text-gray-700 text-sm font-bold mb-2">Urutan</label>
                    <input type="number" name="urutan" id="urutan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('urutan', 1) }}" min="1" required>
                    <p class="text-sm text-gray-500 mt-1">Urutan menentukan posisi materi dalam daftar.</p>
                </div>
                
                <div class="mb-4">
                    <label for="tipe" class="block text-gray-700 text-sm font-bold mb-2">Tipe Materi</label>
                    <select name="tipe" id="tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="file" {{ old('tipe', 'file') == 'file' ? 'selected' : '' }}>File (PDF, Word, Excel, dll)</option>
                        <option value="link" {{ old('tipe') == 'link' ? 'selected' : '' }}>Link (URL)</option>
                    </select>
                </div>
                
                <div id="file-field" class="mb-4">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: PDF, Word (.doc, .docx), Excel (.xls, .xlsx), PowerPoint (.ppt, .pptx). Maksimal 10MB.</p>
                </div>
                
                <div id="link-field" class="mb-4 hidden">
                    <label for="link_url" class="block text-gray-700 text-sm font-bold mb-2">Link URL</label>
                    <input type="url" name="link_url" id="link_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="https://...">
                </div>
                
                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('admin.materi.index', $kursus->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Batal</a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleFields() {
        const tipeSelect = document.getElementById('tipe');
        const tipeValue = tipeSelect.value;
        const fileField = document.getElementById('file-field');
        const linkField = document.getElementById('link-field');
        const fileInput = document.getElementById('file');
        const linkInput = document.getElementById('link_url');
        
        if (tipeValue === 'file') {
            fileField.classList.remove('hidden');
            linkField.classList.add('hidden');
            fileInput.setAttribute('required', 'required');
            linkInput.removeAttribute('required');
            linkInput.value = ''; // Clear link value when switching to file
        } else if (tipeValue === 'link') {
            fileField.classList.add('hidden');
            linkField.classList.remove('hidden');
            fileInput.removeAttribute('required');
            linkInput.setAttribute('required', 'required');
            fileInput.value = ''; // Clear file value when switching to link
        }
    }
    
    // Run when page loads
    document.addEventListener('DOMContentLoaded', function() {
        const tipeSelect = document.getElementById('tipe');
        
        // Set initial state
        toggleFields();
        
        // Add event listener for changes
        tipeSelect.addEventListener('change', toggleFields);
    });
</script>
@endsection