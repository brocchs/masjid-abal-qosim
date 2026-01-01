<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-masjid-green to-masjid-green-light text-white">
        <div class="container mx-auto px-4 py-6">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-mosque text-3xl"></i>
                    <div>
                        <h1 class="text-2xl font-bold">Masjid Abal Qosim</h1>
                        <p class="text-green-100">Transparansi Keuangan Umat</p>
                    </div>
                </div>
                <a href="{{ route('login') }}" class="bg-white text-masjid-green px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login Admin
                </a>
            </div>
        </div>
    </header>

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
    <footer class="bg-masjid-green text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center md:text-left">
                    <div class="flex justify-center md:justify-start items-center mb-4">
                        <i class="fas fa-mosque text-2xl mr-3"></i>
                        <h4 class="text-xl font-bold">Masjid Abal Qosim</h4>
                    </div>
                    <p class="text-green-100 mb-4">Sistem Manajemen Keuangan Masjid</p>
                    <p class="text-sm text-green-200">© {{ date('Y') }} Moch.Alfarisyi. All rights reserved.</p>
                </div>
                <div class="text-center md:text-right">
                    <h5 class="text-lg font-semibold mb-3">Alamat Masjid</h5>
                    <div class="text-green-100 space-y-2">
                        <p><i class="fas fa-map-marker-alt mr-2"></i>Jl. Manyar Kartika Barat</p>
                        <p>Menur Pumpungan, Kec. Sukolilo</p>
                        <p>Surabaya, Jawa Timur 60118</p>
                        <a href="https://maps.app.goo.gl/uyrsqeEqktpDcLUa8" target="_blank" 
                           class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg mt-3 transition-colors">
                            <i class="fas fa-map mr-2"></i>Lihat di Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>