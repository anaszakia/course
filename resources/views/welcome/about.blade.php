@extends('welcome.layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 right-0" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="white" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Tentang <span class="text-yellow-300">Course Online</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Kami berkomitmen untuk memberikan pendidikan online terbaik yang dapat mengubah karier dan hidup Anda menjadi lebih baik.
            </p>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300">2019</div>
                    <div class="text-blue-100">Tahun Berdiri</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300">5000+</div>
                    <div class="text-blue-100">Siswa</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300">100+</div>
                    <div class="text-blue-100">Kursus</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-300">50+</div>
                    <div class="text-blue-100">Instruktur</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Misi Kami
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Menyediakan akses pendidikan berkualitas tinggi untuk semua orang, di mana saja dan kapan saja. Kami percaya bahwa setiap orang berhak mendapatkan kesempatan untuk belajar dan mengembangkan diri.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Dengan teknologi terdepan dan metode pembelajaran yang inovatif, kami membantu jutaan siswa di seluruh Indonesia mencapai impian karier mereka.
                </p>
                <div class="flex items-start space-x-4">
                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600">Pembelajaran yang dapat diakses 24/7</p>
                </div>
                <div class="flex items-start space-x-4 mt-3">
                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600">Sertifikat yang diakui industri</p>
                </div>
                <div class="flex items-start space-x-4 mt-3">
                    <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600">Dukungan karier setelah lulus</p>
                </div>
            </div>
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                     alt="Team Meeting" 
                     class="rounded-2xl shadow-2xl">
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20 animate-pulse"></div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative order-2 lg:order-1">
                <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                     alt="Vision" 
                     class="rounded-2xl shadow-2xl">
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-600 rounded-full opacity-10 animate-pulse delay-1000"></div>
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Visi Kami
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Menjadi platform pembelajaran online terdepan di Indonesia yang dapat mengubah cara orang belajar dan mengembangkan karier mereka.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Kami membayangkan masa depan di mana setiap individu memiliki akses ke pendidikan berkualitas tinggi yang dapat membantu mereka mencapai potensi penuh mereka.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Inovasi</h4>
                        <p class="text-gray-600 text-sm">Selalu menggunakan teknologi terdepan untuk pengalaman belajar terbaik.</p>
                    </div>
                    <div class="bg-green-50 p-6 rounded-lg">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 mb-2">Komunitas</h4>
                        <p class="text-gray-600 text-sm">Membangun komunitas pembelajaran yang saling mendukung dan berkembang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Nilai-Nilai Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Nilai-nilai yang menjadi fondasi dalam setiap keputusan dan tindakan kami untuk memberikan yang terbaik.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Value 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kepedulian</h3>
                <p class="text-gray-600">
                    Kami peduli dengan kesuksesan setiap siswa dan berkomitmen untuk memberikan dukungan terbaik dalam perjalanan pembelajaran mereka.
                </p>
            </div>
            
            <!-- Value 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Integritas</h3>
                <p class="text-gray-600">
                    Kami berkomitmen pada transparansi, kejujuran, dan etika dalam setiap aspek layanan pendidikan yang kami berikan.
                </p>
            </div>
            
            <!-- Value 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Inovasi</h3>
                <p class="text-gray-600">
                    Kami terus berinovasi menggunakan teknologi terdepan untuk menciptakan pengalaman pembelajaran yang lebih baik.
                </p>
            </div>
            
            <!-- Value 4 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Keunggulan</h3>
                <p class="text-gray-600">
                    Kami berusaha memberikan kualitas terbaik dalam setiap aspek, dari konten pembelajaran hingga layanan pelanggan.
                </p>
            </div>
            
            <!-- Value 5 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kolaborasi</h3>
                <p class="text-gray-600">
                    Kami percaya bahwa pembelajaran terbaik terjadi melalui kolaborasi dan berbagi pengetahuan antar siswa.
                </p>
            </div>
            
            <!-- Value 6 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 text-center">
                <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Pertumbuhan</h3>
                <p class="text-gray-600">
                    Kami mendorong pertumbuhan berkelanjutan baik untuk siswa, instruktur, maupun organisasi kami sendiri.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Tim Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Bertemu dengan para ahli dan profesional berpengalaman yang berdedikasi untuk kesuksesan pembelajaran Anda.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-lg transition duration-300">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="CEO" 
                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Ahmad Wijaya</h3>
                <p class="text-blue-600 font-medium mb-4">CEO & Founder</p>
                <p class="text-gray-600 text-sm">
                    Berpengalaman 15+ tahun di bidang teknologi dan pendidikan. Lulusan Computer Science dari ITB.
                </p>
                <div class="flex justify-center space-x-3 mt-6">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-lg transition duration-300">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="CTO" 
                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Sarah Putri</h3>
                <p class="text-green-600 font-medium mb-4">CTO & Co-Founder</p>
                <p class="text-gray-600 text-sm">
                    Expert dalam pengembangan platform digital dan machine learning. Lulusan MIT dengan pengalaman di Silicon Valley.
                </p>
                <div class="flex justify-center space-x-3 mt-6">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Team Member 3 -->
            <div class="bg-gray-50 p-8 rounded-2xl text-center hover:shadow-lg transition duration-300">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="Head of Education" 
                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-2">Budi Santoso</h3>
                <p class="text-purple-600 font-medium mb-4">Head of Education</p>
                <p class="text-gray-600 text-sm">
                    Ahli kurikulum dan metodologi pembelajaran dengan pengalaman 12+ tahun di industri pendidikan dan corporate training.
                </p>
                <div class="flex justify-center space-x-3 mt-6">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-150">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Bergabunglah dengan Perjalanan Pembelajaran Kami
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Ratusan ribu siswa telah mempercayai kami untuk mengembangkan karier mereka. Sekarang giliran Anda!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/daftar') }}" 
                   class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Mulai Belajar Sekarang
                </a>
                <a href="{{ url('/kontak') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
