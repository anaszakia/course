<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Tugas;
use App\Models\PengumpulanTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AllSubmissionsController extends Controller
{
    /**
     * Display a listing of all task submissions across all courses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $keyword = $request->query('search');
            $status = $request->query('status');
            $course_id = $request->query('course_id');
            
            $submissions = PengumpulanTugas::with(['tugas.kursus', 'user'])
                ->when($keyword, function($query) use ($keyword) {
                    $query->whereHas('user', function($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%")
                          ->orWhere('email', 'like', "%{$keyword}%");
                    })
                    ->orWhereHas('tugas', function($q) use ($keyword) {
                        $q->where('judul', 'like', "%{$keyword}%");
                    });
                })
                ->when($status, function($query) use ($status) {
                    if ($status === 'graded') {
                        $query->whereNotNull('nilai');
                    } elseif ($status === 'ungraded') {
                        $query->whereNull('nilai');
                    }
                })
                ->when($course_id, function($query) use ($course_id) {
                    $query->whereHas('tugas', function($q) use ($course_id) {
                        $q->where('kursus_id', $course_id);
                    });
                })
                ->latest()
                ->paginate(15)
                ->appends([
                    'search' => $keyword,
                    'status' => $status,
                    'course_id' => $course_id
                ]);
            
            $courses = Kursus::orderBy('nama')->get();
            
            return view('admin.tugas.all-submissions', compact('submissions', 'courses', 'keyword', 'status', 'course_id'));
        } catch (\Exception $e) {
            Log::error('Error fetching all submissions', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Terjadi kesalahan saat mengambil data pengumpulan tugas');
        }
    }

    /**
     * Download submission file
     *
     * @param int $kursus_id
     * @param int $tugas_id  
     * @param int $submission_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function download($kursus_id, $tugas_id, $submission_id)
    {
        try {
            $submission = PengumpulanTugas::with(['tugas.kursus', 'user'])
                ->where('id', $submission_id)
                ->whereHas('tugas', function($q) use ($tugas_id, $kursus_id) {
                    $q->where('id', $tugas_id)
                      ->where('kursus_id', $kursus_id);
                })
                ->first();

            if (!$submission) {
                return back()->with('error', 'Pengumpulan tugas tidak ditemukan');
            }

            if (!$submission->file_path) {
                return back()->with('error', 'File tidak ditemukan');
            }

            // Check if file exists in storage
            if (!Storage::disk('public')->exists($submission->file_path)) {
                return back()->with('error', 'File tidak ditemukan di storage');
            }

            $filePath = Storage::disk('public')->path($submission->file_path);
            $fileName = $submission->user->name . '_' . $submission->tugas->judul . '_' . basename($submission->file_path);

            return response()->download($filePath, $fileName);

        } catch (\Exception $e) {
            Log::error('Error downloading submission file', [
                'submission_id' => $submission_id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->with('error', 'Terjadi kesalahan saat mendownload file');
        }
    }
}