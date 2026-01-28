<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('pictures/logo-abal-qosim.png') }}">
    <title>Masjid Abal Qosim - Transparansi Keuangan</title>
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
                        'xs': '568px'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="h-16"></div>
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="header" style="background: linear-gradient(to right, rgba(44, 85, 48, 0.85), rgba(0, 0, 0, 0.85)); backdrop-filter: blur(10px);">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-14 h-14" style="filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8));">
                    <div>
                        <h1 class="text-white text-lg font-bold leading-tight" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Masjid<br>Abal Qosim</h1>
                    </div>
                </div>
                <nav class="hidden xs:flex space-x-1 h-16 items-center absolute left-1/2 -translate-x-1/2">
                    <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-white" style="border-bottom: 3px solid #4ade80;">Dashboard</a>
                    <a href="#" class="px-3 h-full flex items-center text-sm font-medium text-gray-300 hover:text-white transition-all" onmouseover="this.style.textShadow='0 0 20px #4ade80, 0 0 30px #4ade80'" onmouseout="this.style.textShadow=''">Event</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="flex items-center justify-center bg-white hover:bg-gray-50 text-black px-6 py-2.5 rounded-full transition-all shadow-lg hover:shadow-2xl" style="box-shadow: 0 0 20px rgba(255,255,255,0.5), 0 4px 6px rgba(0,0,0,0.1);" onmouseover="this.style.boxShadow='0 0 30px rgba(255,255,255,0.8), 0 8px 16px rgba(0,0,0,0.2)'" onmouseout="this.style.boxShadow='0 0 20px rgba(255,255,255,0.5), 0 4px 6px rgba(0,0,0,0.1)'">
                        <i class="fas fa-sign-in-alt text-black"></i>
                    </a>
                    <button class="xs:hidden text-gray-300 hover:text-white" onclick="toggleMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden fixed top-16 left-0 right-0 z-40 shadow-lg" style="background: linear-gradient(to right, rgba(44, 85, 48, 0.85), rgba(0, 0, 0, 0.85)); backdrop-filter: blur(10px);">
        <div class="container mx-auto px-4 py-4">
            <a href="#" class="block px-4 py-3 text-white font-medium border-b border-white/10 text-center">Dashboard</a>
            <a href="#" class="block px-4 py-3 text-gray-300 hover:text-white font-medium text-center">Event</a>
        </div>
    </div>

    <!-- Carousel Event -->
    <section class="bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="relative overflow-hidden rounded-xl shadow-lg">
                <div class="absolute top-6 left-6 z-10 bg-black/50 backdrop-blur-sm px-6 py-3 rounded-lg">
                    <h2 class="text-2xl font-bold text-white">Dokumentasi</h2>
                </div>
                <div id="carousel" class="flex transition-transform duration-500 ease-in-out">
                    @forelse($eventImages as $image)
                    <div class="min-w-full relative">
                        <img src="{{ asset($image) }}" alt="Event" class="w-full h-[500px] object-cover">
                    </div>
                    @empty
                    <div class="min-w-full relative">
                        <img src="https://via.placeholder.com/1200x400/2c5530/ffffff?text=Tidak+Ada+Event" alt="No Event" class="w-full h-[500px] object-cover">
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
    <section class="bg-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Laporan Keuangan Transparan</h2>
            <p class="text-xl text-gray-600 mb-8">Keterbukaan informasi keuangan masjid untuk kepercayaan jamaah</p>
            
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-12">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-hand-holding-heart text-3xl mb-3"></i>
                        <h3 class="text-lg font-semibold mb-2">Total Donasi</h3>
                        <p class="text-2xl font-bold">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-mosque text-3xl mb-3"></i>
                        <h3 class="text-lg font-semibold mb-2">Total Wakaf</h3>
                        <p class="text-2xl font-bold">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-arrow-up text-3xl mb-3"></i>
                        <h3 class="text-lg font-semibold mb-2">Total Pemasukan</h3>
                        <p class="text-2xl font-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                    </div>
                </div>
                
                <div class="bg-gradient-to-br from-red-500 to-red-600 text-white p-6 rounded-xl shadow-lg">
                    <div class="text-center">
                        <i class="fas fa-arrow-down text-3xl mb-3"></i>
                        <h3 class="text-lg font-semibold mb-2">Total Pengeluaran</h3>
                        <p class="text-2xl font-bold">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Donations -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Donasi Terbaru -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-hand-holding-usd text-blue-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Donasi Terbaru</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($donasiTerbaru as $donasi)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-800">{{ $donasi->nama_pemberi }}</p>
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
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-mosque text-purple-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Wakaf Terbaru</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($wakafTerbaru as $wakaf)
                        <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-800">{{ $wakaf->nama_pemberi }}</p>
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
    <section class="py-16 bg-masjid-green text-white">
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
    <section class="py-16 bg-white">
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
    <footer class="bg-gradient-to-r from-masjid-green to-black text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-10 h-10" style="filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8));">
                    <div>
                        <h4 class="text-lg font-bold leading-tight" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">Masjid<br>Abal Qosim</h4>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-sm text-white"><i class="fas fa-map-marker-alt mr-1"></i>Jl. Manyar Kartika Barat, Sukolilo, Surabaya</p>
                    <p class="text-[10px] text-gray-300 mt-1">© {{ date('Y') }} Moch.Alfarisyi. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script>
let currentSlide = 0;
const totalSlides = {{ count($eventImages) > 0 ? count($eventImages) : 1 }};

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
}

function prevSlide() {
    currentSlide--;
    showSlide(currentSlide);
}

function goToSlide(n) {
    currentSlide = n;
    showSlide(currentSlide);
}

function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

if (totalSlides > 1) {
    setInterval(nextSlide, 5000);
}

window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('bg-opacity-90', 'backdrop-blur-md');
    } else {
        header.classList.remove('bg-opacity-90', 'backdrop-blur-md');
    }
});

window.addEventListener('resize', function() {
    const menu = document.getElementById('mobile-menu');
    if (window.innerWidth >= 568) {
        menu.classList.add('hidden');
    }
});
</script>
</html>