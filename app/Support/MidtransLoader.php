<?php

namespace App\Support;

/**
 * This class manually loads the Midtrans classes
 */
class MidtransLoader
{
    public static function load()
    {
        $midtransPath = base_path('vendor/midtrans/midtrans-php');
        
        // Check if the directory exists
        if (!is_dir($midtransPath)) {
            throw new \Exception('Midtrans directory not found. Please run: composer require midtrans/midtrans-php');
        }
        
        // Include core files
        require_once $midtransPath . '/Midtrans/Config.php';
        require_once $midtransPath . '/Midtrans/ApiRequestor.php';
        require_once $midtransPath . '/Midtrans/SnapApiRequestor.php';
        require_once $midtransPath . '/Midtrans/Notification.php';
        require_once $midtransPath . '/Midtrans/CoreApi.php';
        require_once $midtransPath . '/Midtrans/Snap.php';
        require_once $midtransPath . '/Midtrans/Transaction.php';
        require_once $midtransPath . '/Midtrans/Sanitizer.php';
    }
}
