<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <nav class="w-full md:w-64 min-h-screen bg-gradient-to-br from-masjid-green to-masjid-green-light shadow-lg fixed md:relative z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300" id="sidebarMenu">
            <div class="p-4">
                <div class="text-center mb-6">
                    <i class="fas fa-mosque text-white text-4xl mb-2"></i>
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
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('transactions.*') || (request()->routeIs('reports.*') && !request()->routeIs('reports.donatur*')) ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('keuanganMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-money-bill-wave mr-2"></i>
                                Keuangan
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('transactions.*') || (request()->routeIs('reports.*') && !request()->routeIs('reports.donatur*')) ? '' : 'hidden' }}" id="keuanganMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('transactions.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('transactions.index') }}">
                                <i class="fas fa-exchange-alt mr-2"></i>
                                Cash Flow
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ (request()->routeIs('reports.*') && !request()->routeIs('reports.donatur*')) ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('reports.monthly') }}">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Laporan
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('zakat.*') || request()->routeIs('zakat-maal.*') || request()->routeIs('shodaqoh.*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('zakatMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-hand-holding-heart mr-2"></i>
                                Zakat dll.
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('zakat.*') || request()->routeIs('zakat-maal.*') || request()->routeIs('shodaqoh.*') ? '' : 'hidden' }}" id="zakatMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('zakat.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('zakat.index') }}">
                                <i class="fas fa-moon mr-2"></i>
                                Zakat Fitrah
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('zakat-maal.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('zakat-maal.index') }}">
                                <i class="fas fa-coins mr-2"></i>
                                Zakat Maal
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('shodaqoh.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('shodaqoh.index') }}">
                                <i class="fas fa-heart mr-2"></i>
                                Shodaqoh
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="flex items-center justify-between text-white hover:bg-white hover:bg-opacity-10 p-2 rounded {{ request()->routeIs('donasi.*') || request()->routeIs('wakaf.*') || request()->routeIs('reports.donatur*') ? 'bg-green-600 bg-opacity-50 font-bold' : '' }}" href="#" onclick="toggleMenu('donasiMenu')">
                            <span class="flex items-center text-sm">
                                <i class="fas fa-donate mr-2"></i>
                                Donasi & Wakaf
                            </span>
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <div class="ml-4 mt-2 space-y-1 {{ request()->routeIs('donasi.*') || request()->routeIs('wakaf.*') || request()->routeIs('reports.donatur*') ? '' : 'hidden' }}" id="donasiMenu">
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('donasi.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('donasi.index') }}">
                                <i class="fas fa-hand-holding-usd mr-2"></i>
                                Donasi
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('wakaf.*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('wakaf.index') }}">
                                <i class="fas fa-mosque mr-2"></i>
                                Wakaf
                            </a>
                            <a class="block text-white hover:bg-white hover:bg-opacity-10 p-2 rounded text-xs {{ request()->routeIs('reports.donatur*') ? 'bg-green-600 bg-opacity-75 font-bold' : 'text-green-100' }}" href="{{ route('reports.donatur') }}">
                                <i class="fas fa-users mr-2"></i>
                                Laporan Donatur
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
</body>
</html>