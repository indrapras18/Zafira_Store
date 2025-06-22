<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Hero Section</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-glow {
            animation: glow 2s ease-in-out infinite;
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gradient-text {
            background: linear-gradient(135deg, #ffffff, #e0e7ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Custom button hover effects */
        .btn-primary {
            background: linear-gradient(135deg, #ffffff, #f8fafc);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-secondary:hover::before {
            left: 100%;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100">

    <section
        class="relative min-h-screen bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-20 left-20 w-32 h-32 bg-white/10 rounded-full animate-float blur-xl"></div>
            <div
                class="absolute top-40 right-32 w-24 h-24 bg-purple-300/20 rounded-full animate-float delay-200 blur-lg">
            </div>
            <div
                class="absolute bottom-32 left-40 w-40 h-40 bg-blue-300/15 rounded-full animate-float delay-400 blur-2xl">
            </div>

            <div
                class="absolute -top-16 -right-16 w-96 h-96 bg-gradient-to-br from-purple-400/30 to-pink-400/30 rounded-full blur-3xl animate-pulse">
            </div>
            <div
                class="absolute -bottom-20 -left-20 w-80 h-80 bg-gradient-to-tr from-blue-400/30 to-cyan-400/30 rounded-full blur-3xl animate-pulse delay-1000">
            </div>

            <div class="absolute inset-0 opacity-10"
                style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 50px 50px;">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 flex items-center min-h-screen">
            <!-- Login button di pojok kanan atas -->
            <div class="absolute top-6 right-6 z-30">
                <a href="/login">
                    <button
                        class="btn-login bg-white/10 border-2 border-yellow-300 text-yellow-300 px-6 py-3 rounded-xl font-bold text-sm glass-morphism inline-flex items-center gap-2 hover:bg-yellow-300 hover:text-blue-700 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Login
                    </button>
                </a>
            </div>

            <div class="flex flex-col lg:flex-row items-center w-full gap-12">

                <div class="lg:w-1/2 text-center lg:text-left">
                    <div
                        class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 glass-morphism mb-6 animate-fade-in-up">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                        <span class="text-sm font-medium">🚀 Produk Terlaris 2025</span>
                    </div>

                    <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight animate-slide-in-left">
                        <span class="gradient-text">Produk Terbaik</span>
                        <br>
                        <span class="text-yellow-300">untuk Anda</span>
                    </h1>

                    <p
                        class="text-xl lg:text-2xl mb-8 text-white/90 leading-relaxed animate-fade-in-up delay-200 max-w-2xl">
                        Temukan berbagai pilihan produk berkualitas premium dengan teknologi
                        terdepan dan harga yang tak tertandingi.
                    </p>

                    <div
                        class="flex flex-wrap justify-center lg:justify-start gap-8 mb-10 animate-fade-in-up delay-400">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">10K+</div>
                            <div class="text-sm text-white/80">Pelanggan Puas</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">4.9★</div>
                            <div class="text-sm text-white/80">Rating Produk</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-yellow-300">24/7</div>
                            <div class="text-sm text-white/80">Support</div>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center lg:justify-start gap-4 animate-fade-in-up delay-600">
                        <button
                            class="btn-primary text-blue-700 px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Lihat Produk
                        </button>
                        <button
                            class="btn-secondary border-2 border-white text-white px-8 py-4 rounded-2xl font-bold text-lg glass-morphism inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Hubungi Kami
                        </button>
                    </div>
                </div>

                <div class="lg:w-1/2 flex justify-center animate-slide-in-right">
                    <div class="relative">
                        <div class="relative z-10">
                            <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                                alt="Hero Product Image"
                                class="rounded-3xl shadow-2xl w-full max-w-lg animate-glow hover:scale-105 transition-transform duration-300">
                        </div>

                        <div class="absolute -top-6 -left-6 glass-morphism rounded-2xl p-4 animate-float z-20">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                                <span class="text-sm font-semibold">✨ Kualitas
                                    Premium</span>
                            </div>
                        </div>

                        <div
                            class="absolute -bottom-6 -right-6 glass-morphism rounded-2xl p-4 animate-float delay-200 z-20">
                            <div class="flex items-center gap-3">
                                <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                                <span class="text-sm font-semibold">🚚 Gratis Ongkir</span>
                            </div>
                        </div>

                        <div
                            class="absolute inset-0 rounded-3xl bg-gradient-to-r from-purple-500/20 to-pink-500/20 blur-2xl transform rotate-6 scale-110 -z-10">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    <section id="products" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5"
            style="background-image: radial-gradient(circle at 2px 2px, rgba(0,0,0,0.3) 1px, transparent 0); background-size: 40px 40px;">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-blue-100 text-blue-600 mb-4">
                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                    <span class="text-sm font-semibold">Katalog Produk</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-4">
                    Produk <span class="text-blue-600">Unggulan</span> Kami
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Jelajahi koleksi produk terbaik kami yang telah dipilih khusus untuk memenuhi
                    kebutuhan dan gaya hidup modern Anda
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-2 mb-12">
                <button
                    class="filter-btn active px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-blue-600 text-white shadow-lg"
                    data-category="all">
                    Semua Produk
                </button>
                <button
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-white text-gray-600 border border-gray-200 hover:bg-blue-50 hover:border-blue-200"
                    data-category="elektronik">
                    bracelet
                </button>
                <button
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-white text-gray-600 border border-gray-200 hover:bg-blue-50 hover:border-blue-200"
                    data-category="fashion">
                    Haji & Umroh
                </button>
                {{-- <button
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-white text-gray-600 border border-gray-200 hover:bg-blue-50 hover:border-blue-200"
                    data-category="home_living">
                    Home & Living
                    </button>
                <button
                    class="filter-btn px-6 py-3 rounded-full font-semibold transition-all duration-300 bg-white text-gray-600 border border-gray-200 hover:bg-blue-50 hover:border-blue-200"
                    data-category="olahraga">
                    Olahraga
                    </button> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="elektronik">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Headphones Premium"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">Sale
                                20%</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                            <span class="text-sm text-gray-500">(4.8)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Premium Wireless Headphones
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Headphone nirkabel dengan kualitas suara Hi-Fi dan noise
                                cancellation
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        899K</span>
                                    <span class="text-sm text-gray-500 line-through">Rp
                                        1.2M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="elektronik">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Smartwatch"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span
                                class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">Terbaru</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                            <span class="text-sm text-gray-500">(4.9)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Smart Watch Pro
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Smartwatch dengan fitur kesehatan lengkap dan baterai tahan lama
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        2.5M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="olahraga">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Running Shoes"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span
                                class="bg-purple-500 text-white px-3 py-1 rounded-full text-sm font-bold">Limited</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★☆
                            </div>
                            <span class="text-sm text-gray-500">(4.7)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Running Shoes Elite
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Sepatu lari profesional dengan teknologi bantalan udara terdepan
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        1.8M</span>
                                    <span class="text-sm text-gray-500 line-through">Rp
                                        2.2M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="elektronik">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Laptop Gaming"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm font-bold">Hot</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                            <span class="text-sm text-gray-500">(4.9)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Gaming Laptop Pro
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Laptop gaming dengan performa tinggi untuk gaming dan desain
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        15M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="fashion">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Fashion Bag"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-pink-500 text-white px-3 py-1 rounded-full text-sm font-bold">Trendy</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★☆
                            </div>
                            <span class="text-sm text-gray-500">(4.6)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Designer Handbag
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Tas tangan mewah dengan bahan kulit premium dan desain eksklusif
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        3.2M</span>
                                    <span class="text-sm text-gray-500 line-through">Rp
                                        4M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="home_living">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Smart Home"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-bold">Smart</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★★
                            </div>
                            <span class="text-sm text-gray-500">(4.8)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Smart Home Device
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Perangkat rumah pintar dengan kontrol suara dan aplikasi mobile
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        1.5M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="fashion">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Sunglasses"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span
                                class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm font-bold">Summer</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★☆
                            </div>
                            <span class="text-sm text-gray-500">(4.5)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Stylish Sunglasses
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Kacamata hitam fashion dengan perlindungan UV tinggi
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        450K</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="product-card group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2"
                    data-category="home_living">
                    <div class="relative overflow-hidden">
                        <img src="https://i.pinimg.com/736x/fd/aa/d0/fdaad0a6b3e5086ce403274bbfe77393.jpg"
                            alt="Coffee Machine"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="bg-indigo-500 text-white px-3 py-1 rounded-full text-sm font-bold">New
                                Arrival</span>
                        </div>
                        <div
                            class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <button
                                class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                                <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-1 mb-2">
                            <div class="flex text-yellow-400">
                                ★★★★☆
                            </div>
                            <span class="text-sm text-gray-500">(4.7)</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            Premium Coffee Machine
                            </b>
                            <p class="text-gray-600 text-sm mb-4">
                                Mesin kopi otomatis dengan fitur penggiling biji terintegrasi
                            </p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">Rp
                                        5.5M</span>
                                </div>
                                <button
                                    class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button
                    class="px-8 py-4 bg-gray-200 text-gray-800 rounded-full font-bold hover:bg-gray-300 transition-colors duration-300 shadow-md">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <section id="features" class="py-20 bg-blue-50 relative">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-4">
                Mengapa Memilih <span class="text-blue-600">Kami?</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-16">
                Kami berkomitmen untuk memberikan pengalaman belanja terbaik dengan fitur-fitur unggulan.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div
                    class="bg-white rounded-3xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300 border-t-4 border-blue-600">
                    <div class="text-blue-600 mb-4 inline-block bg-blue-100 p-3 rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002 12c0 2.83 1.144 5.423 3 7.587L12 22l7-2.413c1.856-2.164 3-4.757 3-7.587a12.001 12.001 0 00-3.382-8.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Kualitas Terjamin</h3>
                    <p class="text-gray-600">Semua produk kami telah melewati kontrol kualitas ketat
                        untuk memastikan standar tertinggi.</p>
                </div>

                <div
                    class="bg-white rounded-3xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300 border-t-4 border-purple-600">
                    <div class="text-purple-600 mb-4 inline-block bg-purple-100 p-3 rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Dapatkan pesanan Anda dengan cepat dan aman, langsung
                        diantar ke pintu rumah Anda.</p>
                </div>

                <div
                    class="bg-white rounded-3xl shadow-xl p-8 transform hover:scale-105 transition-transform duration-300 border-t-4 border-yellow-600">
                    <div class="text-yellow-600 mb-4 inline-block bg-yellow-100 p-3 rounded-full">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c1.657 0 3 .895 3 2s-1.343 2-3 2 3 .895 3 2S13.657 16 12 16m0 0v-2.5m0-9V8m-5.657 4.343l-1.414 1.414M12 20.75l-.01.01M7.05 7.05L5.636 5.636m12.728 12.728l-1.414-1.414M16.95 7.05l1.414-1.414M21 12h-2.5M4 12H2.5">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Harga Bersaing</h3>
                    <p class="text-gray-600">Kami menawarkan harga terbaik di pasaran tanpa
                        mengorbankan kualitas produk.</p>
                </div>
            </div>
        </div>
    </section>

    <section
        class="py-20 bg-gradient-to-r from-blue-700 to-indigo-800 text-white text-center relative overflow-hidden">
        <div class="absolute -top-10 left-10 w-40 h-40 bg-white/5 rounded-full blur-3xl animate-spin-slow">
        </div>
        <div
            class="absolute bottom-5 -right-10 w-60 h-60 bg-white/5 rounded-full blur-3xl animate-spin-slow delay-500">
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-4xl lg:text-5xl font-black mb-6">
                Siap Memulai Petualangan Belanja Anda?
            </h2>
            <p class="text-xl text-white/90 mb-10 max-w-3xl mx-auto">
                Jangan lewatkan penawaran eksklusif kami! Daftar sekarang dan dapatkan diskon spesial untuk
                pembelian pertama Anda.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="btn-primary text-blue-700 px-10 py-5 rounded-full font-bold text-xl shadow-2xl">
                    Daftar Sekarang
                </button>
                <button
                    class="btn-secondary border-2 border-white text-white px-10 py-5 rounded-full font-bold text-xl glass-morphism">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold text-white mb-4">Nama Toko Anda</h3>
                <p class="text-sm text-gray-400">
                    Solusi terbaik untuk kebutuhan produk berkualitas Anda.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.071 1.17.062 1.747.247 2.22.445.65.275 1.173.66 1.637 1.123.464.463.848.987 1.123 1.637.198.473.383 1.05.445 2.22.059 1.266.071 1.646.071 4.85s-.012 3.584-.071 4.85c-.062 1.17-.247 1.747-.445 2.22-.275.65-.66 1.173-1.123 1.637-.463.464-.987.848-1.637 1.123-.473.198-1.05.383-2.22.445-1.266.059-1.646.071-4.85.071s-3.584-.012-4.85-.071c-1.17-.062-1.747-.247-2.22-.445-.65-.275-1.173-.66-1.637-1.123-.464-.463-.848-.987-1.123-1.637-.198-.473-.383-1.05-.445-2.22-.059-1.266-.071-1.646-.071-4.85s.012-3.584.071-4.85c.062-1.17.247-1.747.445-2.22.275-.65.66-1.173 1.123-1.637.463-.464.987-.848 1.637-1.123.473-.198 1.05-.383 2.22-.445 1.266-.059 1.646-.071 4.85-.071zm0-2.163c-3.259 0-3.667.014-4.947.072-1.234.06-2.146.257-2.916.574-.69.294-1.252.684-1.77.942a4.42 4.42 0 00-1.085 1.085c-.258.518-.648 1.08-.942 1.77-.317.77-.514 1.682-.574 2.916-.058 1.28-.072 1.688-.072 4.947s.014 3.667.072 4.947c.06 1.234.257 2.146.574 2.916.294.69.684 1.252.942 1.77a4.42 4.42 0 001.085 1.085c.518.258 1.08.648 1.77.942.77.317 1.682.514 2.916.574 1.28.058 1.688.072 4.947.072s3.667-.014 4.947-.072c1.234-.06 2.146-.257 2.916-.574.69-.294 1.252-.684 1.77-.942a4.42 4.42 0 001.085-1.085c.258-.518.648-1.08.942-1.77.317-.77.514-1.682.574-2.916.058-1.28.072-1.688.072-4.947s-.014-3.667-.072-4.947c-.06-1.234-.257-2.146-.574-2.916-.294-.69-.684-1.252-.942-1.77a4.42 4.42 0 00-1.085-1.085c-.518-.258-1.08-.648-1.77-.942-.77-.317-1.682-.514-2.916-.574-1.28-.058-1.688-.072-4.947-.072zM12 15.6c-1.988 0-3.6-1.612-3.6-3.6s1.612-3.6 3.6-3.6 3.6 1.612 3.6 3.6-1.612 3.6-3.6 3.6zm0-5.8c-1.21 0-2.2.99-2.2 2.2s.99 2.2 2.2 2.2 2.2-.99 2.2-2.2-.99-2.2-2.2-2.2z">
                            </path>
                        </svg></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M7 10.748L11.536 15 17 9.252 14.536 6.752 11.536 9.752 9.464 7.752zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                            </path>
                        </svg></a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors"><svg class="w-6 h-6"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2.5v-7h2.5v7zm-1.25-8.5c-.69 0-1.25-.56-1.25-1.25s.56-1.25 1.25-1.25 1.25.56 1.25 1.25-.56 1.25-1.25 1.25zm11.25 8.5h-2.5v-3.8c0-.85-.152-1.396-.75-1.396-.6 0-1.071.404-1.248.79-.17.37-.202.883-.202 1.488v3.018h-2.5s.035-6.388 0-7h2.5v1.093c.333-.594.757-1.127 1.674-1.127 1.22 0 2.126.793 2.126 2.493v4.541z">
                            </path>
                        </svg></a>
                </div>
            </div>

            <div>
                <h3 class="text-xl font-bold text-white mb-4">Link Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Beranda</a></li>
                    <li><a href="#products" class="text-gray-400 hover:text-white transition-colors">Produk</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-white transition-colors">Fitur</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tentang Kami</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-bold text-white mb-4">Kategori</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Elektronik</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fashion</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Home & Living</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Olahraga</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Aksesoris</a></li>
                </ul>
            </div>

            <div class="md:col-span-2 lg:col-span-1">
                <h3 class="text-xl font-bold text-white mb-4">Berlangganan Newsletter</h3>
                <p class="text-sm text-gray-400 mb-4">
                    Dapatkan update terbaru dan penawaran spesial langsung ke inbox Anda.
                </p>
                <form class="flex flex-col sm:flex-row gap-2">
                    <input type="email" placeholder="Email Anda"
                        class="flex-grow p-3 rounded-md bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button type="submit"
                        class="bg-blue-600 text-white px-5 py-3 rounded-md font-semibold hover:bg-blue-700 transition-colors">Subscribe</button>
                </form>
            </div>
        </div>

        <div class="text-center text-gray-500 text-sm mt-12 border-t border-gray-700 pt-8">
            &copy; 2025 Nama Toko Anda. Semua hak cipta dilindungi.
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const productCards = document.querySelectorAll('.product-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
                        btn.classList.add('bg-white', 'text-gray-600', 'border',
                            'border-gray-200', 'hover:bg-blue-50',
                            'hover:border-blue-200');
                    });

                    // Add active class to clicked button
                    button.classList.remove('bg-white', 'text-gray-600', 'border',
                        'border-gray-200', 'hover:bg-blue-50', 'hover:border-blue-200');
                    button.classList.add('bg-blue-600', 'text-white', 'shadow-lg');

                    const category = button.dataset.category;

                    productCards.forEach(card => {
                        if (category === 'all' || card.dataset.category === category) {
                            card.style.display = 'block'; // Show the card
                            setTimeout(() => card.style.opacity = '1', 50); // Fade in
                        } else {
                            card.style.opacity = '0'; // Fade out
                            setTimeout(() => card.style.display = 'none',
                                300); // Hide after animation
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
