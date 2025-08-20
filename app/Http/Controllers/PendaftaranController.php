<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Pendaftaran;
use App\Support\MidtransLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;

// Load Midtrans classes manually
MidtransLoader::load();

// Now we can use the Midtrans classes
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap;
use Midtrans\Notification;

class PendaftaranController extends Controller
{
    // Tampilkan form pendaftaran (opsional, jika ingin route terpisah)
    public function create($kursusId)
    {
        $course = Kursus::with('kategori')->findOrFail($kursusId);
        return view('welcome.courses.register', compact('course'));
    }

    // Proses simpan pendaftaran
    public function store(Request $request, $kursusId)
    {
        $course = Kursus::findOrFail($kursusId);
        $user = Auth::user();

        $validated = $request->validate([
            'no_hp' => 'required|string|max:30',
            'catatan' => 'required|string|max:500',
        ]);

        $totalBayar = ($course->harga_diskon && $course->harga_diskon != $course->harga_asli)
            ? $course->harga_diskon
            : $course->harga_asli;

        $pendaftaran = Pendaftaran::create([
            'user_id' => $user->id,
            'kursus_id' => $course->id,
            'nama' => $user->name,
            'email' => $user->email,
            'no_hp' => $validated['no_hp'],
            'catatan' => $validated['catatan'],
            'total_bayar' => $totalBayar,
            'status' => 'pending',
        ]);

        // Redirect ke halaman sukses atau pembayaran
        return redirect()->route('courses.register.success', ['id' => $pendaftaran->id])
            ->with('success', 'Pendaftaran berhasil! Silakan lanjutkan pembayaran.');
    }

    // Halaman sukses pendaftaran (opsional)
    public function success($id)
    {
        $pendaftaran = Pendaftaran::with('kursus')->findOrFail($id);
        return view('welcome.courses.register_success', compact('pendaftaran'));
    }

    // Halaman riwayat pendaftaran user
    public function riwayat()
    {
        $pendaftarans = Pendaftaran::with('kursus.kategori')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();
        return view('welcome.courses.riwayat', compact('pendaftarans'));
    }

    // Method getSnapToken dengan konfigurasi yang sama dengan CheckoutController
    public function getSnapToken($id)
    {
        try {
            $pendaftaran = Pendaftaran::with('kursus')->findOrFail($id);

            if ($pendaftaran->user_id != auth()->id()) {
                Log::warning('Unauthorized access attempt', [
                    'pendaftaran_id' => $id,
                    'user_id' => auth()->id(),
                    'owner_id' => $pendaftaran->user_id
                ]);
                return response()->json(['success' => false, 'message' => 'Tidak ada akses'], 403);
            }

            if ($pendaftaran->status !== 'pending') {
                Log::info('Invalid status for payment', [
                    'pendaftaran_id' => $id,
                    'current_status' => $pendaftaran->status
                ]);
                return response()->json(['success' => false, 'message' => 'Status sudah tidak dapat dibayar'], 400);
            }

            // Konfigurasi Midtrans - SAMA DENGAN CheckoutController
            MidtransConfig::$serverKey = config('services.midtrans.serverKey');
            MidtransConfig::$isProduction = config('services.midtrans.isProduction');
            MidtransConfig::$isSanitized = true;
            MidtransConfig::$is3ds = true;

            // Buat order_id unik dengan format yang sama
            $orderId = 'KURSUS-' . time() . '-' . $pendaftaran->id;

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $pendaftaran->total_bayar,
                ],
                'customer_details' => [
                    'first_name' => $pendaftaran->nama,
                    'email' => $pendaftaran->email,
                    'phone' => $pendaftaran->no_hp,
                ],
                'item_details' => [
                    [
                        'id' => 'KURSUS-' . $pendaftaran->kursus->id,
                        'price' => (int) $pendaftaran->total_bayar,
                        'quantity' => 1,
                        'name' => $pendaftaran->kursus->nama,
                    ]
                ]
            ];

            Log::info('Creating Snap Token', [
                'order_id' => $orderId,
                'pendaftaran_id' => $id,
                'amount' => $pendaftaran->total_bayar,
                'user_id' => auth()->id()
            ]);

            $snapToken = Snap::getSnapToken($params);

            // Simpan order_id agar bisa dicocokkan saat callback
            $pendaftaran->update(['order_id' => $orderId]);

            Log::info('Snap Token Created Successfully', [
                'order_id' => $orderId,
                'pendaftaran_id' => $id,
                'token' => substr($snapToken, 0, 20) . '...'
            ]);

            return response()->json([
                'success' => true,
                'token' => $snapToken,
                'order_id' => $orderId,
            ]);

        } catch (\Exception $e) {
            Log::error('Snap Token Error', [
                'pendaftaran_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat Snap Token: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Callback handler untuk Midtrans
    public function handleCallback(Request $request)
    {
        try {
            // Konfigurasi yang sama dengan CheckoutController
            MidtransConfig::$serverKey = config('services.midtrans.serverKey');
            MidtransConfig::$isProduction = config('services.midtrans.isProduction');

            $notification = new Notification();

            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status ?? null;
            $transactionId = $notification->transaction_id;

            Log::info('Midtrans Callback Received', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'fraud_status' => $fraudStatus,
                'transaction_id' => $transactionId
            ]);

            // Extract pendaftaran ID dari order_id
            $orderParts = explode('-', $orderId);
            if (count($orderParts) < 3) {
                Log::error('Invalid order_id format', ['order_id' => $orderId]);
                return response('Invalid order_id', 400);
            }

            $pendaftaranId = $orderParts[2]; // KURSUS-timestamp-ID

            if (!$pendaftaranId || !is_numeric($pendaftaranId)) {
                Log::error('Invalid pendaftaran_id from order_id', [
                    'order_id' => $orderId,
                    'extracted_id' => $pendaftaranId
                ]);
                return response('Invalid order_id', 400);
            }

            $pendaftaran = Pendaftaran::find($pendaftaranId);
            if (!$pendaftaran) {
                Log::error('Pendaftaran not found', ['pendaftaran_id' => $pendaftaranId]);
                return response('Pendaftaran not found', 404);
            }

            // Mapping status dari Midtrans ke enum kita
            $newStatus = match ($transactionStatus) {
                'capture' => ($fraudStatus == 'challenge') ? 'pending' : 'paid',
                'settlement' => 'paid',
                'pending' => 'pending',
                'deny', 'expire', 'cancel' => 'canceled',
                default => $pendaftaran->status,
            };

            $pendaftaran->update([
                'status' => $newStatus,
                'transaction_id' => $transactionId
            ]);

            Log::info('Pendaftaran status updated', [
                'pendaftaran_id' => $pendaftaranId,
                'old_status' => $pendaftaran->getOriginal('status'),
                'new_status' => $newStatus,
                'transaction_id' => $transactionId
            ]);

            return response('OK', 200);

        } catch (\Exception $e) {
            Log::error('Callback Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response('Callback Error', 500);
        }
    }

    // Handle finish payment redirect
    public function paymentFinish(Request $request)
    {
        $orderId = $request->get('order_id');
        $statusCode = $request->get('status_code');
        $transactionStatus = $request->get('transaction_status');

        Log::info('Payment Finish', [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'transaction_status' => $transactionStatus
        ]);

        // Extract pendaftaran ID
        $orderParts = explode('-', $orderId);
        $pendaftaranId = $orderParts[2] ?? null; // KURSUS-timestamp-ID

        if ($pendaftaranId && is_numeric($pendaftaranId)) {
            $pendaftaran = Pendaftaran::find($pendaftaranId);
            if ($pendaftaran) {
                return redirect()->route('courses.register.success', ['id' => $pendaftaranId])
                    ->with('payment_status', $transactionStatus);
            }
        }

        return redirect()->route('pendaftaran.riwayat')
            ->with('error', 'Pembayaran selesai, silakan cek status di riwayat pendaftaran.');
    }

    // Handle payment error redirect
    public function paymentError(Request $request)
    {
        Log::info('Payment Error', $request->all());
        return redirect()->route('pendaftaran.riwayat')
            ->with('error', 'Terjadi kesalahan dalam proses pembayaran.');
    }

    // Handle pending payment redirect  
    public function paymentPending(Request $request)
    {
        Log::info('Payment Pending', $request->all());
        return redirect()->route('pendaftaran.riwayat')
            ->with('info', 'Pembayaran Anda sedang diproses.');
    }
    
    /**
     * Update status pendaftaran langsung dari frontend setelah pembayaran berhasil
     * 
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $pendaftaran = Pendaftaran::findOrFail($id);
            
            // Validasi bahwa user yang melakukan request adalah pemilik pendaftaran
            if ($pendaftaran->user_id !== auth()->id()) {
                Log::warning('Unauthorized attempt to update pendaftaran status', [
                    'pendaftaran_id' => $id,
                    'auth_user' => auth()->id(),
                    'pendaftaran_user' => $pendaftaran->user_id
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }
            
            // Validasi request
            $request->validate([
                'status' => 'required|string|in:pending,paid,canceled',
                'transaction_id' => 'nullable|string'
            ]);
            
            // Update pendaftaran
            $pendaftaran->update([
                'status' => $request->status,
                'transaction_id' => $request->transaction_id
            ]);
            
            Log::info('Pendaftaran status updated from frontend', [
                'pendaftaran_id' => $id,
                'old_status' => $pendaftaran->getOriginal('status'),
                'new_status' => $request->status,
                'transaction_id' => $request->transaction_id
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui',
                'data' => [
                    'status' => $pendaftaran->status
                ]
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error updating pendaftaran status from frontend', [
                'pendaftaran_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status: ' . $e->getMessage()
            ], 500);
        }
    }
}