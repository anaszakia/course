<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Materi;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseMateriController extends Controller
{
    /**
     * Check if user is enrolled to the course
     */
    private function checkEnrollment($kursus_id)
    {
        $user_id = Auth::id();
        $enrollment = Pendaftaran::where('user_id', $user_id)
            ->where('kursus_id', $kursus_id)
            ->where('status', 'paid')
            ->first();
            
        if (!$enrollment) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Display course material and assignments.
     */
    public function index($kursus_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $kursus = Kursus::with(['materi' => function($query) {
            $query->orderBy('urutan', 'asc');
        }])->findOrFail($kursus_id);
        
        $materis = $kursus->materi;
        $materi = $materis->first(); // Materi pertama sebagai default
        
        $tugas = Tugas::where('kursus_id', $kursus_id)->get();
        
        $user_id = Auth::id();
        $pengumpulan = PengumpulanTugas::whereHas('tugas', function($query) use ($kursus_id) {
            $query->where('kursus_id', $kursus_id);
        })->where('user_id', $user_id)->get()->keyBy('tugas_id');
        
        // Tidak perlu prevMateri dan nextMateri di halaman index karena ini adalah daftar materi
        
        return view('welcome.courses.materi-show', compact('kursus', 'materi', 'materis', 'tugas', 'pengumpulan'));
    }
    
    /**
     * View a specific material.
     */
    public function show($kursus_id, $materi_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $kursus = Kursus::with('materi')->findOrFail($kursus_id);
        $materi = Materi::findOrFail($materi_id);
        
        if ($materi->kursus_id != $kursus_id) {
            return redirect()->route('courses.materi', $kursus_id)->with('error', 'Materi tidak ditemukan.');
        }
        
        // Get all tugas for this course
        $tugas = Tugas::where('kursus_id', $kursus_id)->get();
        
        // Get user submissions
        $user_id = Auth::id();
        $pengumpulan = PengumpulanTugas::whereHas('tugas', function($query) use ($kursus_id) {
            $query->where('kursus_id', $kursus_id);
        })->where('user_id', $user_id)->get()->keyBy('tugas_id');
        
        // Get previous and next materi
        $materiIds = $kursus->materi->sortBy('urutan')->pluck('id')->toArray();
        $currentIndex = array_search($materi_id, $materiIds);
        
        $prevMateri = ($currentIndex > 0) ? Materi::find($materiIds[$currentIndex - 1]) : null;
        $nextMateri = ($currentIndex < count($materiIds) - 1) ? Materi::find($materiIds[$currentIndex + 1]) : null;
        
        return view('welcome.courses.materi-show', compact('kursus', 'materi', 'tugas', 'pengumpulan', 'prevMateri', 'nextMateri'));
    }
    
    /**
     * Download a material file.
     */
    public function downloadMateri($kursus_id, $materi_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $materi = Materi::findOrFail($materi_id);
        
        if ($materi->kursus_id != $kursus_id) {
            return redirect()->route('courses.materi', $kursus_id)->with('error', 'Materi tidak ditemukan.');
        }
        
        if ($materi->tipe != 'file' || !$materi->file_path) {
            return redirect()->back()->with('error', 'File tidak tersedia untuk diunduh.');
        }
        
        return Storage::disk('public')->download($materi->file_path, $materi->judul . '.' . $materi->file_type);
    }
    
    /**
     * Download assignment file.
     */
    public function downloadTugas($kursus_id, $tugas_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $tugas = Tugas::findOrFail($tugas_id);
        
        if ($tugas->kursus_id != $kursus_id) {
            return redirect()->route('courses.materi', $kursus_id)->with('error', 'Tugas tidak ditemukan.');
        }
        
        if (!$tugas->file_path) {
            return redirect()->back()->with('error', 'File tidak tersedia untuk diunduh.');
        }
        
        $fileName = $tugas->judul;
        if ($tugas->file_type) {
            $fileName .= '.' . $tugas->file_type;
        }
        
        return Storage::disk('public')->download($tugas->file_path, $fileName);
    }
    
    /**
     * Download submission file.
     */
    public function downloadSubmission($kursus_id, $tugas_id, $submission_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $pengumpulan = PengumpulanTugas::findOrFail($submission_id);
        
        if ($pengumpulan->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke file ini.');
        }
        
        $tugas = Tugas::findOrFail($tugas_id);
        
        if ($tugas->kursus_id != $kursus_id || $pengumpulan->tugas_id != $tugas_id) {
            return redirect()->route('courses.materi', $kursus_id)->with('error', 'File tidak ditemukan.');
        }
        
        if (!$pengumpulan->file_path) {
            return redirect()->back()->with('error', 'File tidak tersedia untuk diunduh.');
        }
        
        return Storage::disk('public')->download($pengumpulan->file_path);
    }
    
    /**
     * Show form to submit assignment.
     */
    public function showSubmissionForm($kursus_id, $tugas_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $kursus = Kursus::with('materi')->findOrFail($kursus_id);
        $tugas = Tugas::findOrFail($tugas_id);
        
        if ($tugas->kursus_id != $kursus_id) {
            return redirect()->route('courses.materi', $kursus_id)->with('error', 'Tugas tidak ditemukan.');
        }
        
        // Get all assignments for this course
        $semuaTugas = Tugas::where('kursus_id', $kursus_id)->get();
        
        $user_id = Auth::id();
        
        // Get all user submissions for this course
        $pengumpulanAll = PengumpulanTugas::whereHas('tugas', function($query) use ($kursus_id) {
            $query->where('kursus_id', $kursus_id);
        })->where('user_id', $user_id)->get();
        
        // Index submissions by tugas_id for easy access
        $pengumpulan = [];
        foreach ($pengumpulanAll as $p) {
            $pengumpulan[$p->tugas_id] = $p;
        }
        
        // Get specific submission for this assignment
        $sudahMengumpulkan = isset($pengumpulan[$tugas_id]);
        $pengumpulanUser = $sudahMengumpulkan ? $pengumpulan[$tugas_id] : null;
        
        return view('welcome.courses.tugas-submit', compact('kursus', 'tugas', 'semuaTugas', 'pengumpulan', 'sudahMengumpulkan', 'pengumpulanUser'));
    }
    
    /**
     * Submit assignment.
     */
    public function submitAssignment(Request $request, $kursus_id, $tugas_id)
    {
        // Check if user is enrolled
        if (!$this->checkEnrollment($kursus_id)) {
            return redirect()->route('welcome')->with('error', 'Anda belum terdaftar pada kursus ini atau belum melakukan pembayaran.');
        }
        
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:10240', // Max 10MB
            'komentar' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $user_id = Auth::id();
        
        // Check if tugas belongs to the course
        $tugas = Tugas::where('id', $tugas_id)
            ->where('kursus_id', $kursus_id)
            ->firstOrFail();
            
        // Check deadline if set
        if ($tugas->batas_waktu && now() > $tugas->batas_waktu) {
            return redirect()->back()->with('error', 'Batas waktu pengumpulan tugas telah berakhir.');
        }
        
        // Check if user has already submitted
        $pengumpulan = PengumpulanTugas::where('tugas_id', $tugas_id)
            ->where('user_id', $user_id)
            ->first();
            
        if ($pengumpulan) {
            // Delete old file
            if ($pengumpulan->file_path) {
                Storage::disk('public')->delete($pengumpulan->file_path);
            }
            
            // Update submission
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $user_id . '_' . time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('pengumpulan', $fileName, 'public');
                
                $pengumpulan->file_path = $filePath;
                $pengumpulan->komentar = $request->komentar;
                $pengumpulan->status = 'submitted'; // Reset status if resubmitted
                $pengumpulan->nilai = null; // Reset nilai if resubmitted
                $pengumpulan->feedback = null; // Reset feedback if resubmitted
                $pengumpulan->save();
                
                return redirect()->back()->with('success', 'Tugas berhasil diperbarui.');
            }
        } else {
            // Create new submission
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $user_id . '_' . time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('pengumpulan', $fileName, 'public');
                
                PengumpulanTugas::create([
                    'tugas_id' => $tugas_id,
                    'user_id' => $user_id,
                    'file_path' => $filePath,
                    'komentar' => $request->komentar,
                    'status' => 'submitted',
                ]);
                
                return redirect()->back()->with('success', 'Tugas berhasil dikumpulkan.');
            }
        }
        
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengumpulkan tugas.');
    }
}
