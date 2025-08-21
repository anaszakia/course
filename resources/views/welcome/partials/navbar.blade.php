<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false, dropdownOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="logo-container">
                    <!-- Option 1: Modern Gradient Logo (Default) -->
                    <div class="logo-main">
                        <span class="logo-text">C</span>
                    </div>
                    <span class="logo-brand">Course Online</span>
                    
                    <!-- Option 2: Book Theme Logo (Uncomment to use) -->
                    <!-- 
                    <div class="logo-book">
                        <span class="logo-book-text">📚</span>
                    </div>
                    <span class="logo-brand">Course Online</span>
                    -->
                    
                    <!-- Option 3: Tech Theme Logo (Uncomment to use) -->
                    <!-- 
                    <div class="logo-tech">
                        <span class="logo-tech-text">C</span>
                    </div>
                    <span class="logo-brand">Course Online</span>
                    -->
                    
                    <!-- Option 4: SVG Logo (Uncomment to use) -->
                    <!-- 
                    <div class="w-12 h-12">
                        <svg viewBox="0 0 48 48" class="w-full h-full">
                            <defs>
                                <linearGradient id="logoGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" style="stop-color:#2563eb;stop-opacity:1" />
                                    <stop offset="50%" style="stop-color:#3b82f6;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#60a5fa;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                            <rect width="48" height="48" rx="12" fill="url(#logoGradient)"/>
                            <path d="M16 18h16v2H16zm0 6h16v2H16zm0 6h12v2H16z" fill="white" opacity="0.9"/>
                            <circle cx="36" cy="32" r="3" fill="white" opacity="0.7"/>
                        </svg>
                    </div>
                    <span class="logo-brand">Course Online</span>
                    -->
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <!-- Home -->
                <a href="{{ url('/') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ Request::is('/') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Beranda
                </a>

                <!-- Tentang Kami -->
                <a href="{{ url('/tentang-kami') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ Request::is('tentang-kami') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Tentang Kami
                </a>

                <!-- Program Kursus Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseleave="open = false">
                    <button @mouseenter="open = true" @click="open = !open"
                            class="flex items-center text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ Request::is('program-kursus*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                        Program Kursus
                        <svg class="ml-1 h-4 w-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         @mouseenter="open = true"
                         x-cloak
                         class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="{{ route('courses.regular') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150 ease-in-out">
                                Kelas Reguler
                            </a>
                            <a href="{{ route('courses.private') }}" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-150 ease-in-out">
                                Kelas Private
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hubungi Kami -->
                <a href="{{ url('/hubungi-kami') }}" 
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out {{ Request::is('hubungi-kami') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Hubungi Kami
                </a>

                <!-- CTA Button -->
                @if(Auth::check())
                    <a href="{{ route('pendaftaran.riwayat') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">
                        Riwayat Pendaftaran
                    </a>
                    <button onclick="confirmLogout()" type="button" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-red-700 transition duration-150 ease-in-out">
                        Logout
                    </button>
                    
                    <!-- Hidden form for logout -->
                    <form id="logout-form" method="POST" action="{{ route('user.logout') }}" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('user.login') }}" 
                       class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition duration-150 ease-in-out">
                        Masuk
                    </a>
                @endif
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600">
                    <svg class="h-6 w-6" :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="h-6 w-6" :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             x-cloak
             class="md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Mobile Home -->
                <a href="{{ url('/') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md {{ Request::is('/') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Beranda
                </a>

                <!-- Mobile Tentang Kami -->
                <a href="{{ url('/tentang-kami') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md {{ Request::is('tentang-kami') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Tentang Kami
                </a>

                <!-- Mobile Program Kursus -->
                <div x-data="{ mobileDropdownOpen: false }">
                    <button @click="mobileDropdownOpen = !mobileDropdownOpen"
                            class="w-full text-left px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md flex items-center justify-between">
                        Program Kursus
                        <svg class="h-4 w-4 transition-transform duration-200" :class="{ 'rotate-180': mobileDropdownOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div x-show="mobileDropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-1"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-cloak
                         class="ml-4 space-y-1">
                        <a href="{{ url('/program-kursus/kelas-reguler') }}" 
                           class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">
                            Kelas Reguler
                        </a>
                        <a href="{{ url('/program-kursus/private') }}" 
                           class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-md">
                            Kelas Private
                        </a>
                    </div>
                </div>

                <!-- Mobile Hubungi Kami -->
                <a href="{{ url('/hubungi-kami') }}" 
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md {{ Request::is('hubungi-kami') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Hubungi Kami
                </a>

                <!-- Mobile CTA Button -->
                @if(Auth::check())
                    <a href="{{ route('pendaftaran.riwayat') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-md">
                        Riwayat Pendaftaran
                    </a>
                    <button onclick="confirmLogout()" type="button" class="w-full mx-3 mt-4 bg-red-600 text-white px-4 py-2 rounded-lg text-center font-medium hover:bg-red-700 transition duration-150 ease-in-out">
                        Logout
                    </button>
                @else
                    <a href="{{ route('user.login') }}" 
                       class="block mx-3 mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg text-center font-medium hover:bg-blue-700 transition duration-150 ease-in-out">
                        Masuk
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert JavaScript Functions -->
<script>
    // Function to confirm logout
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah Anda yakin ingin keluar dari akun?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Sedang Logout...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Submit the logout form
                document.getElementById('logout-form').submit();
            }
        });
    }

    // Function to show successful login alert
    function showLoginSuccess(username = '') {
        Swal.fire({
            title: 'Login Berhasil!',
            text: username ? `Selamat datang, ${username}!` : 'Selamat datang kembali!',
            icon: 'success',
            confirmButtonColor: '#2563eb',
            confirmButtonText: 'OK',
            timer: 3000,
            timerProgressBar: true
        });
    }

    // Check for registration success flash message
    @if(session('registration_success'))
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Registrasi Berhasil!',
                text: 'Selamat datang {{ session('registered_name', '') }}! Silakan login untuk melanjutkan.',
                icon: 'success',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'OK',
                timer: 4000,
                timerProgressBar: true
            });
        });
    @endif

    // Check for login success flash message
    @if(session('login_success'))
        document.addEventListener('DOMContentLoaded', function() {
            showLoginSuccess('{{ session('user_name', '') }}');
        });
    @endif

    // Check for logout success flash message
    @if(session('logout_success'))
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Logout Berhasil!',
                text: 'Sampai jumpa lagi{{ session('logged_out_user') ? ', ' . session('logged_out_user') : '' }}!',
                icon: 'success',
                confirmButtonColor: '#2563eb',
                confirmButtonText: 'OK',
                timer: 3000,
                timerProgressBar: true
            });
        });
    @endif
</script>