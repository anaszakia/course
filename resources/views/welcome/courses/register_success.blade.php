@extends('welcome.layouts.app')

@section('title', 'Pembayaran Kursus')

@section('content')
<section class="py-20 bg-white relative">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Tombol Kembali -->
        <a href="#" onclick="event.preventDefault(); window.history.back();" class="absolute left-4 top-4 bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg shadow transition duration-200 flex items-center z-20">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
        
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Pembayaran Kursus</h1>
        
        <!-- Detail Kursus -->
        <div class="bg-gray-50 rounded-xl shadow p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $pendaftaran->kursus->nama }}</h2>
            <div class="flex gap-2 mb-2">
                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-medium">{{ ucfirst($pendaftaran->kursus->level) }}</span>
                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">{{ $pendaftaran->kursus->kategori->nama ?? '-' }}</span>
            </div>
            <p class="text-gray-700 text-sm mb-2">{{ $pendaftaran->kursus->deskripsi }}</p>
            <div class="text-gray-600 text-sm mb-2">
                <span>Mulai: <span class="text-blue-600 font-medium">{{ \Carbon\Carbon::parse($pendaftaran->kursus->tanggal_mulai)->format('d-m-Y') }}</span></span>
                <span class="mx-2">-</span>
                <span>Selesai: <span class="text-green-600 font-medium">{{ \Carbon\Carbon::parse($pendaftaran->kursus->tanggal_selesai)->format('d-m-Y') }}</span></span>
            </div>
            <div class="mt-2">
                <span class="text-2xl font-bold text-blue-600">Rp. {{ number_format($pendaftaran->total_bayar, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Status Pembayaran -->
        @if($pendaftaran->status === 'paid')
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-green-800">Pembayaran Berhasil!</span>
                </div>
                <p class="text-green-700 text-sm mt-2">Terima kasih, pembayaran Anda sudah berhasil diproses.</p>
            </div>
        @elseif($pendaftaran->status === 'pending')
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-blue-800">Menunggu Pembayaran</span>
                </div>
                <p class="text-blue-700 text-sm mt-2">Silakan selesaikan pembayaran Anda melalui Midtrans.</p>
            </div>
            
            <!-- Instruksi Pembayaran -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <div class="font-semibold text-yellow-800 mb-2">Langkah Pembayaran</div>
                <ol class="list-decimal list-inside text-yellow-900 text-sm space-y-1">
                    <li>Silakan klik tombol "Bayar Sekarang" di bawah untuk melanjutkan pembayaran melalui Midtrans.</li>
                    <li>Setelah pembayaran berhasil, status pendaftaran Anda akan otomatis diperbarui.</li>
                    <li>Jika mengalami kendala, silakan hubungi admin.</li>
                </ol>
            </div>
        @elseif($pendaftaran->status === 'canceled')
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-red-800">Pembayaran Dibatalkan</span>
                </div>
                <p class="text-red-700 text-sm mt-2">Silakan lakukan pendaftaran ulang untuk melanjutkan pembayaran.</p>
            </div>
        @endif

        <!-- Tombol Bayar atau Status -->
        @if($pendaftaran->status === 'pending')
            <!-- Loading indicator -->
            <div id="loading" class="hidden text-center mb-4">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-600 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-blue-600">Memproses pembayaran...</span>
            </div>

            <!-- Form Pembayaran -->
            <button type="button" id="pay-button" class="w-full bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Bayar Sekarang
            </button>
        @elseif($pendaftaran->status === 'paid')
            <div class="text-center">
                <a href="{{ route('pendaftaran.riwayat') }}" class="bg-green-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-700 transition duration-300 inline-block">
                    Lihat Riwayat Pendaftaran
                </a>
            </div>
        @else
            <div class="text-center">
                <a href="{{ route('welcome') }}" class="bg-gray-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-700 transition duration-300 inline-block">
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</section>


@php
    $clientKey = config('services.midtrans.clientKey');
    $isProduction = config('services.midtrans.isProduction', false);
    $snapUrl = $isProduction 
        ? 'https://app.midtrans.com/snap/snap.js'
        : 'https://app.sandbox.midtrans.com/snap/snap.js';
@endphp

<!-- Tambahkan meta CSRF token khusus untuk halaman ini -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    const MIDTRANS = {
        clientKey: '{{ $clientKey }}',
        isProduction: {{ $isProduction ? 'true' : 'false' }},
        snapUrl: '{{ $snapUrl }}'
    };
    
    // Debug info
    console.log('MIDTRANS Configuration:', {
        clientKey: MIDTRANS.clientKey ? ('Key exists (length: ' + MIDTRANS.clientKey.length + ')') : 'Key is missing',
        isProduction: MIDTRANS.isProduction,
        snapUrl: MIDTRANS.snapUrl
    });

    function loadMidtrans() {
        return new Promise((resolve, reject) => {
            console.log('Starting loadMidtrans function');
            // Log the client key length and first/last characters for debug
            if (MIDTRANS.clientKey) {
                const keyLength = MIDTRANS.clientKey.length;
                const firstChars = MIDTRANS.clientKey.substring(0, 4);
                const lastChars = MIDTRANS.clientKey.substring(keyLength - 4);
                console.log(`Client Key Length: ${keyLength}, First chars: ${firstChars}..., Last chars: ...${lastChars}`);
            } else {
                console.log('Client Key is undefined or null');
            }
            
            if (!MIDTRANS.clientKey || MIDTRANS.clientKey.trim() === '') {
                console.error('Client Key is empty or only whitespace');
                reject(new Error('Client Key Midtrans kosong!')); 
                return;
            }
            
            if (window.snap) {
                console.log('Snap already loaded, resolving immediately');
                return resolve();
            }
            
            // Metode alternatif menggunakan tag script langsung di halaman
            try {
                console.log('Menggunakan metode alternatif untuk load Snap.js');
                
                // Hapus script lama jika ada
                const oldScript = document.querySelector('script[src*="snap.js"]');
                if (oldScript) {
                    oldScript.remove();
                }
                
                // Metode 1: Menggunakan script tag yang sudah ada di halaman
                const scriptTag = document.createElement('script');
                scriptTag.type = 'text/javascript';
                scriptTag.src = MIDTRANS.snapUrl;
                scriptTag.setAttribute('data-client-key', MIDTRANS.clientKey);
                scriptTag.async = true;
                
                scriptTag.onload = function() {
                    console.log('Script berhasil dimuat dengan metode alternatif');
                    // Tunggu 500ms untuk pastikan snap diinisialisasi
                    setTimeout(() => {
                        if (window.snap) {
                            console.log('window.snap tersedia setelah timeout');
                            resolve();
                        } else {
                            console.error('window.snap tidak tersedia setelah timeout');
                            reject(new Error('Snap tidak tersedia setelah script dimuat'));
                        }
                    }, 500);
                };
                
                scriptTag.onerror = function(error) {
                    console.error('Gagal memuat script dengan metode alternatif:', error);
                    reject(new Error('Gagal memuat Snap.js dengan metode alternatif'));
                };
                
                document.body.appendChild(scriptTag);
                console.log('Script ditambahkan ke body');
                
            } catch (error) {
                console.error('Error dalam proses loading Snap.js:', error);
                reject(error);
            }
        });
    }

    function getPaymentToken() {
        const url = "{{ route('midtrans.token', ['id' => $pendaftaran->id]) }}";
        const csrf = document.querySelector('meta[name="csrf-token"]')?.content || 
                     document.querySelector('input[name="_token"]')?.value;
        
        console.log('Mengambil token pembayaran dari URL:', url);
                     
        return fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => {
            if (!res.ok) {
                console.error('Gagal mengambil token:', res.status, res.statusText);
                throw new Error(`Error server! Status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            console.log('Response token pembayaran:', data);
            return data;
        });
    }

    function processPayment() {
        const payBtn = document.getElementById('pay-button');
        const loading = document.getElementById('loading');
        payBtn.disabled = true;
        payBtn.textContent = 'Memproses...';
        loading.classList.remove('hidden');
        
        console.log('Starting payment process...');
        
        getPaymentToken()
            .then(data => {
                if (!data.success || !data.token) {
                    console.error('Token error:', data);
                    throw new Error(data.message || 'Token tidak diterima dari server');
                }
                
                console.log('Payment token received successfully');
                loading.classList.add('hidden');
                
                if (!window.snap) {
                    console.error('Snap.js belum dimuat dengan benar, mencoba memuat ulang...');
                    showAlert('Memuat sistem pembayaran...', 'info');
                    
                    // Coba muat script Snap.js lagi sebagai upaya terakhir
                    const lastTry = document.createElement('script');
                    lastTry.src = MIDTRANS.snapUrl;
                    lastTry.setAttribute('data-client-key', MIDTRANS.clientKey);
                    
                    // Return a promise that resolves when the script is loaded
                    return new Promise((resolve, reject) => {
                        lastTry.onload = function() {
                            // Tunggu sebentar untuk memastikan snap diinisialisasi
                            setTimeout(() => {
                                if (window.snap) {
                                    console.log('Snap.js berhasil dimuat pada upaya terakhir');
                                    // Lanjutkan proses pembayaran
                                    window.snap.pay(data.token, {
                                        onSuccess: (result) => { 
                                            console.log('Payment success:', result);
                                            showAlert('Pembayaran berhasil!', 'success'); 
                                            setTimeout(() => location.reload(), 1000); 
                                        },
                                        onPending: (result) => { 
                                            console.log('Payment pending:', result);
                                            showAlert('Pembayaran sedang diproses', 'info'); 
                                            setTimeout(() => location.reload(), 2000); 
                                        },
                                        onError: (result) => { 
                                            console.error('Payment error:', result);
                                            showAlert('Pembayaran gagal: ' + (result.status_message || 'Error'), 'error'); 
                                            resetButton(); 
                                        },
                                        onClose: () => { 
                                            console.log('Payment window closed');
                                            showAlert('Pembayaran dibatalkan', 'info'); 
                                            resetButton(); 
                                        }
                                    });
                                    resolve();
                                } else {
                                    console.error('Snap.js masih tidak tersedia setelah upaya terakhir');
                                    reject(new Error('Sistem pembayaran Midtrans tidak tersedia. Silakan coba lagi nanti atau hubungi admin.'));
                                }
                            }, 1500);
                        };
                        
                        lastTry.onerror = function() {
                            reject(new Error('Gagal memuat sistem pembayaran Midtrans. Silakan coba lagi nanti.'));
                        };
                        
                        document.body.appendChild(lastTry);
                    });
                }
                
                console.log('Opening Snap payment modal...');
                window.snap.pay(data.token, {
                    onSuccess: (result) => { 
                        console.log('Payment success:', result);
                        showAlert('Pembayaran berhasil!', 'success'); 
                        // Update status pendaftaran ke 'paid' dan perbarui UI
                        updatePaymentStatus('paid', result.transaction_id);
                        setTimeout(() => location.reload(), 2000); 
                    },
                    onPending: (result) => { 
                        console.log('Payment pending:', result);
                        showAlert('Pembayaran sedang diproses', 'info'); 
                        // Update status dengan pending
                        updatePaymentStatus('pending', result.transaction_id);
                        setTimeout(() => location.reload(), 2000); 
                    },
                    onError: (result) => { 
                        console.error('Payment error:', result);
                        showAlert('Pembayaran gagal: ' + (result.status_message || 'Error'), 'error'); 
                        resetButton(); 
                    },
                    onClose: () => { 
                        console.log('Payment window closed');
                        showAlert('Pembayaran dibatalkan', 'info'); 
                        resetButton(); 
                    }
                });
            })
            .catch(error => { 
                console.error('Payment process error:', error);
                showAlert('Error: ' + error.message, 'error'); 
                resetButton(); 
            });
    }

    function resetButton() {
        const payBtn = document.getElementById('pay-button');
        const loading = document.getElementById('loading');
        payBtn.disabled = false;
        payBtn.textContent = 'Bayar Sekarang';
        loading.classList.add('hidden');
    }
    
    // Fungsi untuk mengupdate status pembayaran secara langsung
    function updatePaymentStatus(status, transactionId) {
        const url = "{{ route('pendaftaran.update-status', ['id' => $pendaftaran->id]) }}";
        const csrf = document.querySelector('meta[name="csrf-token"]')?.content || 
                     document.querySelector('input[name="_token"]')?.value;
        
        console.log('Memperbarui status pembayaran:', status);
        
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                status: status,
                transaction_id: transactionId || null
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Status pembayaran berhasil diperbarui:', data);
            
            if (status === 'paid') {
                // Ubah UI ke status pembayaran berhasil
                updateUIToPaid();
            }
        })
        .catch(error => {
            console.error('Gagal memperbarui status pembayaran:', error);
        });
    }
    
    // Fungsi untuk mengubah UI ke status terbayar
    function updateUIToPaid() {
        const paymentSection = document.querySelector('.bg-blue-50');
        const instructionSection = document.querySelector('.bg-yellow-50');
        const payButton = document.getElementById('pay-button');
        const loading = document.getElementById('loading');
        
        // Sembunyikan loading
        loading.classList.add('hidden');
        
        // Ubah tampilan tombol
        payButton.textContent = 'Terbayar';
        payButton.disabled = true;
        payButton.className = 'w-full bg-green-600 text-white px-8 py-4 rounded-lg text-lg font-semibold transition duration-300 opacity-50 cursor-not-allowed';
        
        // Ubah tampilan status
        if (paymentSection) {
            const newStatus = document.createElement('div');
            newStatus.className = 'bg-green-50 border border-green-200 rounded-lg p-4 mb-6';
            newStatus.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold text-green-800">Pembayaran Berhasil!</span>
                </div>
                <p class="text-green-700 text-sm mt-2">Terima kasih, pembayaran Anda sudah berhasil diproses.</p>
            `;
            
            paymentSection.parentNode.replaceChild(newStatus, paymentSection);
        }
        
        // Sembunyikan instruksi pembayaran
        if (instructionSection) {
            instructionSection.style.display = 'none';
        }
    }

    function showAlert(message, type = 'info') {
        const colors = { success: '#10b981', error: '#ef4444', info: '#3b82f6' };
        const alert = document.createElement('div');
        alert.style.cssText = `position: fixed; top: 20px; right: 20px; z-index: 10000; background: ${colors[type]}; color: white; padding: 1rem; border-radius: 8px; max-width: 300px; font-size: 14px;`;
        alert.textContent = message;
        document.body.appendChild(alert);
        setTimeout(() => alert.remove(), 5000);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const payBtn = document.getElementById('pay-button');
        payBtn.textContent = 'Loading...';
        payBtn.disabled = true;
        
        // Coba cek terlebih dahulu apakah snap sudah tersedia dari script tag
        setTimeout(() => {
            if (window.snap) {
                console.log('Snap.js sudah dimuat melalui tag script');
                payBtn.textContent = 'Bayar Sekarang';
                payBtn.disabled = false;
                payBtn.addEventListener('click', processPayment);
                showAlert('Sistem pembayaran siap!', 'success');
            } else {
                console.log('Snap.js tidak tersedia, mencoba metode alternatif');
                // Metode alternatif
                loadMidtrans()
                    .then(() => {
                        payBtn.textContent = 'Bayar Sekarang';
                        payBtn.disabled = false;
                        payBtn.addEventListener('click', processPayment);
                        showAlert('Sistem pembayaran siap!', 'success');
                    })
                    .catch(error => {
                        showAlert('Terjadi kesalahan saat memuat Midtrans: ' + error.message, 'error');
                        console.error('MIDTRANS DEBUG:', error);
                        console.log('Client Key:', MIDTRANS.clientKey);
                        console.log('Snap URL:', MIDTRANS.snapUrl);
                        console.log('Is Production:', MIDTRANS.isProduction);
                        
                        // Tetap mengaktifkan tombol dan menambahkan event listener
                        // dengan penanganan error tambahan
                        payBtn.textContent = 'Coba Bayar';
                        payBtn.disabled = false;
                        payBtn.addEventListener('click', () => {
                            // Coba lagi memuat Snap.js sebelum melakukan pembayaran
                            if (!window.snap) {
                                showAlert('Memuat ulang sistem pembayaran...', 'info');
                                // Tambahkan script secara manual sebagai upaya terakhir
                                const lastResort = document.createElement('script');
                                lastResort.src = MIDTRANS.snapUrl;
                                lastResort.setAttribute('data-client-key', MIDTRANS.clientKey);
                                document.body.appendChild(lastResort);
                                
                                // Tunggu sebentar kemudian coba proses
                                setTimeout(() => {
                                    processPayment();
                                }, 1000);
                            } else {
                                processPayment();
                            }
                        });
                    });
            }
        }, 1000); // Tunggu 1 detik untuk memastikan script yang ditambahkan langsung sudah dimuat
    });
</script>

<!-- Preconnect untuk optimasi -->
<link rel="preconnect" href="https://app.sandbox.midtrans.com">
<link rel="preconnect" href="https://app.midtrans.com">

<!-- Load Midtrans Snap.js langsung -->
@if($pendaftaran->status === 'pending')
<script type="text/javascript"
    src="{{ $snapUrl }}"
    data-client-key="{{ $clientKey }}">
</script>
<!-- Tambahkan kode fallback langsung untuk Snap.js -->
<script>
    // Cek apakah snap sudah tersedia setelah beberapa waktu
    setTimeout(function() {
        if (!window.snap) {
            console.log("Mencoba memuat Snap.js langsung melalui HTML");
            // Buat elemen script untuk Snap.js
            var script = document.createElement('script');
            script.setAttribute('src', '{{ $snapUrl }}');
            script.setAttribute('data-client-key', '{{ $clientKey }}');
            document.body.appendChild(script);
        }
    }, 1000);
</script>
@endif

@endsection