<?php

// Check if Midtrans classes are available
echo "Checking Midtrans Classes:\n";

// Check if the Config class exists
if (class_exists('\\Midtrans\\Config')) {
    echo "✅ Midtrans\\Config class exists\n";
} else {
    echo "❌ Midtrans\\Config class does NOT exist\n";
}

// Check if the Snap class exists
if (class_exists('\\Midtrans\\Snap')) {
    echo "✅ Midtrans\\Snap class exists\n";
} else {
    echo "❌ Midtrans\\Snap class does NOT exist\n";
}

// Check if the Notification class exists
if (class_exists('\\Midtrans\\Notification')) {
    echo "✅ Midtrans\\Notification class exists\n";
} else {
    echo "❌ Midtrans\\Notification class does NOT exist\n";
}

// List all Midtrans related files
echo "\nListing Midtrans files in vendor directory:\n";
$midtransDir = __DIR__ . '/vendor/midtrans';
if (is_dir($midtransDir)) {
    $files = scandir($midtransDir);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            echo "- $file\n";
        }
    }
} else {
    echo "❌ Midtrans vendor directory not found\n";
}

// Check config values
echo "\nChecking Midtrans Config Values:\n";
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Server Key (env): " . env('MIDTRANS_SERVER_KEY') . "\n";
echo "Client Key (env): " . env('MIDTRANS_CLIENT_KEY') . "\n";
echo "Server Key (config): " . config('services.midtrans.serverKey') . "\n";
echo "Client Key (config): " . config('services.midtrans.clientKey') . "\n";
