@extends('welcome.layouts.app')

@section('title', 'Kelas Private')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-indigo-800 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 right-0" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="white" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                Kelas <span class="text-yellow-300">Private</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-purple-100 max-w-3xl mx-auto">
                Pembelajaran one-on-one yang disesuaikan dengan kebutuhan dan pace belajar Anda. Dapatkan perhatian penuh dari instruktur expert.
            </p>
            
            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-5xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">1-on-1 Learning</h3>
                    <p class="text-purple-100 text-sm">Perhatian penuh dari instruktur expert</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Jadwal Fleksibel</h3>
                    <p class="text-purple-100 text-sm">Atur jadwal sesuai kenyamanan Anda</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Kurikulum Custom</h3>
                    <p class="text-purple-100 text-sm">Disesuaikan dengan kebutuhan spesifik</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Package Selection -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Pilih Paket Kelas Private
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menawarkan berbagai paket pembelajaran private yang dapat disesuaikan dengan kebutuhan dan anggaran Anda.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Basic Package -->
            <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 text-center hover:border-purple-500 transition duration-300">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Basic</h3>
                <p class="text-gray-600 mb-6">Ideal untuk pemula yang ingin memulai belajar dengan bimbingan personal</p>
                <div class="text-4xl font-bold text-gray-900 mb-6">
                    Rp 2.499.000
                    <span class="text-base font-normal text-gray-500">/bulan</span>
                </div>
                <ul class="text-left space-y-3 mb-8">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        8 sesi per bulan (2 sesi/minggu)
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        90 menit per sesi
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Materi pembelajaran dasar
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Chat support via WhatsApp
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        E-certificate
                    </li>
                </ul>
                <button class="w-full bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-150 font-semibold">
                    Pilih Basic
                </button>
            </div>

            <!-- Premium Package -->
            <div class="bg-white border-2 border-purple-500 rounded-2xl p-8 text-center relative transform scale-105">
                <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span class="bg-purple-500 text-white px-6 py-2 rounded-full text-sm font-semibold">Most Popular</span>
                </div>
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Premium</h3>
                <p class="text-gray-600 mb-6">Untuk learner yang serius ingin menguasai skill dengan cepat dan mendalam</p>
                <div class="text-4xl font-bold text-purple-600 mb-6">
                    Rp 3.999.000
                    <span class="text-base font-normal text-gray-500">/bulan</span>
                </div>
                <ul class="text-left space-y-3 mb-8">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        12 sesi per bulan (3 sesi/minggu)
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        120 menit per sesi
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Kurikulum intermediate-advanced
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Project-based learning
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        24/7 chat support
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Career guidance
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Industry certificate
                    </li>
                </ul>
                <button class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition duration-150 font-semibold">
                    Pilih Premium
                </button>
            </div>

            <!-- Enterprise Package -->
            <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 text-center hover:border-yellow-500 transition duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Enterprise</h3>
                <p class="text-gray-600 mb-6">Untuk professional yang butuh intensive mentoring dan industry connection</p>
                <div class="text-4xl font-bold text-yellow-600 mb-6">
                    Rp 5.999.000
                    <span class="text-base font-normal text-gray-500">/bulan</span>
                </div>
                <ul class="text-left space-y-3 mb-8">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        16 sesi per bulan (4 sesi/minggu)
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        150 menit per sesi
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Customized advanced curriculum
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Real industry projects
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Priority support & consultation
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Job placement assistance
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Professional certificate
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Alumni network access
                    </li>
                </ul>
                <button class="w-full bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-700 transition duration-150 font-semibold">
                    Pilih Enterprise
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Subject Areas -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Bidang Studi Tersedia
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami menyediakan pembelajaran private di berbagai bidang dengan instruktur expert yang berpengalaman.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Programming -->
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-2xl transition duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Programming</h3>
                <p class="text-sm text-gray-600 mb-4">Web Dev, Mobile Dev, Data Science, AI/ML</p>
                <div class="text-xs text-gray-500">
                    <p>• JavaScript, Python, Java, C++</p>
                    <p>• React, Vue, Laravel, Django</p>
                    <p>• Flutter, React Native</p>
                </div>
            </div>

            <!-- Design -->
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-2xl transition duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Design</h3>
                <p class="text-sm text-gray-600 mb-4">UI/UX, Graphic, Motion, 3D Design</p>
                <div class="text-xs text-gray-500">
                    <p>• Figma, Adobe XD, Sketch</p>
                    <p>• Photoshop, Illustrator, InDesign</p>
                    <p>• After Effects, Blender</p>
                </div>
            </div>

            <!-- Marketing -->
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-2xl transition duration-300">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Digital Marketing</h3>
                <p class="text-sm text-gray-600 mb-4">SEO, SEM, Social Media, Content</p>
                <div class="text-xs text-gray-500">
                    <p>• Google Ads, Facebook Ads</p>
                    <p>• SEO, Content Marketing</p>
                    <p>• Analytics, Email Marketing</p>
                </div>
            </div>

            <!-- Business -->
            <div class="bg-white p-6 rounded-2xl shadow-lg text-center hover:shadow-2xl transition duration-300">
                <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Business</h3>
                <p class="text-sm text-gray-600 mb-4">PM, Strategy, Finance, Leadership</p>
                <div class="text-xs text-gray-500">
                    <p>• Project Management</p>
                    <p>• Business Analysis</p>
                    <p>• Leadership & Management</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instructor Showcase -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Instruktur Expert Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Belajar langsung dari para profesional terbaik di industri dengan pengalaman bertahun-tahun.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Instructor 1 -->
            <div class="bg-gray-50 p-6 rounded-2xl text-center">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="John Doe" 
                     class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-lg font-bold text-gray-900 mb-1">John Doe</h3>
                <p class="text-purple-600 font-medium text-sm mb-3">Senior Full Stack Developer</p>
                <div class="flex justify-center items-center mb-3">
                    <div class="flex text-yellow-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-gray-600 text-sm ml-1">4.9 (127 reviews)</span>
                    </div>
                </div>
                <p class="text-gray-600 text-xs mb-4">Ex-Google, 8+ years experience. Expert in React, Node.js, Python</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">JavaScript</span>
                    <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">React</span>
                    <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Node.js</span>
                </div>
            </div>

            <!-- Instructor 2 -->
            <div class="bg-gray-50 p-6 rounded-2xl text-center">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="Sarah Wilson" 
                     class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Sarah Wilson</h3>
                <p class="text-purple-600 font-medium text-sm mb-3">Lead UX/UI Designer</p>
                <div class="flex justify-center items-center mb-3">
                    <div class="flex text-yellow-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-gray-600 text-sm ml-1">4.8 (89 reviews)</span>
                    </div>
                </div>
                <p class="text-gray-600 text-xs mb-4">Ex-Airbnb, 6+ years experience. Specialized in user research & design systems</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-pink-100 text-pink-800 px-2 py-1 rounded text-xs">Figma</span>
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs">Adobe XD</span>
                    <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Design Systems</span>
                </div>
            </div>

            <!-- Instructor 3 -->
            <div class="bg-gray-50 p-6 rounded-2xl text-center">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                     alt="Michael Chen" 
                     class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                <h3 class="text-lg font-bold text-gray-900 mb-1">Michael Chen</h3>
                <p class="text-purple-600 font-medium text-sm mb-3">Data Science Manager</p>
                <div class="flex justify-center items-center mb-3">
                    <div class="flex text-yellow-400">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-gray-600 text-sm ml-1">5.0 (156 reviews)</span>
                    </div>
                </div>
                <p class="text-gray-600 text-xs mb-4">Ex-Microsoft, 10+ years experience. PhD in Machine Learning from Stanford</p>
                <div class="flex flex-wrap justify-center gap-2">
                    <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Python</span>
                    <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">TensorFlow</span>
                    <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded text-xs">SQL</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Success Stories
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Lihat bagaimana kelas private kami telah mengubah karier para alumni.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Success Story 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-start space-x-4 mb-6">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                         alt="Alumni" 
                         class="w-16 h-16 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Andi Pratama</h4>
                        <p class="text-sm text-purple-600 mb-1">Frontend Developer di Tokopedia</p>
                        <p class="text-xs text-gray-500">Alumni Kelas Private Web Development</p>
                    </div>
                </div>
                <blockquote class="text-gray-700 italic mb-4">
                    "Dengan kelas private, saya bisa belajar sesuai pace yang nyaman. Instruktur sangat sabar dan memberikan feedback yang detail untuk setiap project. Dalam 3 bulan, saya berhasil transition dari marketing ke tech industry!"
                </blockquote>
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>Career transition: Marketing → Frontend Developer</span>
                </div>
            </div>

            <!-- Success Story 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex items-start space-x-4 mb-6">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" 
                         alt="Alumni" 
                         class="w-16 h-16 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-1">Lisa Maharani</h4>
                        <p class="text-sm text-purple-600 mb-1">Senior UX Designer di Gojek</p>
                        <p class="text-xs text-gray-500">Alumni Kelas Private UI/UX Design</p>
                    </div>
                </div>
                <blockquote class="text-gray-700 italic mb-4">
                    "Kelas private memberikan saya kebebasan untuk fokus pada area yang paling relevan dengan goals saya. Instruktor tidak hanya mengajarkan tools, tapi juga design thinking dan problem-solving yang sangat valuable di industri."
                </blockquote>
                <div class="flex items-center text-sm text-gray-500">
                    <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>Promotion: Junior → Senior UX Designer</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-purple-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Mulai Perjalanan Private Learning Anda
            </h2>
            <p class="text-xl text-purple-100 mb-8">
                Dapatkan pembelajaran yang dipersonalisasi sesuai kebutuhan dan goals karier Anda. Konsultasi gratis untuk menentukan learning path terbaik!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/konsultasi-gratis') }}" 
                   class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300">
                    Konsultasi Gratis
                </a>
                <a href="{{ url('/daftar-private') }}" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-purple-600 transition duration-300">
                    Daftar Kelas Private
                </a>
            </div>
            <p class="text-purple-100 mt-6 text-sm">
                * Free consultation untuk menentukan kurikulum dan learning path yang tepat
            </p>
        </div>
    </div>
</section>
@endsection
