<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false, dropdownOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">C</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Course Online</span>
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
                    <form method="POST" action="{{ route('user.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-red-700 transition duration-150 ease-in-out">
                            Logout
                        </button>
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
                    <form method="POST" action="{{ route('user.logout') }}" class="mx-3 mt-4">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg text-center font-medium hover:bg-red-700 transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form>
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