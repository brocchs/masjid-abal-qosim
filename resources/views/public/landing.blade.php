<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Masjid Abal Qosim Surabaya Menur - Transparansi keuangan masjid, donasi, wakaf, dan zakat. Jl. Manyar Kartika Barat, Sukolilo, Surabaya.">
    <meta name="keywords" content="masjid abal qosim, masjid abal qosim surabaya, masjid abal qosim menur, masjid surabaya, masjid menur, donasi masjid, wakaf masjid, zakat fitrah, masjid sukolilo">
    <meta name="author" content="Masjid Abal Qosim">
    <meta property="og:title" content="Masjid Abal Qosim - Transparansi Keuangan">
    <meta property="og:description" content="Masjid Abal Qosim Surabaya Menur - Transparansi keuangan masjid, donasi, wakaf, dan zakat">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('pictures/logo-abal-qosim.png') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" href="{{ asset('pictures/logo-abal-qosim.png') }}">
    <title>Masjid Abal Qosim Surabaya Menur - Transparansi Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'masjid-green': '#2c5530',
                        'masjid-green-light': '#4a7c59',
                        'masjid-green-dark': '#1e3a21'
                    },
                    screens: {
                        'xs': '700px'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 relative" style="scroll-padding-top: 80px;">
    <style>
        html {
            scroll-behavior: auto;
        }
        body {
            overflow-x: hidden;
        }
        html.smooth-scroll {
            overflow: hidden;
        }
        body.smooth-scroll {
            overflow: hidden;
        }
        #header {
            clip-path: ellipse(100% 100% at 50% 0%);
            padding-bottom: 20px;
        }
    </style>
    <div class="h-16"></div>
    <!-- Background Image -->
    <div id="bg-circle" class="absolute top-0 left-0 right-0 h-[700px] md:h-[1000px]" style="z-index: 1; opacity: 0; transition: opacity 0.8s ease-out; background-image: url('{{ asset('pictures/header2.png') }}'); background-size: cover; background-position: center;"></div>
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50" id="header" style="background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); transform: translateY(-100%); opacity: 0; transition: transform 0.6s ease-out, opacity 0.6s ease-out;">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-14 h-14" style="filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8));">
                    <div>
                        <h1 class="text-white text-lg font-bold leading-tight" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Masjid<br>Abal Qosim</h1>
                    </div>
                </div>
                <nav class="hidden xs:flex space-x-1 h-16 items-center absolute left-1/2 -translate-x-1/2">
                    <a href="#event" class="menu-link px-3 h-full flex items-center text-sm font-medium text-white" data-section="event" onmouseover="this.style.textShadow='0 0 20px #4ade80, 0 0 30px #4ade80'" onmouseout="this.style.textShadow=''" onclick="smoothScrollToSection(event, 'event')">Dokumentasi</a>
                    <a href="#laporan" class="menu-link px-3 h-full flex items-center text-sm font-medium text-white" data-section="laporan" onmouseover="this.style.textShadow='0 0 20px #4ade80, 0 0 30px #4ade80'" onmouseout="this.style.textShadow=''" onclick="smoothScrollToSection(event, 'laporan')">Laporan</a>
                    <a href="#donasi" class="menu-link px-3 h-full flex items-center text-sm font-medium text-white" data-section="donasi" onmouseover="this.style.textShadow='0 0 20px #4ade80, 0 0 30px #4ade80'" onmouseout="this.style.textShadow=''" onclick="smoothScrollToSection(event, 'donasi')">Donasi</a>
                    <a href="#lokasi" class="menu-link px-3 h-full flex items-center text-sm font-medium text-white" data-section="lokasi" onmouseover="this.style.textShadow='0 0 20px #4ade80, 0 0 30px #4ade80'" onmouseout="this.style.textShadow=''" onclick="smoothScrollToSection(event, 'lokasi')">Lokasi</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <button onclick="showLoginModal()" class="flex items-center justify-center bg-white hover:bg-gray-50 text-black px-6 py-2.5 rounded-full transition-all shadow-lg hover:shadow-2xl" style="box-shadow: 0 0 20px rgba(255,255,255,0.5), 0 4px 6px rgba(0,0,0,0.1);" onmouseover="this.style.boxShadow='0 0 30px rgba(255,255,255,0.8), 0 8px 16px rgba(0,0,0,0.2)'" onmouseout="this.style.boxShadow='0 0 20px rgba(255,255,255,0.5), 0 4px 6px rgba(0,0,0,0.1)'">
                        <i class="fas fa-sign-in-alt text-black"></i>
                    </button>
                    <button class="xs:hidden text-gray-300 hover:text-white" onclick="toggleMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden fixed left-0 right-0 z-40 shadow-lg" style="top: 64px; background: rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); clip-path: ellipse(100% 100% at 50% 0%); padding-bottom: 20px;">
        <div class="container mx-auto px-4 py-4">
            <a href="#event" class="mobile-menu-link block px-4 py-3 text-gray-300 hover:text-white font-medium text-center transition-all" data-section="event" style="text-shadow: 2px 2px 8px rgba(0,0,0,1), -2px -2px 8px rgba(0,0,0,1), 2px -2px 8px rgba(0,0,0,1), -2px 2px 8px rgba(0,0,0,1);" onclick="smoothScrollToSection(event, 'event'); toggleMenu();">Dokumentasi</a>
            <a href="#laporan" class="mobile-menu-link block px-4 py-3 text-gray-300 hover:text-white font-medium text-center transition-all" data-section="laporan" style="text-shadow: 2px 2px 8px rgba(0,0,0,1), -2px -2px 8px rgba(0,0,0,1), 2px -2px 8px rgba(0,0,0,1), -2px 2px 8px rgba(0,0,0,1);" onclick="smoothScrollToSection(event, 'laporan'); toggleMenu();">Laporan</a>
            <a href="#donasi" class="mobile-menu-link block px-4 py-3 text-gray-300 hover:text-white font-medium text-center transition-all" data-section="donasi" style="text-shadow: 2px 2px 8px rgba(0,0,0,1), -2px -2px 8px rgba(0,0,0,1), 2px -2px 8px rgba(0,0,0,1), -2px 2px 8px rgba(0,0,0,1);" onclick="smoothScrollToSection(event, 'donasi'); toggleMenu();">Donasi</a>
            <a href="#lokasi" class="mobile-menu-link block px-4 py-3 text-gray-300 hover:text-white font-medium text-center transition-all" data-section="lokasi" style="text-shadow: 2px 2px 8px rgba(0,0,0,1), -2px -2px 8px rgba(0,0,0,1), 2px -2px 8px rgba(0,0,0,1), -2px 2px 8px rgba(0,0,0,1);" onclick="smoothScrollToSection(event, 'lokasi'); toggleMenu();">Lokasi</a>
        </div>
    </div>

    <!-- Carousel Event -->
    <section id="event" class="bg-gray-100 py-8 relative">
        <div class="container mx-auto px-4 relative z-10">
            <div class="relative overflow-hidden rounded-xl shadow-lg" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;" id="carousel-container">
                <div class="absolute top-6 left-6 z-10 backdrop-blur-sm px-6 py-2.5 rounded-lg shadow-xl border border-white/20" style="background: radial-gradient(circle, rgba(44, 85, 48, 0.7) 0%, rgba(30, 58, 33, 0.7) 50%, rgba(0, 0, 0, 0.7) 100%);">
                    <h2 class="text-xl font-bold text-white" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8);">Dokumentasi</h2>
                </div>
                <div id="carousel" class="flex transition-transform duration-500 ease-in-out" style="user-select: none; -webkit-user-select: none; -webkit-user-drag: none;">
                    @forelse($eventImages as $image)
                    <div class="min-w-full relative">
                        <img src="{{ asset($image) }}" alt="Event" class="w-full h-[500px] object-cover" draggable="false" style="pointer-events: none;">
                    </div>
                    @empty
                    <div class="min-w-full relative">
                        <img src="https://via.placeholder.com/1200x400/2c5530/ffffff?text=Tidak+Ada+Event" alt="No Event" class="w-full h-[500px] object-cover" draggable="false" style="pointer-events: none;">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                            <h3 class="text-white text-2xl font-bold">Belum Ada Event</h3>
                            <p class="text-gray-200">Nantikan event menarik dari masjid</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                @if(count($eventImages) > 1)
                <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-masjid-green rounded-full p-3 shadow-lg">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-masjid-green rounded-full p-3 shadow-lg">
                    <i class="fas fa-chevron-right"></i>
                </button>
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                    @foreach($eventImages as $index => $image)
                    <button onclick="goToSlide({{ $index }})" class="w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} dot" id="dot-{{ $index }}"></button>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="laporan" class="bg-white py-16" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Laporan Keuangan Real Time</h2>
            
            <div class="max-w-4xl mx-auto mb-6">
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 shadow-sm border border-blue-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center justify-center">
                        <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                        Panduan Membaca Laporan
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-hand-holding-heart text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm mb-1">Total Donasi & Wakaf</h4>
                                    <p class="text-xs text-gray-600">Kontribusi jamaah untuk kegiatan masjid</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-arrow-up text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm mb-1">Total Pemasukan</h4>
                                    <p class="text-xs text-gray-600">Semua dana yang masuk ke kas masjid</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-arrow-down text-red-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm mb-1">Total Pengeluaran</h4>
                                    <p class="text-xs text-gray-600">Dana untuk operasional & kegiatan masjid</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-cyan-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-wallet text-cyan-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-sm mb-1">Saldo Akhir</h4>
                                    <p class="text-xs text-gray-600">Akumulasi dana keseluruhan yang tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-blue-200">
                        <div class="flex items-center justify-center space-x-6 text-sm">
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                    <i class="fas fa-arrow-up text-xs mr-1"></i>12%
                                </span>
                                <span class="text-gray-600 text-xs">Naik dari bulan lalu</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                    <i class="fas fa-arrow-down text-xs mr-1"></i>5%
                                </span>
                                <span class="text-gray-600 text-xs">Turun dari bulan lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mt-12">
                <div class="group relative bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-blue-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-hand-holding-heart text-2xl text-white"></i>
                        </div>
                        @if($donasiPercent != 0)
                        <span class="text-xs font-semibold px-3 py-1 bg-{{ $donasiPercent >= 0 ? 'green' : 'red' }}-100 text-{{ $donasiPercent >= 0 ? 'green' : 'red' }}-700 rounded-full">
                            <i class="fas fa-arrow-{{ $donasiPercent >= 0 ? 'up' : 'down' }} text-xs mr-1"></i>{{ number_format(abs($donasiPercent), 0, ',', '.') }}%
                        </span>
                        @endif
                    </div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Donasi</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-2">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500">{{ $monthName }}</p>
                </div>
                
                <div class="group relative bg-gradient-to-br from-purple-50 to-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-purple-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-mosque text-2xl text-white"></i>
                        </div>
                        @if($wakafPercent != 0)
                        <span class="text-xs font-semibold px-3 py-1 bg-{{ $wakafPercent >= 0 ? 'green' : 'red' }}-100 text-{{ $wakafPercent >= 0 ? 'green' : 'red' }}-700 rounded-full">
                            <i class="fas fa-arrow-{{ $wakafPercent >= 0 ? 'up' : 'down' }} text-xs mr-1"></i>{{ number_format(abs($wakafPercent), 0, ',', '.') }}%
                        </span>
                        @endif
                    </div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Wakaf</h3>
                    <p class="text-2xl font-bold text-purple-600 mb-2">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500">{{ $monthName }}</p>
                </div>
                
                <div class="group relative bg-gradient-to-br from-green-50 to-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-green-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-arrow-up text-2xl text-white"></i>
                        </div>
                        @if($pemasukanPercent != 0)
                        <span class="text-xs font-semibold px-3 py-1 bg-{{ $pemasukanPercent >= 0 ? 'green' : 'red' }}-100 text-{{ $pemasukanPercent >= 0 ? 'green' : 'red' }}-700 rounded-full">
                            <i class="fas fa-arrow-{{ $pemasukanPercent >= 0 ? 'up' : 'down' }} text-xs mr-1"></i>{{ number_format(abs($pemasukanPercent), 0, ',', '.') }}%
                        </span>
                        @endif
                    </div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Pemasukan</h3>
                    <p class="text-2xl font-bold text-green-600 mb-2">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500">{{ $monthName }}</p>
                </div>
                
                <div class="group relative bg-gradient-to-br from-red-50 to-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-red-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-arrow-down text-2xl text-white"></i>
                        </div>
                        @if($pengeluaranPercent != 0)
                        <span class="text-xs font-semibold px-3 py-1 bg-{{ $pengeluaranPercent >= 0 ? 'red' : 'green' }}-100 text-{{ $pengeluaranPercent >= 0 ? 'red' : 'green' }}-700 rounded-full">
                            <i class="fas fa-arrow-{{ $pengeluaranPercent >= 0 ? 'up' : 'down' }} text-xs mr-1"></i>{{ number_format(abs($pengeluaranPercent), 0, ',', '.') }}%
                        </span>
                        @endif
                    </div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Total Pengeluaran</h3>
                    <p class="text-2xl font-bold text-red-600 mb-2">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500">{{ $monthName }}</p>
                </div>
                
                <div class="group relative bg-gradient-to-br from-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-50 to-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-400 to-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-600 rounded-xl flex items-center justify-center shadow-md">
                            <i class="fas fa-wallet text-2xl text-white"></i>
                        </div>
                        <span class="text-xs font-semibold px-3 py-1 bg-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-100 text-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-700 rounded-full">
                            <i class="fas fa-{{ $totalSaldo >= 0 ? 'check' : 'exclamation' }} text-xs"></i>
                        </span>
                    </div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Saldo Akhir</h3>
                    <p class="text-2xl font-bold text-{{ $totalSaldo >= 0 ? 'cyan' : 'orange' }}-600 mb-2">Rp {{ number_format(abs($totalSaldo), 0, ',', '.') }}</p>
                    <p class="text-xs text-gray-500">Keseluruhan</p>
                </div>
            </div>
            
            <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium mt-8">
                <i class="fas fa-sync-alt mr-2 animate-spin" style="animation-duration: 3s;"></i>
                Data terintegrasi dengan sistem keuangan masjid dan terupdate secara otomatis
            </div>
        </div>
    </section>

    <!-- Recent Donations -->
    <section class="py-16 bg-gray-100" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;" id="recent-section">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Donasi Terbaru -->
                <div class="bg-gradient-to-br from-green-200 to-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-hand-holding-usd text-blue-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Donasi Terbaru</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($donasiTerbaru as $donasi)
                        <div class="flex justify-between items-center p-3 bg-white/50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-800">{{ substr($donasi->nama_pemberi, 0, 2) . str_repeat('*', max(0, strlen($donasi->nama_pemberi) - 2)) }}</p>
                                <p class="text-sm text-gray-600">{{ $donasi->tanggal_shodaqoh->format('d/m/Y') }}</p>
                            </div>
                            <span class="text-blue-600 font-bold">Rp {{ number_format($donasi->jumlah_shodaqoh, 0, ',', '.') }}</span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Belum ada donasi</p>
                        @endforelse
                    </div>
                </div>

                <!-- Wakaf Terbaru -->
                <div class="bg-gradient-to-br from-green-200 to-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-mosque text-purple-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Wakaf Terbaru</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($wakafTerbaru as $wakaf)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-800">{{ substr($wakaf->nama_pemberi, 0, 2) . str_repeat('*', max(0, strlen($wakaf->nama_pemberi) - 2)) }}</p>
                                <p class="text-sm text-gray-600">{{ $wakaf->tanggal_wakaf->format('d/m/Y') }}</p>
                                <p class="text-xs text-purple-600">{{ $wakaf->jenis_wakaf }}</p>
                            </div>
                            <span class="text-purple-600 font-bold">Rp {{ number_format($wakaf->jumlah_wakaf, 0, ',', '.') }}</span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Belum ada wakaf</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="donasi" class="py-16 bg-masjid-green text-white" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold mb-4">Ingin Berdonasi atau Berwakaf?</h3>
                <p class="text-xl text-green-100 mb-4">Hubungi admin masjid untuk informasi lebih lanjut</p>
                <div class="bg-yellow-400 text-masjid-green px-4 py-2 rounded-lg inline-block font-semibold">
                    <i class="fas fa-hand-pointer mr-2"></i>Klik nomor WhatsApp untuk chat langsung!
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 p-6 rounded-xl text-center">
                    <i class="fas fa-hand-holding-heart text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Zakat</h4>
                    <p class="text-green-100 mb-4">Tunaikan zakat fitrah dan zakat maal Anda</p>
                    <div class="text-sm text-green-200">
                        <p><i class="fas fa-user mr-2"></i>Habib</p>
                        <p><a href="https://wa.me/6282245559338?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20zakat" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>082245559338</a></p>
                        <p><i class="fas fa-envelope mr-2"></i>habib@jokne_suroboyo.com</p>
                    </div>
                </div>
                
                <div class="bg-white bg-opacity-10 p-6 rounded-xl text-center">
                    <i class="fas fa-hand-holding-usd text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Donasi</h4>
                    <p class="text-green-100 mb-4">Berdonasi untuk kegiatan masjid dan sosial</p>
                    <div class="text-sm text-green-200">
                        <p><i class="fas fa-user mr-2"></i>Habib</p>
                        <p><a href="https://wa.me/6282245559338?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20donasi" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>082245559338</a></p>
                        <p><i class="fas fa-envelope mr-2"></i>habib@jokne_suroboyo.com</p>
                    </div>
                </div>
                
                <div class="bg-white bg-opacity-10 p-6 rounded-xl text-center">
                    <i class="fas fa-mosque text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Wakaf</h4>
                    <p class="text-green-100 mb-4">Wakaf tanah, bangunan, atau uang untuk masjid</p>
                    <div class="text-sm text-green-200">
                        <p><i class="fas fa-user mr-2"></i>Habib</p>
                        <p><a href="https://wa.me/6282245559338?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20wakaf" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>082245559338</a></p>
                        <p><i class="fas fa-envelope mr-2"></i>habib@jokne_suroboyo.com</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <div class="bg-white bg-opacity-10 p-6 rounded-xl inline-block">
                    <h5 class="text-lg font-semibold mb-3">Kontak Admin Utama</h5>
                    <div class="space-y-2">
                        <p><i class="fas fa-user mr-2"></i>Muchammad Fauzi, S.Pd. (Ketua Takmir)</p>
                        <p><i class="fas fa-phone mr-2"></i>08121645348</p>
                        <p><i class="fas fa-envelope mr-2"></i>pakfa007@gmail.com</p>
                        <p><a href="https://wa.me/6208121645348?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20masjid" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>WhatsApp: 08121645348</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;" id="about-section">
        <div class="container mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-gray-800 mb-8">Tentang Transparansi Keuangan</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6">
                    <i class="fas fa-eye text-masjid-green text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Transparansi</h4>
                    <p class="text-gray-600">Semua pemasukan dan pengeluaran masjid dapat dilihat oleh jamaah</p>
                </div>
                <div class="p-6">
                    <i class="fas fa-shield-alt text-masjid-green text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Akuntabilitas</h4>
                    <p class="text-gray-600">Pengelolaan dana yang bertanggung jawab dan dapat dipertanggungjawabkan</p>
                </div>
                <div class="p-6">
                    <i class="fas fa-handshake text-masjid-green text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Kepercayaan</h4>
                    <p class="text-gray-600">Membangun kepercayaan jamaah melalui keterbukaan informasi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="lokasi" class="bg-gradient-to-r from-masjid-green to-black text-white py-8" style="opacity: 0; transform: translateY(30px); transition: opacity 0.8s ease-out, transform 0.8s ease-out;">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" style="filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8)); width: 120px; height: 120px;">
                        <div>
                            <h4 class="text-3xl font-bold leading-tight" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 20px rgba(74,222,128,0.5), 0 0 30px rgba(74,222,128,0.3);">Masjid<br>Abal Qosim</h4>
                        </div>
                    </div>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jl. Menur Gg V No. 48 Surabaya</p>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-phone mr-2"></i>085883112301 / 082245559338 / 081216303887</p>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-envelope mr-2"></i>pakfa007@gmail.com</p>
                    <p class="text-sm text-green-100"><a href="https://www.instagram.com/masjidabalqosim" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-instagram mr-2"></i>@masjidabalqosim</a></p>
                </div>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.54840985281!2d112.76171487404147!3d-7.292108171674097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd20c219739%3A0x16db492bed3b63cd!2sMasjid%20Abal%20Qosim!5e0!3m2!1sen!2sid!4v1769589419598!5m2!1sen!2sid" width="100%" height="200" style="border:0; border-radius: 12px; box-shadow: 0 0 20px rgba(74,222,128,0.4), 0 4px 6px rgba(0,0,0,0.3); pointer-events: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="border-t border-white/20 pt-4 text-center">
                <p class="text-xs text-gray-300">© {{ date('Y') }} Moch.Alfarisyi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="loginModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center transition-opacity duration-300">
        <div id="loginModalContent" class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 p-6 transform transition-all duration-300 scale-95 opacity-0">
            <div class="text-center mb-6">
                <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-16 h-16 mx-auto mb-4" style="filter: drop-shadow(3px 3px 8px rgba(0,0,0,1)) drop-shadow(-3px -3px 8px rgba(0,0,0,1));">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Konfirmasi Login</h3>
                <p class="text-gray-600">Apakah Anda pengurus masjid?</p>
            </div>
            <div class="flex space-x-3">
                <button onclick="closeLoginModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-3 px-4 rounded-lg transition-colors">
                    Bukan
                </button>
                <a href="{{ route('login') }}" class="flex-1 bg-masjid-green hover:bg-masjid-green-dark text-white font-medium py-3 px-4 rounded-lg transition-colors text-center">
                    Ya
                </a>
            </div>
        </div>
    </div>
</body>
<script>
function showLoginModal() {
    const modal = document.getElementById('loginModal');
    const content = document.getElementById('loginModalContent');
    modal.classList.remove('hidden');
    setTimeout(() => {
        content.classList.remove('scale-95', 'opacity-0');
        content.classList.add('scale-100', 'opacity-100');
    }, 10);
}

function closeLoginModal() {
    const modal = document.getElementById('loginModal');
    const content = document.getElementById('loginModalContent');
    content.classList.remove('scale-100', 'opacity-100');
    content.classList.add('scale-95', 'opacity-0');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

let currentSlide = 0;
const totalSlides = {{ count($eventImages) > 0 ? count($eventImages) : 1 }};
let startX = 0;
let isDragging = false;
let autoSlideInterval;

function showSlide(n) {
    const carousel = document.getElementById('carousel');
    const dots = document.querySelectorAll('.dot');
    
    if (n >= totalSlides) currentSlide = 0;
    if (n < 0) currentSlide = totalSlides - 1;
    
    carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
    
    dots.forEach((dot, index) => {
        dot.classList.toggle('bg-white', index === currentSlide);
        dot.classList.toggle('bg-white/50', index !== currentSlide);
    });
}

function nextSlide() {
    currentSlide++;
    showSlide(currentSlide);
    resetAutoSlide();
}

function prevSlide() {
    currentSlide--;
    showSlide(currentSlide);
    resetAutoSlide();
}

function goToSlide(n) {
    currentSlide = n;
    showSlide(currentSlide);
    resetAutoSlide();
}

function resetAutoSlide() {
    if (totalSlides <= 1) return;
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(nextSlide, 5000);
}

function initCarouselSwipe() {
    const carousel = document.getElementById('carousel');
    if (!carousel) return;

    carousel.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX;
        carousel.style.cursor = 'grabbing';
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
    });

    carousel.addEventListener('mouseup', (e) => {
        if (!isDragging) return;
        isDragging = false;
        carousel.style.cursor = 'grab';
        const endX = e.pageX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
            resetAutoSlide();
        }
    });

    carousel.addEventListener('mouseleave', () => {
        isDragging = false;
        carousel.style.cursor = 'grab';
    });

    carousel.addEventListener('touchstart', (e) => {
        startX = e.touches[0].pageX;
    }, { passive: true });

    carousel.addEventListener('touchmove', (e) => {
        if (!startX) return;
    }, { passive: true });

    carousel.addEventListener('touchend', (e) => {
        if (!startX) return;
        const endX = e.changedTouches[0].pageX;
        const diff = startX - endX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
            resetAutoSlide();
        }
        startX = 0;
    }, { passive: true });

    carousel.style.cursor = 'grab';
}

function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

function smoothScrollToSection(e, targetId) {
    e.preventDefault();
    isMenuScrolling = true;
    
    const target = document.getElementById(targetId);
    const headerOffset = 80;
    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
    
    const startPosition = window.pageYOffset;
    const distance = targetPosition - startPosition;
    const duration = 1000;
    let startTime = null;

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const progress = Math.min(timeElapsed / duration, 1);
        
        const easeProgress = progress < 0.5
            ? 4 * progress * progress * progress
            : 1 - Math.pow(-2 * progress + 2, 3) / 2;
        
        window.scrollTo(0, startPosition + distance * easeProgress);
        
        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        } else {
            scrollTarget = window.pageYOffset;
            currentScroll = window.pageYOffset;
            isMenuScrolling = false;
        }
    }

    requestAnimationFrame(animation);
}

window.addEventListener('load', function() {
    const header = document.getElementById('header');
    const bgCircle = document.getElementById('bg-circle');
    const carouselContainer = document.getElementById('carousel-container');
    setTimeout(() => {
        bgCircle.style.opacity = '1';
    }, 100);
    setTimeout(() => {
        header.style.transform = 'translateY(0)';
        header.style.opacity = '1';
    }, 200);
    setTimeout(() => {
        carouselContainer.style.transform = 'translateY(0)';
        carouselContainer.style.opacity = '1';
    }, 400);
    updateActiveMenu();
    initCarouselSwipe();
});

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.1 });

document.addEventListener('DOMContentLoaded', function() {
    observer.observe(document.getElementById('laporan'));
    observer.observe(document.getElementById('recent-section'));
    observer.observe(document.getElementById('donasi'));
    observer.observe(document.getElementById('about-section'));
    observer.observe(document.getElementById('lokasi'));
});

function updateActiveMenu() {
    const sections = ['lokasi', 'donasi', 'laporan', 'event'];
    let current = 'event';
    
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
        current = 'lokasi';
    } else {
        for (let section of sections) {
            const element = document.getElementById(section);
            if (element) {
                const rect = element.getBoundingClientRect();
                if (rect.top <= 100) {
                    current = section;
                    break;
                }
            }
        }
    }
    
    document.querySelectorAll('.menu-link').forEach(link => {
        const section = link.getAttribute('data-section');
        if (section === current) {
            link.style.borderBottom = '3px solid #4ade80';
        } else {
            link.style.borderBottom = '';
        }
    });
    
    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        const section = link.getAttribute('data-section');
        if (section === current) {
            link.style.backgroundColor = 'rgba(74, 222, 128, 0.5)';
            link.style.color = '#ffffff';
            link.style.textShadow = '0 0 20px #4ade80, 0 0 30px #4ade80, 2px 2px 8px rgba(0,0,0,1)';
            link.style.borderRadius = '8px';
        } else {
            link.style.backgroundColor = '';
            link.style.color = '';
            link.style.textShadow = '2px 2px 8px rgba(0,0,0,1), -2px -2px 8px rgba(0,0,0,1), 2px -2px 8px rgba(0,0,0,1), -2px 2px 8px rgba(0,0,0,1)';
            link.style.borderRadius = '';
        }
    });
}

window.addEventListener('scroll', updateActiveMenu);

if (totalSlides > 1) {
    autoSlideInterval = setInterval(nextSlide, 5000);
}



window.addEventListener('resize', function() {
    const menu = document.getElementById('mobile-menu');
    if (window.innerWidth >= 700) {
        menu.classList.add('hidden');
    }
});

let scrollTarget = window.pageYOffset;
let currentScroll = window.pageYOffset;
let isAnimating = false;
let isMenuScrolling = false;

window.addEventListener('wheel', function(e) {
    if (isMenuScrolling) return;
    
    e.preventDefault();
    scrollTarget += e.deltaY;
    scrollTarget = Math.max(0, Math.min(scrollTarget, document.body.scrollHeight - window.innerHeight));
    
    if (!isAnimating) {
        isAnimating = true;
        requestAnimationFrame(smoothScroll);
    }
}, { passive: false });

function smoothScroll() {
    const diff = scrollTarget - currentScroll;
    const delta = diff * 0.1;
    
    if (Math.abs(delta) > 0.5) {
        currentScroll += delta;
        window.scrollTo(0, currentScroll);
        requestAnimationFrame(smoothScroll);
    } else {
        currentScroll = scrollTarget;
        window.scrollTo(0, currentScroll);
        isAnimating = false;
    }
}
</script>
</html>