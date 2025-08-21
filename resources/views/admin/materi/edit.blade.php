@extends('layouts.app')

@section('title', 'Edit Materi')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-100 border-b">
            <h2 class="text-xl font-bold text-gray-800">Edit Materi: {{ $materi->judul }}</h2>
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

            <form action="{{ route('admin.materi.update', [$kursus->id, $materi->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Materi</label>
                    <input type="text" name="judul" id="judul" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('judul', $materi->judul) }}" required>
                </div>
                
                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('deskripsi', $materi->deskripsi) }}</textarea>
                </div>
                
                <div class="mb-4">
                    <label for="urutan" class="block text-gray-700 text-sm font-bold mb-2">Urutan</label>
                    <input type="number" name="urutan" id="urutan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('urutan', $materi->urutan) }}" min="1" required>
                    <p class="text-sm text-gray-500 mt-1">Urutan menentukan posisi materi dalam daftar.</p>
                </div>
                
                <div class="mb-4">
                    <label for="tipe" class="block text-gray-700 text-sm font-bold mb-2">Tipe Materi</label>
                    <select name="tipe" id="tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required onchange="toggleFields()">
                        <option value="file" {{ old('tipe', $materi->tipe) == 'file' ? 'selected' : '' }}>File (PDF, Word, Excel, dll)</option>
                        <option value="link" {{ old('tipe', $materi->tipe) == 'link' ? 'selected' : '' }}>Link (URL)</option>
                    </select>
                </div>
                
                <div id="file-field" class="mb-4 {{ $materi->tipe == 'link' ? 'hidden' : '' }}">
                    <label for="file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                    @if($materi->file_path)
                        <div class="mb-2 flex items-center">
                            <span class="text-sm text-gray-700 mr-3">File saat ini:</span>
                            <a href="{{ Storage::url($materi->file_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($materi->file_path) }}</a>
                        </div>
                    @endif
                    <input type="file" name="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <p class="text-sm text-gray-500 mt-1">Format yang didukung: PDF, Word (.doc, .docx), Excel (.xls, .xlsx), PowerPoint (.ppt, .pptx). Maksimal 10MB.</p>
                    <p class="text-sm text-gray-500">Biarkan kosong jika tidak ingin mengubah file.</p>
                </div>
                
                <div id="link-field" class="mb-4 {{ $materi->tipe == 'file' ? 'hidden' : '' }}">
                    <label for="link_url" class="block text-gray-700 text-sm font-bold mb-2">Link URL</label>
                    <input type="url" name="link_url" id="link_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('link_url', $materi->link_url) }}" placeholder="https://...">
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
        const tipeValue = document.getElementById('tipe').value;
        const fileField = document.getElementById('file-field');
        const linkField = document.getElementById('link-field');
        
        if (tipeValue === 'file') {
            fileField.classList.remove('hidden');
            linkField.classList.add('hidden');
            document.getElementById('link_url').removeAttribute('required');
        } else {
            fileField.classList.add('hidden');
            linkField.classList.remove('hidden');
            document.getElementById('link_url').setAttribute('required', 'required');
        }
    }
    
    // Run on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleFields();
    });
</script>
@endsection
