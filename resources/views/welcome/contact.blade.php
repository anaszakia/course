@extends('welcome.layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-green-600 via-green-700 to-teal-800 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 right-0" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="white" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                <span class="text-yellow-300">Hubungi</span> Kami
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-green-100 max-w-3xl mx-auto">
                Punya pertanyaan tentang program kursus kami? Tim support kami siap membantu Anda 24/7. Mari diskusikan kebutuhan pembelajaran Anda!
            </p>
            
            <!-- Quick Contact Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">24/7 Support</h3>
                    <p class="text-green-100 text-sm">Respon cepat kapan saja</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Konsultasi Gratis</h3>
                    <p class="text-green-100 text-sm">Career guidance gratis</p>
                </div>
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-2xl p-6 text-center">
                    <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Expert Team</h3>
                    <p class="text-green-100 text-sm">Tim berpengalaman siap membantu</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form & Info Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-gray-50 rounded-2xl p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                    Kirim Pesan Kepada Kami
                </h2>
                <p class="text-gray-600 mb-8">
                    Isi form di bawah ini dan tim kami akan merespon dalam waktu 24 jam. Atau hubungi kami langsung melalui kontak di samping.
                </p>
                
                <form class="space-y-6" id="contact-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-2">Nama Depan *</label>
                            <input type="text" 
                                   id="firstName" 
                                   name="firstName" 
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                   placeholder="Masukkan nama depan">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
                            <input type="text" 
                                   id="lastName" 
                                   name="lastName"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                   placeholder="Masukkan nama belakang">
                        </div>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                               placeholder="nama@email.com">
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor WhatsApp *</label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                               placeholder="08xxxxxxxxxx">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Topik Pertanyaan *</label>
                        <select id="subject" 
                                name="subject" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150">
                            <option value="">Pilih topik pertanyaan</option>
                            <option value="program-info">Informasi Program Kursus</option>
                            <option value="pricing">Pertanyaan Harga & Pembayaran</option>
                            <option value="technical">Bantuan Teknis</option>
                            <option value="career-guidance">Career Guidance</option>
                            <option value="partnership">Kemitraan & Korporat</option>
                            <option value="complaint">Keluhan & Saran</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan *</label>
                        <textarea id="message" 
                                  name="message" 
                                  required
                                  rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-150"
                                  placeholder="Tuliskan pertanyaan atau pesan Anda di sini..."></textarea>
                    </div>
                    
                    <div class="flex items-start">
                        <input type="checkbox" 
                               id="agreement" 
                               name="agreement" 
                               required
                               class="mt-1 mr-3 h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="agreement" class="text-sm text-gray-600">
                            Saya setuju dengan <a href="#" class="text-green-600 hover:text-green-700 underline">syarat dan ketentuan</a> serta <a href="#" class="text-green-600 hover:text-green-700 underline">kebijakan privasi</a> Course Online.
                        </label>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-green-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-green-700 transition duration-150 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Kirim Pesan
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                        Informasi Kontak
                    </h2>
                    <p class="text-gray-600 mb-8">
                        Kami siap membantu Anda dengan berbagai pertanyaan seputar pembelajaran dan pengembangan karier.
                    </p>
                </div>
                
                <!-- Contact Cards -->
                <div class="space-y-6">
                    <!-- WhatsApp -->
                    <div class="bg-green-50 border border-green-200 rounded-2xl p-6 hover:shadow-lg transition duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-green-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">WhatsApp</h3>
                                <p class="text-gray-600 mb-3">Chat langsung dengan tim support kami</p>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700">Customer Service: <a href="https://wa.me/6281234567890" class="text-green-600 hover:text-green-700 font-medium">+62 812-3456-7890</a></p>
                                    <p class="text-sm text-gray-700">Career Consultant: <a href="https://wa.me/6281234567891" class="text-green-600 hover:text-green-700 font-medium">+62 812-3456-7891</a></p>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Online 24/7</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 hover:shadow-lg transition duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600 mb-3">Kirim pertanyaan detail melalui email</p>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700">General: <a href="mailto:info@courseonline.com" class="text-blue-600 hover:text-blue-700 font-medium">info@courseonline.com</a></p>
                                    <p class="text-sm text-gray-700">Support: <a href="mailto:support@courseonline.com" class="text-blue-600 hover:text-blue-700 font-medium">support@courseonline.com</a></p>
                                    <p class="text-sm text-gray-700">Partnership: <a href="mailto:partnership@courseonline.com" class="text-blue-600 hover:text-blue-700 font-medium">partnership@courseonline.com</a></p>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Respon dalam 24 jam</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Office -->
                    <div class="bg-purple-50 border border-purple-200 rounded-2xl p-6 hover:shadow-lg transition duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-purple-600 rounded-2xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Kantor Pusat</h3>
                                <p class="text-gray-600 mb-3">Kunjungi kantor kami untuk konsultasi langsung</p>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-700">Jl. Sudirman No. 123, Jakarta Pusat</p>
                                    <p class="text-sm text-gray-700">Jakarta 10220, Indonesia</p>
                                    <p class="text-sm text-gray-700">Telp: <a href="tel:+622123456789" class="text-purple-600 hover:text-purple-700 font-medium">+62 21-2345-6789</a></p>
                                </div>
                                <p class="text-xs text-gray-500 mt-2">Senin - Jumat: 08:00 - 17:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Follow Kami</h3>
                        <p class="text-gray-600 mb-6">Dapatkan update terbaru tentang program kursus dan tips karier</p>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-700 transition duration-150">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-blue-700 rounded-lg flex items-center justify-center hover:bg-blue-800 transition duration-150">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-pink-500 rounded-lg flex items-center justify-center hover:bg-pink-600 transition duration-150">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.096.120.11.225.085.347-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.163-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center hover:bg-red-700 transition duration-150">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Lokasi Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kantor pusat kami berlokasi strategis di Jakarta Pusat, mudah dijangkau dengan transportasi umum.
            </p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="aspect-w-16 aspect-h-9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8019743148709!3d-6.208763395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sJl.%20Jend.%20Sudirman%2C%20Jakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sen!2sid!4v1629794729807!5m2!1sen!2sid" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"
                    class="w-full h-96">
                </iframe>
            </div>
            <div class="p-6 bg-white">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Alamat</p>
                            <p class="text-gray-600 text-sm">Jl. Sudirman No. 123, Jakarta Pusat</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Jam Operasional</p>
                            <p class="text-gray-600 text-sm">Senin - Jumat: 08:00 - 17:00</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 9l6-6m0 0v6m0-6H6"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">Transportasi</p>
                            <p class="text-gray-600 text-sm">MRT Bundaran HI (5 menit jalan kaki)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Frequently Asked Questions
            </h2>
            <p class="text-xl text-gray-600">
                Pertanyaan yang sering diajukan seputar program kursus kami
            </p>
        </div>
        
        <div class="space-y-6" x-data="{ openFaq: null }">
            <!-- FAQ 1 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 1 ? null : 1" 
                        class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition duration-150 flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">Bagaimana cara mendaftar kursus?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                         :class="{ 'rotate-180': openFaq === 1 }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openFaq === 1" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-cloak
                     class="px-6 py-4 bg-white border-t border-gray-200">
                    <p class="text-gray-600">
                        Anda dapat mendaftar melalui website kami dengan mengklik tombol "Daftar Sekarang" pada program yang diminati. Isi form pendaftaran, lakukan pembayaran, dan Anda akan mendapatkan akses ke materi kursus. Tim kami juga siap membantu proses pendaftaran melalui WhatsApp.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 2 ? null : 2" 
                        class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition duration-150 flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">Apa perbedaan kelas reguler dan private?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                         :class="{ 'rotate-180': openFaq === 2 }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openFaq === 2" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-cloak
                     class="px-6 py-4 bg-white border-t border-gray-200">
                    <p class="text-gray-600 mb-3">
                        <strong>Kelas Reguler:</strong> Belajar dalam grup 15-25 siswa, jadwal tetap, harga lebih terjangkau, cocok untuk networking dan peer learning.
                    </p>
                    <p class="text-gray-600">
                        <strong>Kelas Private:</strong> Pembelajaran one-on-one, jadwal fleksibel, kurikulum dapat disesuaikan, attention penuh dari instruktur, cocok untuk pembelajaran yang lebih intensive dan personal.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 3 ? null : 3" 
                        class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition duration-150 flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">Apakah ada garansi jika tidak puas?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                         :class="{ 'rotate-180': openFaq === 3 }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openFaq === 3" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-cloak
                     class="px-6 py-4 bg-white border-t border-gray-200">
                    <p class="text-gray-600">
                        Ya, kami memberikan garansi 30 hari money back untuk semua program kursus. Jika dalam 30 hari pertama Anda merasa tidak puas dengan kualitas pembelajaran, kami akan mengembalikan 100% biaya kursus tanpa pertanyaan yang rumit.
                    </p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="border border-gray-200 rounded-2xl overflow-hidden">
                <button @click="openFaq = openFaq === 4 ? null : 4" 
                        class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition duration-150 flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">Bagaimana sistem pembayaran yang tersedia?</span>
                    <svg class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                         :class="{ 'rotate-180': openFaq === 4 }" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openFaq === 4" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-cloak
                     class="px-6 py-4 bg-white border-t border-gray-200">
                    <p class="text-gray-600">
                        Kami menerima pembayaran melalui transfer bank, e-wallet (OVO, GoPay, DANA), kartu kredit, dan cicilan 0% untuk program tertentu. Untuk kelas private, tersedia opsi pembayaran per sesi atau paket bulanan. Hubungi tim kami untuk informasi lebih detail tentang opsi pembayaran.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-green-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Masih Ada Pertanyaan?
            </h2>
            <p class="text-xl text-green-100 mb-8">
                Tim expert kami siap membantu Anda menemukan program kursus yang tepat untuk mengakselerasi karier Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://wa.me/6281234567890" 
                   class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                    </svg>
                    Chat WhatsApp
                </a>
                <a href="mailto:info@courseonline.com" 
                   class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-green-600 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Kirim Email
                </a>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submission handler
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = Object.fromEntries(formData);
            
            // Simulate form submission
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.innerHTML = '<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Mengirim...';
            button.disabled = true;
            
            // Simulate API call
            setTimeout(function() {
                alert('Terima kasih! Pesan Anda telah terkirim. Tim kami akan segera merespon.');
                contactForm.reset();
                button.innerHTML = originalText;
                button.disabled = false;
            }, 2000);
        });
    }
});
</script>
@endsection
