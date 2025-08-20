<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Tambah kolom untuk Midtrans
            $table->string('order_id')->nullable()->after('total_bayar');
            $table->string('transaction_id')->nullable()->after('order_id');
            
            // Update enum status untuk menambah status yang diperlukan Midtrans
            $table->dropColumn('status');
        });
        
        // Tambah kembali kolom status dengan enum yang lebih lengkap
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->enum('status', [
                'pending',           // Belum bayar
                'pending_payment',   // Menunggu pembayaran
                'paid',             // Sudah bayar (settlement)
                'challenge',        // Perlu review manual
                'denied',          // Ditolak
                'expired',         // Kadaluarsa
                'cancelled',       // Dibatalkan
                'canceled'         // Untuk backward compatibility
            ])->default('pending')->after('transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn(['order_id', 'transaction_id']);
            $table->dropColumn('status');
        });
        
        // Kembalikan ke enum status yang lama
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->enum('status', ['pending', 'paid', 'canceled'])->default('pending');
        });
    }
};