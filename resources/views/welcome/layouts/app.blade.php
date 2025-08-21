<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Course Online') }} - @yield('title', 'Beranda')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjMyIiBoZWlnaHQ9IjMyIiByeD0iOCIgZmlsbD0iIzI1NjNlYiIvPgo8dGV4dCB4PSIxNiIgeT0iMjIiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxOCIgZm9udC13ZWlnaHQ9ImJvbGQiIGZpbGw9IndoaXRlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5DPC90ZXh0Pgo8L3N2Zz4K">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom styles -->
    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom Logo Styles */
        .logo-container {
            position: relative;
            display: flex;
            align-items: center;
            transition: transform 0.3s ease;
        }
        
        .logo-container:hover {
            transform: scale(1.05);
        }
        
        /* Main Logo Design - Modern Gradient */
        .logo-main {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 50%, #60a5fa 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .logo-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        
        .logo-container:hover .logo-main::before {
            transform: translateX(100%);
        }
        
        .logo-text {
            color: white;
            font-size: 24px;
            font-weight: 800;
            font-family: 'Figtree', sans-serif;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .logo-brand {
            margin-left: 12px;
            font-size: 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Alternative Logo Design - Book Theme */
        .logo-book {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #059669 0%, #10b981 50%, #34d399 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
            position: relative;
        }
        
        .logo-book::after {
            content: '';
            position: absolute;
            width: 2px;
            height: 60%;
            background: rgba(255,255,255,0.3);
            left: 50%;
            transform: translateX(-50%);
        }
        
        .logo-book-text {
            color: white;
            font-size: 20px;
            font-weight: 800;
            font-family: serif;
        }
        
        /* Alternative Logo Design - Digital/Tech Theme */
        .logo-tech {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 50%, #a78bfa 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
            position: relative;
        }
        
        .logo-tech::before {
            content: '';
            position: absolute;
            width: 36px;
            height: 36px;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top-color: rgba(255,255,255,0.8);
            animation: spin 3s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .logo-tech-text {
            color: white;
            font-size: 20px;
            font-weight: 800;
            font-family: monospace;
            z-index: 1;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .logo-main, .logo-book, .logo-tech {
                width: 40px;
                height: 40px;
            }
            
            .logo-text, .logo-book-text, .logo-tech-text {
                font-size: 18px;
            }
            
            .logo-brand {
                font-size: 18px;
                margin-left: 8px;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        @include('welcome.partials.navbar')
        
        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('welcome.partials.footer')
    </div>
    
    @stack('scripts')
</body>
</html>