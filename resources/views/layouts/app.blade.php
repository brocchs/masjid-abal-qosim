<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('pictures/logo-abal-qosim.png') }}">
    <title>@yield('title', 'Admin Masjid Abal Qosim - Keuangan')</title>
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
                    animation: {
                        'spin-slow': 'spin 2s linear infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite'
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        
        .loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(44, 85, 48, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.3s ease;
        }
        .loader.hidden {
            opacity: 0;
            pointer-events: none;
        }
        
        /* Global Pagination Styles */
        .pagination-wrapper .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.25rem;
        }
        
        .pagination-wrapper .page-link {
            padding: 0.5rem 0.75rem;
            margin: 0;
            color: #374151;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .pagination-wrapper .page-link:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
            color: #1f2937;
        }
        
        .pagination-wrapper .page-item.active .page-link {
            background-color: #2c5530;
            border-color: #2c5530;
            color: #ffffff;
        }
        
        .pagination-wrapper .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: #f9fafb;
            border-color: #e5e7eb;
            cursor: not-allowed;
        }
        
        .pagination-wrapper .page-item:first-child .page-link,
        .pagination-wrapper .page-item:last-child .page-link {
            border-radius: 0.375rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Loading Screen -->
    <div id="loader" class="loader">
        <div class="text-center">
            <div class="relative">
                <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-24 h-24 mx-auto animate-pulse-slow">
                <div class="absolute -top-2 -right-2">
                    <div class="w-4 h-4 bg-white rounded-full animate-spin-slow"></div>
                </div>
            </div>
            <div class="mt-4">
                <h3 class="text-white text-xl font-semibold mb-2">Masjid Abal Qosim</h3>
                <div class="flex justify-center space-x-1">
                    <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 0ms"></div>
                    <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 150ms"></div>
                    <div class="w-2 h-2 bg-white rounded-full animate-bounce" style="animation-delay: 300ms"></div>
                </div>
                <p class="text-green-100 text-sm mt-2">Memuat halaman...</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <nav class="w-full md:w-64 bg-gradient-to-br from-masjid-green to-masjid-green-light shadow-lg fixed md:relative z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 top-0 bottom-0 overflow-y-auto" id="sidebarMenu">
            <div class="p-4">
                <div class="flex justify-between items-center mb-4 md:hidden">
                    <h5 class="text-white text-lg font-semibold">Menu</h5>
                    <button onclick="toggleSidebar()" class="text-white hover:bg-white hover:bg-opacity-10 p-2 rounded">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div class="text-center mb-6">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="w-16 h-16 mx-auto mb-2">
                    <h5 class="text-white text-lg font-semibold">Masjid Abal Qosim</h5>
                    <small class="text-green-100">✨ Sistem Admin Masjid ✨</small>
                    <div class="mt-3 p-3 bg-white bg-opacity-10 rounded-lg border border-white border-opacity-25">
                        <div class="text-center">
                            <strong class="text-white text-sm block">{{ Auth::user()->name }}</strong>
                            <small class="inline-block px-2 py-1 bg-green-600 bg-opacity-75 text-white rounded text-xs mt-1">
                                <i class="fas fa-crown mr-1"></i>{{ Auth::user()->userRole ? ucfirst(Auth::user()->userRole->name) : 'Unknown' }}
                            </small>
                        </div>
                    </div>
                </div>
                <ul class="space-y-2">
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('adminMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-cog mr-2"></i>
                                Admin
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? '' : 'hidden' }}" id="adminMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('users.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('users.index') }}">
                                <i class="fas fa-users mr-2"></i>
                                Master User
                            </a>
                            @if(Auth::user()->role_id && Auth::user()->userRole && Auth::user()->userRole->name === 'Admin IT')
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('roles.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('roles.index') }}">
                                <i class="fas fa-shield-alt mr-2"></i>
                                Master Role
                            </a>
                            @endif
                        </div>
                    </li>
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('cash-flow.*') || request()->routeIs('cashflow-reports.*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('keuanganMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                Keuangan
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('cash-flow.*') || request()->routeIs('cashflow-reports.*') ? '' : 'hidden' }}" id="keuanganMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('cash-flow.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('cash-flow.index') }}">
                                <i class="fas fa-exchange-alt mr-2"></i>
                                Cash Flow
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ (request()->routeIs('cashflow-reports.*')) ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('cashflow-reports.index') }}">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Laporan
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('zakat.*') || request()->routeIs('mustahik.*') || request()->routeIs('reports.zakat*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('zakatMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-hand-holding-heart mr-2"></i>
                                Zakat dll.
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('zakat.*') || request()->routeIs('mustahik.*') || request()->routeIs('reports.zakat*') ? '' : 'hidden' }}" id="zakatMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('zakat.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('zakat.index') }}">
                                <i class="fas fa-moon mr-2"></i>
                                Zakat
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('mustahik.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('mustahik.index') }}">
                                <i class="fas fa-users mr-2"></i>
                                Mustahik
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('reports.zakat*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('reports.zakat') }}">
                                <i class="fas fa-file-invoice mr-2"></i>
                                Laporan
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('donasi.*') || request()->routeIs('wakaf.*') || request()->routeIs('penerima-bantuan.*') || request()->routeIs('penyaluran.*') || request()->routeIs('reports.donatur*') || request()->routeIs('reports.penyaluran*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('donasiMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-donate mr-2"></i>
                                Donasi & Wakaf
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('donasi.*') || request()->routeIs('wakaf.*') || request()->routeIs('penerima-bantuan.*') || request()->routeIs('penyaluran.*') || request()->routeIs('reports.donatur*') || request()->routeIs('reports.penyaluran*') ? '' : 'hidden' }}" id="donasiMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('donasi.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('donasi.index') }}">
                                <i class="fas fa-hand-holding-usd mr-2"></i>
                                Donasi
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('wakaf.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('wakaf.index') }}">
                                <i class="fas fa-mosque mr-2"></i>
                                Wakaf
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('penerima-bantuan.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('penerima-bantuan.index') }}">
                                <i class="fas fa-users mr-2"></i>
                                Penerima Bantuan
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('penyaluran.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('penyaluran.index') }}">
                                <i class="fas fa-hand-holding mr-2"></i>
                                Penyaluran
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('reports.donatur*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('reports.donatur') }}">
                                <i class="fas fa-chart-line mr-2"></i>
                                Laporan Donatur
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('reports.penyaluran*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('reports.penyaluran') }}">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Laporan Penyaluran
                            </a>
                        </div>
                    </li>
                    <li class="mt-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full bg-transparent border border-white text-white hover:bg-white hover:text-masjid-green px-4 py-2 rounded text-sm transition-colors">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="flex-1 p-4 md:p-6 min-h-screen md:ml-0">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 md:p-6 mb-6">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-masjid-green to-masjid-green-light rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-line text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                            <p class="text-xs md:text-sm text-gray-500">Sistem Manajemen Keuangan Masjid</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between md:justify-end space-x-4">
                        <div class="flex items-center space-x-2 bg-gray-50 px-3 py-2 rounded-lg">
                            <i class="fas fa-clock text-gray-400 text-sm"></i>
                            <span class="text-xs md:text-sm text-gray-600">{{ date('d M Y, H:i') }}</span>
                        </div>
                        <button class="md:hidden bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded-lg transition-colors" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative" role="alert">
                    {{ session('success') }}
                    <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 relative" role="alert">
                    {{ session('error') }}
                    <button class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @yield('content')
            
            <footer class="fixed bottom-0 left-0 md:left-64 right-0 bg-white border-t border-gray-200 px-4 md:px-6 py-2">
                <div class="text-center md:text-right text-gray-500 text-xs">
                    © {{ date('Y') }} Moch.Alfarisyi. All rights reserved.
                </div>
            </footer>
        </main>
    </div>

    <script>
        function toggleMenu(menuId) {
            const menu = document.getElementById(menuId);
            menu.classList.toggle('hidden');
        }
        
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarMenu');
            sidebar.classList.toggle('-translate-x-full');
        }
        
        function showLoader() {
            document.getElementById('loader').classList.remove('hidden');
        }
        
        function hideLoader() {
            document.getElementById('loader').classList.add('hidden');
        }
        
        // Show loader on page navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Hide loader when page is fully loaded
            setTimeout(hideLoader, 300);
            
            // Show loader on link clicks
            document.querySelectorAll('a:not([href^="#"]):not([href^="javascript:"])').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!e.ctrlKey && !e.metaKey) {
                        showLoader();
                        // Auto hide after 3 seconds as fallback
                        setTimeout(hideLoader, 3000);
                    }
                });
            });
            
            // Show loader on form submissions
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Don't show loader for delete confirmation forms
                    if (e.target.onsubmit && e.target.onsubmit.toString().includes('showDeleteModal')) {
                        return;
                    }
                    showLoader();
                    // Auto hide after 5 seconds as fallback
                    setTimeout(hideLoader, 5000);
                });
            });
        });
        
        // Force hide loader on window load and page show events
        window.addEventListener('load', hideLoader);
        window.addEventListener('pageshow', hideLoader);
        window.addEventListener('focus', hideLoader);
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebarMenu');
            const toggleButton = event.target.closest('button[onclick="toggleSidebar()"]');
            
            if (!sidebar.contains(event.target) && !toggleButton && window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
    @yield('scripts')

    <!-- Custom Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full mx-4 transform transition-all scale-95 hover:scale-100">
            <!-- Header dengan gradient hijau -->
            <div class="bg-gradient-to-r from-masjid-green to-masjid-green-light rounded-t-2xl p-4">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white bg-opacity-20 backdrop-blur-sm rounded-full border-2 border-white border-opacity-30">
                    <i class="fas fa-exclamation-triangle text-white text-2xl animate-pulse"></i>
                </div>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 text-center mb-2 flex items-center justify-center">
                    <i class="fas fa-trash-alt text-red-500 mr-2"></i>
                    Konfirmasi Hapus
                </h3>
                <p class="text-sm text-gray-600 text-center mb-6 leading-relaxed">Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</p>
                
                <!-- Buttons -->
                <div class="flex space-x-3">
                    <button onclick="closeDeleteModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-all duration-200 border border-gray-300 hover:border-gray-400">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button onclick="confirmDelete()" class="flex-1 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteForm = null;
        
        function showDeleteModal(form) {
            deleteForm = form;
            
            // Get menu name from current page title
            const pageTitle = document.querySelector('h1').textContent.trim();
            const menuName = pageTitle.toLowerCase();
            
            // Update modal text
            const modalText = document.querySelector('#deleteModal p');
            modalText.textContent = `Apakah Anda yakin ingin menghapus data ${menuName} ini? Tindakan ini tidak dapat dibatalkan.`;
            
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
            deleteForm = null;
        }
        
        function confirmDelete() {
            if (deleteForm) {
                showLoader();
                deleteForm.submit();
            }
        }
    </script>
</body>
</html>