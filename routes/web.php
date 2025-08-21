<?php

use App\Models\Kursus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\CourseMateriController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\AllSubmissionsController;
use App\Http\Controllers\Admin\TransaksiController;


// Route untuk halaman login dan register Admin
Route::middleware('guest')->group(function () {
    // Form login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
         ->name('login');

    // Proses login
    Route::post('/login', [LoginController::class, 'login'])
         ->middleware('log.sensitive')
         ->name('login.submit');

    // Form register
    Route::get('/register', [LoginController::class, 'showRegisterForm'])
         ->name('register');

    // Proses register
    Route::post('/register', [LoginController::class, 'register'])
         ->middleware('log.sensitive')
         ->name('register.submit');
});

// Logout (method POST demi keamanan; pakai @csrf di form logout)
Route::post('/logout', [LoginController::class, 'logout'])
     ->middleware(['auth', 'log.sensitive'])
     ->name('logout');



    // ========== ROUTE USER (FRONTEND) ==========
    Route::prefix('user')->name('user.')->group(function () {
        // hanya bisa diakses tamu (belum login)
        Route::middleware('guest', 'log.sensitive')->group(function () {
            // Form login user
            Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
            // Proses login user
            Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
            // Form register user
            Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
            // Proses register user
            Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit');
        });
        // Logout user
        Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('auth')->name('logout');
    });
// Profile routes untuk admin & user, tetap pakai log.sensitive
Route::middleware(['auth', 'log.sensitive'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// auth admin
Route::middleware(['auth', 'role:admin', 'log.sensitive'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
        Route::resource('users', UserController::class);
        // Audit Log routes
        Route::get('/audit', [AuditLogController::class, 'index'])->name('audit.index');
        Route::get('/audit/{auditLog}', [AuditLogController::class, 'show'])->name('audit.show');
        Route::post('/audit/export', [AuditLogController::class, 'export'])->name('audit.export');
        // Tambahkan resource lain untuk admin jika diperlukan
        Route::resource('kategoris', KategoriController::class);
        Route::resource('kursus', KursusController::class);
        Route::get('/kursus/{kursus}/peserta', [KursusController::class, 'peserta'])->name('kursus.peserta');
        
        // Riwayat Transaksi routes
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
        Route::put('/transaksi/{id}/status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
        Route::post('/transaksi/export', [TransaksiController::class, 'export'])->name('transaksi.export');
        
        // Materi routes
        Route::get('/kursus/{kursus_id}/materi', [MateriController::class, 'index'])->name('materi.index');
        Route::get('/kursus/{kursus_id}/materi/create', [MateriController::class, 'create'])->name('materi.create');
        Route::post('/kursus/{kursus_id}/materi', [MateriController::class, 'store'])->name('materi.store');
        Route::get('/kursus/{kursus_id}/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');
        Route::put('/kursus/{kursus_id}/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
        Route::delete('/kursus/{kursus_id}/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
        
        // Tugas routes
        Route::get('/kursus/{kursus_id}/tugas', [TugasController::class, 'index'])->name('tugas.index');
        Route::get('/kursus/{kursus_id}/tugas/create', [TugasController::class, 'create'])->name('tugas.create');
        Route::post('/kursus/{kursus_id}/tugas', [TugasController::class, 'store'])->name('tugas.store');
        Route::get('/kursus/{kursus_id}/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
        Route::put('/kursus/{kursus_id}/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');
        Route::delete('/kursus/{kursus_id}/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
        Route::get('/kursus/{kursus_id}/tugas/{id}/submissions', [TugasController::class, 'submissions'])->name('tugas.submissions');
        Route::get('/kursus/{kursus_id}/tugas/{tugas_id}/submission/{submission_id}/grade', [TugasController::class, 'showGradeForm'])->name('tugas.grade.show');
        Route::post('/kursus/{kursus_id}/tugas/{tugas_id}/submission/{submission_id}/grade', [TugasController::class, 'grade'])->name('tugas.grade');
        
        // Route for viewing all submissions across all courses
        Route::get('/tugas/submissions', [AllSubmissionsController::class, 'index'])->name('tugas.submissions');
        Route::get('/tugas/{kursus_id}/submissions/{tugas_id}/download/{submission_id}', 
        [AllSubmissionsController::class, 'download'])
        ->name('tugas.submissions.download');
    });

// auth user
Route::middleware(['auth', 'role:user', 'log.sensitive'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        // Tambahkan resource lain untuk user jika diperlukan
    });

// Tampilkan halaman welcome/home saat mengakses domain utama
Route::get('/', function () {
    $popularCourses = Kursus::with('kategori')
        ->where('status', 'aktif')
        ->latest()
        ->take(3)
        ->get();
    return view('welcome.home', compact('popularCourses'));
});
// Route untuk halaman tentang kami
Route::get('/tentang-kami', function () {
    return view('welcome.about');
})->name('about');

// Route untuk program kursus
Route::get('/program-kursus/kelas-reguler', function () {
    return view('welcome.courses.regular');
})->name('courses.regular');

Route::get('/program-kursus/private', function () {
    return view('welcome.courses.private');
})->name('courses.private');

// Route untuk halaman hubungi kami
Route::get('/hubungi-kami', function () {
    return view('welcome.contact');
})->name('contact');

// Route untuk halaman regular
Route::get('/regular', function () {
    return view('welcome.courses.regular');
})->name('courses.regular');

// Redirect /admin ke halaman login admin jika belum login
Route::get('/admin', function () {
    return redirect()->route('login');
});

//detail kurusus
Route::get('/program-kursus/detail/{id}', function ($id) {
    $course = Kursus::with('kategori')->findOrFail($id);
    return view('welcome.courses.detail', compact('course'));
})->name('courses.detail');

//daftar kursus
Route::get('/program-kursus/daftar/{id}', function ($id) {
    $course = Kursus::with('kategori')->findOrFail($id);
    return view('welcome.courses.register', compact('course'));
})->middleware(['auth', 'log.sensitive'])->name('courses.register');

// Route proses simpan pendaftaran kursus
Route::post('/program-kursus/daftar/{kursusId}', [PendaftaranController::class, 'store'])->middleware(['auth', 'log.sensitive'])->name('pendaftaran.store');
// Route halaman sukses pendaftaran kursus
Route::get('/program-kursus/daftar/sukses/{id}', [PendaftaranController::class, 'success'])->middleware(['auth', 'log.sensitive'])->name('courses.register.success');
// Route halaman riwayat pendaftaran kursus user
Route::get('/riwayat-pendaftaran', [PendaftaranController::class, 'riwayat'])->middleware(['auth', 'log.sensitive'])->name('pendaftaran.riwayat');
// Endpoint AJAX untuk generate Snap Token Midtrans
Route::post('/midtrans/token/{id}', [PendaftaranController::class, 'getSnapToken'])->middleware(['auth', 'log.sensitive'])->name('midtrans.token');

//implementasi Midtrans
// Route untuk callback Midtrans
Route::post('/payment/callback', [PendaftaranController::class, 'handleCallback'])->middleware('log.sensitive')->name('payment.callback');
// Route untuk update status dari frontend setelah pembayaran berhasil
Route::post('/pendaftaran/{id}/update-status', [PendaftaranController::class, 'updateStatus'])->middleware(['auth', 'log.sensitive'])->name('pendaftaran.update-status');

// Route untuk redirect setelah payment
Route::get('/payment/finish', [PendaftaranController::class, 'paymentFinish'])->middleware('log.sensitive')->name('payment.finish');
Route::get('/payment/error', [PendaftaranController::class, 'paymentError'])->middleware('log.sensitive')->name('payment.error');
Route::get('/payment/pending', [PendaftaranController::class, 'paymentPending'])->middleware('log.sensitive')->name('payment.pending');
// Route untuk mendapatkan Snap Token
Route::get('/pendaftaran/{id}/snap-token', [PendaftaranController::class, 'getSnapToken'])
    ->name('pendaftaran.snap-token')
    ->middleware(['auth', 'log.sensitive']);
// web.php
Route::get('/courses/{id}/pay', [PendaftaranController::class, 'getSnapToken'])->middleware('log.sensitive')->name('courses.pay');
Route::post('/midtrans/callback', [PendaftaranController::class, 'handleCallback']);

// Course Material Routes for Students
Route::middleware(['auth', 'log.sensitive'])->group(function () {
    // Course material routes
    Route::get('/courses/materi/{id}', [CourseMateriController::class, 'index'])->name('courses.materi');
    Route::get('/courses/{kursus_id}/materi/{materi_id}', [CourseMateriController::class, 'show'])->name('courses.materi.show');
    Route::get('/courses/{kursus_id}/materi/{materi_id}/download', [CourseMateriController::class, 'downloadMateri'])->name('courses.materi.download');
    
    // Assignment routes
    Route::get('/courses/{kursus_id}/tugas/{tugas_id}/submit', [CourseMateriController::class, 'showSubmissionForm'])->name('courses.tugas.submit');
    Route::post('/courses/{kursus_id}/tugas/{tugas_id}/submit', [CourseMateriController::class, 'submitAssignment'])->name('courses.tugas.submit.post');
    Route::get('/courses/{kursus_id}/tugas/{tugas_id}/download', [CourseMateriController::class, 'downloadTugas'])->name('courses.tugas.download');
    Route::get('/courses/{kursus_id}/tugas/{tugas_id}/pengumpulan/{submission_id}/download', [CourseMateriController::class, 'downloadSubmission'])->name('courses.pengumpulan.download');
});