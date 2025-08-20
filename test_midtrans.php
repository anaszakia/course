<?php

// Bootstrap the Laravel application
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Load our custom Midtrans loader
require_once __DIR__ . '/app/Support/MidtransLoader.php';
\App\Support\MidtransLoader::load();

// Now check if Midtrans classes are available
echo "Checking Midtrans Classes after loading:\n";

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

// Try to use the Midtrans Config class
echo "\nTesting Midtrans Config setup:\n";
try {
    \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
    \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;
    
    echo "✅ Successfully set Midtrans configuration\n";
    echo "Server Key: " . \Midtrans\Config::$serverKey . "\n";
    echo "Is Production: " . (\Midtrans\Config::$isProduction ? "true" : "false") . "\n";
} catch (\Exception $e) {
    echo "❌ Error setting Midtrans configuration: " . $e->getMessage() . "\n";
}
