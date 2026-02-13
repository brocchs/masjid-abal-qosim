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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/solidroad-blueprint.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'masjid-green': '#1b421b',
                        'masjid-green-light': '#47c163',
                        'masjid-green-dark': '#0e220e'
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
        :root {
            --v2-ink: #09140b;
            --v2-forest: #102714;
            --v2-mint: #47c163;
            --v2-gold: #f6d045;
            --v2-cream: #f6f3ea;
        }
        html { scroll-behavior: smooth; }
        body {
            overflow-x: hidden;
            background:
                radial-gradient(800px 300px at 10% 0%, rgba(71,193,99,.12), transparent 60%),
                radial-gradient(700px 260px at 90% 20%, rgba(246,208,69,.14), transparent 58%),
                var(--v2-cream);
            color: var(--v2-ink);
            font-family: "Plus Jakarta Sans", system-ui, sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: "Space Grotesk", "Plus Jakarta Sans", sans-serif;
            letter-spacing: -0.02em;
        }
        .v2-shell { position: relative; isolation: isolate; }
        .v2-shell::before,
        .v2-shell::after {
            content: "";
            position: absolute;
            z-index: -1;
            border-radius: 9999px;
            filter: blur(80px);
            pointer-events: none;
        }
        .v2-shell::before {
            width: 360px;
            height: 360px;
            left: -140px;
            top: 160px;
            background: rgba(71, 193, 99, 0.24);
        }
        .v2-shell::after {
            width: 430px;
            height: 430px;
            right: -170px;
            top: 640px;
            background: rgba(191, 231, 230, 0.5);
        }
        .nav-shell {
            background: linear-gradient(180deg, rgba(14, 38, 18, 0.9) 0%, rgba(10, 29, 14, 0.84) 100%);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(246, 208, 69, 0.34);
            box-shadow: 0 10px 28px rgba(4, 12, 5, 0.24);
        }
        #header.nav-shell {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
        }
        #mobile-menu.nav-shell {
            position: fixed !important;
            top: 4rem;
            left: 0;
            right: 0;
        }
        .nav-shell::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: -1px;
            height: 1px;
            background: linear-gradient(90deg, rgba(246, 208, 69, 0), rgba(246, 208, 69, 0.72), rgba(71, 193, 99, 0.62), rgba(246, 208, 69, 0));
            pointer-events: none;
        }
        .menu-link,
        .mobile-menu-link {
            letter-spacing: 0.02em;
            font-weight: 600;
        }
        .menu-link { position: relative; }
        .menu-link.active::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 3px;
            border-radius: 99px;
            background: linear-gradient(90deg, var(--v2-gold), var(--v2-mint));
        }
        .hero-panel {
            background: linear-gradient(140deg, rgba(255,255,255,.18), rgba(255,255,255,.06));
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 22px;
            box-shadow: 0 26px 62px rgba(6, 18, 6, 0.35);
        }
        .section-card {
            background: #fff;
            border: 1px solid #dbe4d8;
            border-radius: 20px;
            box-shadow: 0 14px 34px rgba(14, 34, 14, 0.08);
        }
        .soft-gradient {
            background: linear-gradient(160deg, #ffffff 0%, #eef6ef 56%, #fdf7e6 100%);
        }
        .contact-card {
            border: 1px solid rgba(255,255,255,.22);
            background: rgba(255,255,255,.08);
            backdrop-filter: blur(6px);
            border-radius: 18px;
        }
        #home {
            background:
                radial-gradient(1200px 480px at 80% -10%, rgba(246,208,69,.16), rgba(246,208,69,0)),
                linear-gradient(135deg, #09180c 0%, #12321a 52%, #194521 100%);
            border-bottom-left-radius: 36px;
            border-bottom-right-radius: 36px;
            padding-top: 5rem;
        }
        #donasi {
            border-top-left-radius: 34px;
            border-top-right-radius: 34px;
            border-bottom-left-radius: 34px;
            border-bottom-right-radius: 34px;
            overflow: hidden;
        }
        #home .sr-title {
            font-size: clamp(2.2rem, 5.7vw, 4.2rem);
            line-height: 1.02;
            text-wrap: balance;
        }
        #home .sr-btn-primary {
            color: #102714;
            background: linear-gradient(120deg, #f6d045, #ffe79c);
            border: 1px solid rgba(255,255,255,.3);
        }
        #home .sr-btn-secondary {
            color: #fff;
            border-color: rgba(255,255,255,.45);
            background: rgba(255,255,255,.09);
        }
        .v2-bento {
            display: grid;
            grid-template-columns: repeat(6, minmax(0, 1fr));
            gap: 0.8rem;
        }
        .v2-bento-card {
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 16px;
            padding: 0.9rem;
            background: rgba(255,255,255,.08);
            color: #f8fafc;
        }
        .v2-bento-main {
            grid-column: span 6;
            background: linear-gradient(125deg, rgba(246,208,69,.25), rgba(71,193,99,.2));
            border-color: rgba(246,208,69,.55);
        }
        .v2-bento-half {
            grid-column: span 3;
        }
        .v2-bento-third {
            grid-column: span 3;
        }
        .v2-bento .kicker {
            font-size: 0.68rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #d2f2d8;
        }
        .v2-bento .value {
            margin-top: 0.3rem;
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(1.25rem, 3.1vw, 2.2rem);
            line-height: 1;
            font-weight: 700;
            color: #fff;
        }
        .v2-bento .caption {
            margin-top: 0.35rem;
            font-size: 0.78rem;
            color: rgba(255,255,255,.86);
        }
        .v2-event-section {
            margin-top: 1.2rem;
        }
        .v2-editorial {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 1rem;
            align-items: stretch;
        }
        .v2-editorial-copy {
            background: linear-gradient(165deg, #0f2813 0%, #173c1f 100%);
            color: #f3fbf4;
            border-radius: 18px;
            padding: 1.1rem;
            border: 1px solid rgba(246,208,69,.35);
        }
        .v2-editorial-copy .eyebrow {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: #f6d045;
        }
        .v2-editorial-copy .title {
            margin-top: 0.45rem;
            font-size: clamp(1.2rem, 2.4vw, 2rem);
            line-height: 1.08;
            font-weight: 700;
        }
        .v2-editorial-copy .body {
            margin-top: 0.75rem;
            font-size: 0.92rem;
            color: #d1ead5;
            line-height: 1.6;
        }
        .v2-editorial-badges {
            margin-top: 0.85rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
        }
        .v2-editorial-badges span {
            font-size: 0.72rem;
            border-radius: 999px;
            padding: 0.32rem 0.55rem;
            border: 1px solid rgba(255,255,255,.24);
            background: rgba(255,255,255,.08);
        }
        .v2-report-section {
            background: linear-gradient(180deg, #0f2012 0%, #15311a 100%);
            color: #ecf8ed;
            border-radius: 28px;
            margin-top: 1.2rem;
        }
        .v2-report-section .section-card {
            background: rgba(255,255,255,.94);
            color: #0f172a;
        }
        .v2-report-section .sr-eyebrow {
            color: #f8dd7a !important;
        }
        .v2-report-section h2 {
            color: #ffffff !important;
        }
        .v2-report-section .text-slate-600 {
            color: #cae1cd !important;
        }
        .v2-mega-stats {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1fr;
            gap: 0.9rem;
            margin-top: 1.1rem;
        }
        .v2-mega-card {
            border-radius: 18px;
            padding: 1rem;
            border: 1px solid rgba(255,255,255,.22);
            background: linear-gradient(155deg, rgba(255,255,255,.08), rgba(255,255,255,.02));
            text-align: left;
        }
        .v2-mega-card .label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #b8d8be;
        }
        .v2-mega-card .money {
            margin-top: 0.42rem;
            font-family: "Space Grotesk", sans-serif;
            font-size: clamp(1.45rem, 3.3vw, 2.7rem);
            line-height: 1.03;
            color: #fff;
        }
        .v2-mega-card .meta {
            margin-top: 0.35rem;
            font-size: 0.78rem;
            color: #c8e2cd;
        }
        .v2-mega-card.primary {
            background: linear-gradient(145deg, rgba(246,208,69,.22), rgba(71,193,99,.14));
            border-color: rgba(246,208,69,.55);
        }
        .v2-report-quick {
            margin-top: 1rem;
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.7rem;
        }
        .v2-pill {
            border-radius: 999px;
            padding: 0.35rem 0.62rem;
            font-size: 0.72rem;
            font-weight: 700;
        }
        .v2-recent-section .section-card {
            border-top: 5px solid #47c163;
        }
        .v2-timeline {
            border: 1px solid #d8e6d8;
            border-radius: 18px;
            background: #fff;
            padding: 1rem;
        }
        .v2-timeline .head {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 0.9rem;
        }
        .v2-timeline .track {
            border-left: 2px dashed #b8d0b8;
            margin-left: 0.55rem;
            padding-left: 1rem;
            display: grid;
            gap: 0.7rem;
        }
        .v2-timeline-item {
            position: relative;
            border: 1px solid #e2ebe2;
            border-radius: 12px;
            padding: 0.75rem 0.8rem;
            background: #f8fbf8;
        }
        .v2-timeline-item::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 999px;
            left: -1.36rem;
            top: 1rem;
            background: #47c163;
            box-shadow: 0 0 0 3px #e6f5e9;
        }
        .v2-donate-section {
            background:
                radial-gradient(700px 220px at 20% 10%, rgba(246,208,69,.15), transparent 60%),
                linear-gradient(130deg, #0f2813, #194522);
        }
        .v2-donate-board {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 1rem;
            margin-top: 0.8rem;
        }
        .v2-donate-main {
            border-radius: 18px;
            border: 1px solid rgba(246,208,69,.4);
            background: linear-gradient(135deg, rgba(246,208,69,.14), rgba(255,255,255,.06));
            padding: 1.1rem;
        }
        .v2-donate-actions {
            display: grid;
            gap: 0.8rem;
        }
        .v2-action-card {
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,.24);
            background: rgba(255,255,255,.08);
            padding: 0.95rem;
        }
        .v2-admin-card {
            margin-top: 1rem;
            border-radius: 16px;
            border: 1px solid rgba(246,208,69,.4);
            background: linear-gradient(135deg, rgba(255,255,255,.12), rgba(255,255,255,.06));
            color: #ecf8ed;
            text-align: left;
        }
        .v2-admin-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 0.7rem;
            margin-top: 0.8rem;
        }
        .v2-admin-item {
            border-radius: 12px;
            border: 1px solid rgba(255,255,255,.2);
            background: rgba(12, 33, 17, 0.35);
            padding: 0.65rem 0.75rem;
            font-size: 0.85rem;
        }
        .v2-footer {
            border-top-left-radius: 26px;
            border-top-right-radius: 26px;
            padding-top: 3rem !important;
            padding-bottom: 1.25rem !important;
        }
        .v2-map-frame {
            border: 0;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(74,222,128,0.25), 0 2px 4px rgba(0,0,0,0.2);
            pointer-events: none;
            background: #0f1f12;
        }
        .fade-up {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .7s ease, transform .7s ease;
        }
        .fade-up.in {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 767px) {
            .v2-shell::before,
            .v2-shell::after {
                display: none;
            }

            .sr-container {
                width: min(1200px, calc(100% - 1.25rem));
            }

            #home {
                margin-top: 0 !important;
                padding-top: 4.5rem !important;
            }

            .sr-eyebrow {
                font-size: 0.68rem;
                letter-spacing: 0.06em;
            }

            .sr-title {
                font-size: clamp(1.65rem, 8vw, 2.1rem) !important;
                line-height: 1.12;
            }

            .sr-subtitle {
                font-size: 0.95rem;
                line-height: 1.55;
            }

            .sr-actions {
                display: grid;
                grid-template-columns: 1fr;
                width: 100%;
                gap: 0.6rem;
            }

            .sr-actions .sr-btn {
                width: 100%;
            }

            #home .hero-panel {
                padding: 1rem !important;
            }
            .v2-bento {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            .v2-bento-main,
            .v2-bento-half,
            .v2-bento-third {
                grid-column: span 2;
            }
            .v2-mega-stats {
                grid-template-columns: 1fr;
                gap: 0.7rem;
            }
            .v2-report-quick {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            .v2-editorial,
            .v2-donate-board {
                grid-template-columns: 1fr;
            }
            .v2-admin-grid {
                grid-template-columns: 1fr;
            }

            #home .sr-metric-card {
                padding: 0.95rem;
            }

            #home .sr-metric-value {
                font-size: 1.35rem;
            }

            #event img {
                height: 240px !important;
            }

            #laporan h2,
            #donasi h3,
            #about-section h3 {
                font-size: 1.75rem !important;
                line-height: 1.2;
            }

            #laporan .grid,
            #recent-section .grid,
            #donasi .grid {
                gap: 0.85rem !important;
            }

            #laporan .section-card,
            #recent-section .section-card,
            #donasi .section-card,
            #event .section-card {
                border-radius: 14px;
            }

            #donasi .contact-card {
                padding: 1rem !important;
            }

            #donasi .inline-block {
                display: block;
                width: 100%;
            }

            #mobile-menu .mobile-menu-link {
                font-size: 0.95rem;
            }

            footer iframe {
                height: 220px !important;
            }

            footer h4.text-3xl {
                font-size: 1.75rem !important;
            }

            .v2-footer {
                padding-top: 2.2rem !important;
                padding-bottom: 0.85rem !important;
            }
        }
    </style>
    <div class="v2-shell">
        <header class="fixed top-0 left-0 right-0 z-50 nav-shell" id="header" style="transform: translateY(-100%); opacity: 0; transition: transform 0.6s ease-out, opacity 0.6s ease-out;">
            <div class="sr-container h-16 flex items-center justify-between gap-4 px-3 md:px-4">
                <a href="#home" class="flex items-center gap-3" onclick="smoothScrollToSection(event, 'home')">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid Abal Qosim" class="w-11 h-11 object-contain">
                    <div class="text-white leading-tight">
                        <p class="text-sm font-semibold">Masjid</p>
                        <p class="text-base font-bold">Abal Qosim</p>
                    </div>
                </a>
                <nav class="hidden xs:flex items-center gap-1 h-16 absolute left-1/2 -translate-x-1/2">
                    <a href="#home" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="home" onclick="smoothScrollToSection(event, 'home')">Beranda</a>
                    <a href="#event" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="event" onclick="smoothScrollToSection(event, 'event')">Dokumentasi</a>
                    <a href="#laporan" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="laporan" onclick="smoothScrollToSection(event, 'laporan')">Laporan</a>
                    <a href="#recent-section" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="recent-section" onclick="smoothScrollToSection(event, 'recent-section')">Aktivitas</a>
                    <a href="#donasi" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="donasi" onclick="smoothScrollToSection(event, 'donasi')">Donasi</a>
                    <a href="#lokasi" class="menu-link text-white px-3 text-sm h-full flex items-center" data-section="lokasi" onclick="smoothScrollToSection(event, 'lokasi')">Lokasi</a>
                </nav>
                <div class="flex items-center gap-2">
                    <button onclick="showLoginModal()" class="sr-btn sr-btn-primary text-sm">Login Admin</button>
                    <button class="xs:hidden text-white w-10 h-10 rounded-full border border-white/25" onclick="toggleMenu()">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </header>

        <div id="mobile-menu" class="hidden fixed top-16 left-0 right-0 z-40 nav-shell border-t border-white/10">
            <div class="sr-container py-4 grid gap-1">
                <a href="#home" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="home" onclick="smoothScrollToSection(event, 'home'); toggleMenu();">Beranda</a>
                <a href="#event" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="event" onclick="smoothScrollToSection(event, 'event'); toggleMenu();">Dokumentasi</a>
                <a href="#laporan" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="laporan" onclick="smoothScrollToSection(event, 'laporan'); toggleMenu();">Laporan</a>
                <a href="#recent-section" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="recent-section" onclick="smoothScrollToSection(event, 'recent-section'); toggleMenu();">Aktivitas</a>
                <a href="#donasi" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="donasi" onclick="smoothScrollToSection(event, 'donasi'); toggleMenu();">Donasi</a>
                <a href="#lokasi" class="mobile-menu-link text-gray-200 px-3 py-2 rounded-md" data-section="lokasi" onclick="smoothScrollToSection(event, 'lokasi'); toggleMenu();">Lokasi</a>
            </div>
        </div>

        <section id="home" class="sr-hero sr-section fade-up in">
            <div class="sr-container">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 items-center">
                    <div>
                        <span class="sr-eyebrow">Transparansi Amanah Jamaah</span>
                        <h1 class="sr-title">Laporan Keuangan Masjid yang Jelas, Cepat, dan Terbuka</h1>
                        <p class="sr-subtitle">Semua donasi, wakaf, pemasukan, dan pengeluaran ditampilkan terstruktur agar jamaah dapat memantau amanah dengan mudah.</p>
                        <div class="sr-actions">
                            <a href="#laporan" class="sr-btn sr-btn-primary" onclick="smoothScrollToSection(event, 'laporan')">Lihat Ringkasan</a>
                            <a href="#donasi" class="sr-btn sr-btn-secondary" onclick="smoothScrollToSection(event, 'donasi')">Donasi Sekarang</a>
                        </div>
                    </div>
                    <div class="hero-panel p-5 md:p-6">
                        <p class="text-xs uppercase tracking-[0.14em] text-green-100 mb-4">Ringkasan {{ $monthName }}</p>
                        <div class="v2-bento">
                            <article class="v2-bento-card v2-bento-main">
                                <p class="kicker">Saldo Akhir Keseluruhan</p>
                                <p class="value">Rp {{ number_format(abs($totalSaldo), 0, ',', '.') }}</p>
                                <p class="caption">Posisi kas total yang dapat dipakai untuk pembiayaan program masjid.</p>
                            </article>
                            <article class="v2-bento-card v2-bento-half">
                                <p class="kicker">Pemasukan Bulan Ini</p>
                                <p class="value">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                                <p class="caption">{{ $pemasukanPercent >= 0 ? '+' : '-' }}{{ number_format(abs($pemasukanPercent), 0, ',', '.') }}% dari bulan lalu</p>
                            </article>
                            <article class="v2-bento-card v2-bento-half">
                                <p class="kicker">Pengeluaran Bulan Ini</p>
                                <p class="value">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                                <p class="caption">{{ $pengeluaranPercent >= 0 ? '+' : '-' }}{{ number_format(abs($pengeluaranPercent), 0, ',', '.') }}% dari bulan lalu</p>
                            </article>
                            <article class="v2-bento-card v2-bento-third">
                                <p class="kicker">Donasi</p>
                                <p class="value">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                            </article>
                            <article class="v2-bento-card v2-bento-third">
                                <p class="kicker">Wakaf</p>
                                <p class="value">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Carousel Event -->
    <section id="event" class="sr-section fade-up v2-event-section">
        <div class="sr-container">
            <div class="v2-editorial" id="carousel-container">
                <aside class="v2-editorial-copy">
                    <p class="eyebrow">Dokumentasi</p>
                    <h2 class="title">Cerita Kegiatan Masjid dalam Satu Timeline Visual</h2>
                    <p class="body">Bukan sekadar galeri foto. Ini bukti aktivitas jamaah, program sosial, dan dinamika kegiatan yang berjalan sepanjang periode.</p>
                    <div class="v2-editorial-badges">
                        <span>Aktivitas Lapangan</span>
                        <span>Program Sosial</span>
                        <span>Kajian & Ibadah</span>
                    </div>
                </aside>
                <div class="section-card p-3 md:p-4">
                    <div class="relative overflow-hidden rounded-xl border border-slate-200">
                        <div id="carousel" class="flex transition-transform duration-500 ease-in-out" style="user-select: none; -webkit-user-select: none; -webkit-user-drag: none;">
                            @forelse($eventImages as $image)
                            <div class="min-w-full relative">
                                <img src="{{ asset($image) }}" alt="Event" class="w-full h-[440px] md:h-[560px] object-cover" draggable="false" style="pointer-events: none;">
                            </div>
                            @empty
                            <div class="min-w-full relative">
                                <img src="https://via.placeholder.com/1400x560/235524/ffffff?text=Belum+Ada+Dokumentasi+Terbaru" alt="No Event" class="w-full h-[440px] md:h-[560px] object-cover" draggable="false" style="pointer-events: none;">
                            </div>
                            @endforelse
                        </div>
                        @if(count($eventImages) > 1)
                        <button onclick="prevSlide()" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 text-white hover:bg-black/60">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button onclick="nextSlide()" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 text-white hover:bg-black/60">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex space-x-2">
                            @foreach($eventImages as $index => $image)
                            <button onclick="goToSlide({{ $index }})" class="w-2.5 h-2.5 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} dot" id="dot-{{ $index }}"></button>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Section -->
    <section id="laporan" class="sr-section fade-up v2-report-section">
        <div class="sr-container">
            <div class="text-center">
                <span class="sr-eyebrow text-green-700">Laporan Inti</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-2">Ringkasan Keuangan Masjid</h2>
                <p class="text-slate-600">Periode {{ $monthName }}. Fokus pada angka yang paling penting untuk jamaah.</p>
            </div>

            <div class="v2-mega-stats">
                <article class="v2-mega-card primary">
                    <p class="label">Saldo Akhir</p>
                    <p class="money">Rp {{ number_format(abs($totalSaldo), 0, ',', '.') }}</p>
                    <p class="meta">Akumulasi keseluruhan kas masjid.</p>
                    <div class="mt-3 flex items-center gap-2">
                        <span class="v2-pill {{ $totalSaldo >= 0 ? 'bg-emerald-200 text-emerald-900' : 'bg-amber-200 text-amber-900' }}">
                            {{ $totalSaldo >= 0 ? 'Kas Positif' : 'Saldo Tercatat' }}
                        </span>
                    </div>
                </article>
                <article class="v2-mega-card">
                    <p class="label">Pemasukan</p>
                    <p class="money">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                    <p class="meta">{{ $pemasukanPercent >= 0 ? '+' : '-' }}{{ number_format(abs($pemasukanPercent), 0, ',', '.') }}% dari bulan lalu.</p>
                </article>
                <article class="v2-mega-card">
                    <p class="label">Pengeluaran</p>
                    <p class="money">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                    <p class="meta">{{ $pengeluaranPercent >= 0 ? '+' : '-' }}{{ number_format(abs($pengeluaranPercent), 0, ',', '.') }}% dari bulan lalu.</p>
                </article>
            </div>

            <div class="v2-report-quick">
                <article class="section-card p-4">
                    <p class="text-xs uppercase tracking-wider text-slate-500">Donasi</p>
                    <p class="text-2xl md:text-3xl font-extrabold text-blue-700 mt-1">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</p>
                    @if($donasiPercent != 0)
                    <p class="text-xs mt-2 {{ $donasiPercent >= 0 ? 'text-emerald-700' : 'text-red-700' }}">{{ $donasiPercent >= 0 ? '+' : '-' }}{{ number_format(abs($donasiPercent), 0, ',', '.') }}%</p>
                    @endif
                </article>
                <article class="section-card p-4">
                    <p class="text-xs uppercase tracking-wider text-slate-500">Wakaf</p>
                    <p class="text-2xl md:text-3xl font-extrabold text-purple-700 mt-1">Rp {{ number_format($totalWakaf, 0, ',', '.') }}</p>
                    @if($wakafPercent != 0)
                    <p class="text-xs mt-2 {{ $wakafPercent >= 0 ? 'text-emerald-700' : 'text-red-700' }}">{{ $wakafPercent >= 0 ? '+' : '-' }}{{ number_format(abs($wakafPercent), 0, ',', '.') }}%</p>
                    @endif
                </article>
                <article class="section-card p-4">
                    <p class="text-xs uppercase tracking-wider text-slate-500">Update</p>
                    <p class="text-lg font-bold text-slate-900 mt-1">Data tersinkron otomatis</p>
                    <p class="text-xs text-slate-500 mt-2">Terintegrasi sistem kas internal.</p>
                </article>
                <article class="section-card p-4 flex flex-col justify-between">
                    <p class="text-xs uppercase tracking-wider text-slate-500">Aksi</p>
                    <button onclick="printReport()" class="mt-3 sr-btn bg-masjid-green hover:bg-masjid-green-dark text-white w-full">
                        <i class="fas fa-print mr-2"></i>Cetak Laporan
                    </button>
                </article>
            </div>
        </div>
    </section>

    <!-- Recent Donations -->
    <section class="sr-section fade-up v2-recent-section" id="recent-section">
        <div class="sr-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Donasi Terbaru -->
                <div class="v2-timeline">
                    <div class="head">
                        <i class="fas fa-hand-holding-usd text-blue-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Donasi Terbaru</h3>
                    </div>
                    <div class="track">
                        @forelse($donasiTerbaru as $donasi)
                        <div class="v2-timeline-item flex justify-between items-center gap-3">
                            <div>
                                <p class="font-medium text-gray-800">{{ substr($donasi->nama_pembayar, 0, 2) . str_repeat('*', max(0, strlen($donasi->nama_pembayar) - 2)) }}</p>
                                <p class="text-sm text-gray-600">{{ $donasi->tanggal_bayar->format('d/m/Y') }}</p>
                            </div>
                            <span class="text-blue-600 font-bold">Rp {{ number_format($donasi->total_bayar, 0, ',', '.') }}</span>
                        </div>
                        @empty
                        <p class="text-gray-500 text-center py-4">Belum ada donasi</p>
                        @endforelse
                    </div>
                </div>

                <!-- Wakaf Terbaru -->
                <div class="v2-timeline">
                    <div class="head">
                        <i class="fas fa-mosque text-purple-600 text-2xl mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Wakaf Terbaru</h3>
                    </div>
                    <div class="track">
                        @forelse($wakafTerbaru as $wakaf)
                        <div class="v2-timeline-item flex justify-between items-center gap-3">
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
    <section id="donasi" class="sr-section bg-masjid-green text-white fade-up v2-donate-section">
        <div class="sr-container">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold mb-4">Ingin Berdonasi atau Berwakaf?</h3>
                <p class="text-xl text-green-100 mb-4">Hubungi admin masjid untuk informasi lebih lanjut</p>
                <div class="bg-yellow-400 text-masjid-green px-4 py-2 rounded-lg inline-block font-semibold">
                    <i class="fas fa-hand-pointer mr-2"></i>Klik nomor WhatsApp untuk chat langsung!
                </div>
            </div>
            
            <div class="v2-donate-board">
                <div class="v2-donate-main">
                    <p class="text-xs uppercase tracking-widest text-yellow-200">Amanah Jamaah</p>
                    <h4 class="text-2xl md:text-3xl font-bold mt-2">Satu Pintu Informasi Donasi, Zakat, dan Wakaf</h4>
                    <p class="text-green-100 mt-3">Konsultasikan kebutuhan ibadah Anda dengan pengurus. Semua alur donasi diarahkan agar jelas, tercatat, dan mudah ditelusuri pada laporan.</p>
                    <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm">
                        <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                            <p class="font-semibold text-yellow-200">Respon Cepat</p>
                            <p class="text-green-100 text-xs mt-1">Admin aktif via WhatsApp.</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                            <p class="font-semibold text-yellow-200">Data Tercatat</p>
                            <p class="text-green-100 text-xs mt-1">Terhubung ke sistem keuangan.</p>
                        </div>
                        <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                            <p class="font-semibold text-yellow-200">Transparan</p>
                            <p class="text-green-100 text-xs mt-1">Bisa dipantau jamaah.</p>
                        </div>
                    </div>
                </div>
                <div class="v2-donate-actions">
                <div class="contact-card p-6 text-center v2-action-card">
                    <i class="fas fa-hand-holding-heart text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Zakat</h4>
                    <p class="text-green-100 mb-4">Tunaikan zakat fitrah dan zakat maal Anda</p>
                    <div class="text-sm text-green-200">
                        <p><i class="fas fa-user mr-2"></i>Habib</p>
                        <p><a href="https://wa.me/6282245559338?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20zakat" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>082245559338</a></p>
                        <p><i class="fas fa-envelope mr-2"></i>habib@jokne_suroboyo.com</p>
                    </div>
                </div>
                
                <div class="contact-card p-6 text-center v2-action-card">
                    <i class="fas fa-hand-holding-usd text-4xl mb-4"></i>
                    <h4 class="text-xl font-semibold mb-3">Donasi</h4>
                    <p class="text-green-100 mb-4">Berdonasi untuk kegiatan masjid dan sosial</p>
                    <div class="text-sm text-green-200">
                        <p><i class="fas fa-user mr-2"></i>Habib</p>
                        <p><a href="https://wa.me/6282245559338?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20donasi" class="text-green-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>082245559338</a></p>
                        <p><i class="fas fa-envelope mr-2"></i>habib@jokne_suroboyo.com</p>
                    </div>
                </div>
                
                <div class="contact-card p-6 text-center v2-action-card">
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
            </div>
            
            <div class="v2-admin-card p-5 md:p-6">
                <p class="text-xs uppercase tracking-widest text-yellow-200">Kontak Utama</p>
                <h5 class="text-xl font-bold mt-2">Muchammad Fauzi, S.Pd. (Ketua Takmir)</h5>
                <div class="v2-admin-grid">
                    <div class="v2-admin-item">
                        <p class="text-xs text-green-200 uppercase tracking-wide">Telepon</p>
                        <p class="font-semibold mt-1"><i class="fas fa-phone mr-2"></i>08121645348</p>
                    </div>
                    <div class="v2-admin-item">
                        <p class="text-xs text-green-200 uppercase tracking-wide">Email</p>
                        <p class="font-semibold mt-1"><i class="fas fa-envelope mr-2"></i>pakfa007@gmail.com</p>
                    </div>
                    <div class="v2-admin-item">
                        <p class="text-xs text-green-200 uppercase tracking-wide">WhatsApp</p>
                        <p class="font-semibold mt-1"><a href="https://wa.me/6208121645348?text=Assalamu%27alaikum%2C%20saya%20ingin%20bertanya%20tentang%20masjid" class="text-yellow-200 hover:text-white transition-colors"><i class="fab fa-whatsapp mr-2"></i>Chat Sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="sr-section bg-white fade-up" id="about-section">
        <div class="sr-container text-center">
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
    <footer id="lokasi" class="sr-section bg-gradient-to-b from-masjid-green to-black text-white v2-footer">
        <div class="sr-container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white/5 border border-white/15 rounded-2xl p-5">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" style="filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8)); width: 120px; height: 120px;">
                        <div>
                            <h4 class="text-3xl font-bold leading-tight" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 20px rgba(74,222,128,0.5), 0 0 30px rgba(74,222,128,0.3);">Masjid<br>Abal Qosim</h4>
                            <span class="inline-block mt-2 text-xs px-2 py-1 rounded-full bg-yellow-300 text-green-950 font-semibold">Surabaya Menur</span>
                        </div>
                    </div>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-map-marker-alt mr-2"></i>Jl. Menur Gg V No. 48 Surabaya</p>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-phone mr-2"></i>085883112301 / 082245559338 / 081216303887</p>
                    <p class="text-sm text-green-100 mb-2"><i class="fas fa-envelope mr-2"></i>pakfa007@gmail.com</p>
                    <p class="text-sm text-green-100"><a href="https://www.instagram.com/masjidabalqosim" target="_blank" class="hover:text-white transition-colors"><i class="fab fa-instagram mr-2"></i>@masjidabalqosim</a></p>
                </div>
                <div class="bg-white/5 border border-white/15 rounded-2xl p-3">
                    <iframe
                        class="v2-map-frame js-lazy-map"
                        src="about:blank"
                        data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.54840985281!2d112.76171487404147!3d-7.292108171674097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd20c219739%3A0x16db492bed3b63cd!2sMasjid%20Abal%20Qosim!5e0!3m2!1sen!2sid!4v1769589419598!5m2!1sen!2sid"
                        width="100%"
                        height="200"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="border-t border-white/20 pt-4 text-center">
                <p class="text-xs text-gray-300">&copy; {{ date('Y') }} Masjid Abal Qosim. Created by Moch.Alfarisyi.</p>
            </div>
        </div>
    </footer>
    </div>

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

    <!-- Pemasukan Detail Modal -->
    <div id="pemasukanModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center transition-opacity duration-300">
        <div id="pemasukanModalContent" class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 p-6 transform transition-all duration-300 scale-95 opacity-0 max-h-[80vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-gray-800">Detail Pemasukan</h3>
                <button onclick="closePemasukanModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div id="pemasukanContent" class="overflow-y-auto flex-1">
                <div class="flex justify-center items-center py-8">
                    <i class="fas fa-spinner fa-spin text-3xl text-green-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengeluaran Detail Modal -->
    <div id="pengeluaranModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center transition-opacity duration-300">
        <div id="pengeluaranModalContent" class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 p-6 transform transition-all duration-300 scale-95 opacity-0 max-h-[80vh] overflow-hidden flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-2xl font-bold text-gray-800">Detail Pengeluaran</h3>
                <button onclick="closePengeluaranModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div id="pengeluaranContent" class="overflow-y-auto flex-1">
                <div class="flex justify-center items-center py-8">
                    <i class="fas fa-spinner fa-spin text-3xl text-red-600"></i>
                </div>
            </div>
        </div>
    </div>
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

function printReport() {
    Promise.all([
        fetch('/pemasukan-detail').then(r => r.json()),
        fetch('/pengeluaran-detail').then(r => r.json())
    ]).then(([pemasukan, pengeluaran]) => {
        const logoUrl = window.location.origin + '/pictures/logo-abal-qosim.png';
        const month = '{{ $monthName }}';
        const printDate = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
        const totalPemasukan = 'Rp {{ number_format($totalPemasukan, 0, ',', '.') }}';
        const totalPengeluaran = 'Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}';
        const saldo = 'Rp {{ number_format(abs($totalPemasukan - $totalPengeluaran), 0, ',', '.') }}';
        const totalSaldo = 'Rp {{ number_format(abs($totalSaldo), 0, ',', '.') }}';
        
        let content = '<html><head><title>Laporan Keuangan</title>';
        content += '<style>@page{size:A4;margin:10mm}body{font-family:Arial,sans-serif;padding:10px;font-size:12px}.header{display:flex;align-items:center;margin-bottom:5px}.logo{width:60px;height:60px;margin-right:15px}.header-text{flex:1;text-align:center}h2{margin:0;font-size:22px;font-weight:bold}h3{margin:10px 0 5px;font-size:14px;text-align:center;font-weight:bold}hr{margin:2px 0;border:none;border-top:2px solid #000}.summary{display:flex;justify-content:space-between;margin:20px 0;border:2px solid #000;padding:15px;background:#f8f9fa}.summary div{text-align:center;flex:1;border-right:1px solid #ccc}.summary div:last-child{border-right:none}table{width:100%;margin-top:20px;font-size:11px;border-collapse:collapse}th,td{border:1px solid #000;padding:8px 6px;text-align:left}th{background-color:#e9ecef;font-weight:bold;text-align:center}.text-green{color:#059669}.text-red{color:#dc2626}.section-title{margin-top:20px;font-size:13px;font-weight:bold;background:#e9ecef;padding:8px;border:1px solid #000}</style>';
        content += '</head><body>';
        content += '<div class="header">';
        content += `<img src="${logoUrl}" class="logo" alt="Logo Masjid">`;
        content += '<div class="header-text">';
        content += '<h2>MASJID ABAL QOSIM</h2>';
        content += '<p style="margin:0;font-size:9px">JL. Menur Gg V No. 48 Surabaya</p>';
        content += '<p style="margin:0;font-size:9px">Telp 085883112301 / 082245559338 / 081216303887</p>';
        content += '</div></div>';
        content += '<hr>';
        content += '<h3>LAPORAN KEUANGAN</h3>';
        content += `<p style="text-align:center;margin:0 0 5px;font-size:12px;font-weight:bold">Periode: ${month}</p>`;
        content += `<p style="text-align:center;margin:0 0 15px;font-size:10px;color:#666">Tanggal Cetak: ${printDate}</p>`;
        content += '<div class="summary">';
        content += `<div><strong>Total Pemasukan:</strong><br>${totalPemasukan}</div>`;
        content += `<div><strong>Total Pengeluaran:</strong><br>${totalPengeluaran}</div>`;
        content += `<div><strong>Saldo ${month}:</strong><br>${saldo}</div>`;
        content += `<div><strong>Saldo Akhir:</strong><br>${totalSaldo}<br><small style="font-size:9px">(Keseluruhan)</small></div>`;
        content += '</div>';
        
        content += '<div class="section-title">DETAIL PEMASUKAN</div>';
        content += '<table><thead><tr>';
        content += '<th>No</th><th>Tanggal</th><th>Keterangan</th><th style="text-align:right">Jumlah</th>';
        content += '</tr></thead><tbody>';
        if (pemasukan.length === 0) {
            content += '<tr><td colspan="4" style="text-align:center">Belum ada data pemasukan</td></tr>';
        } else {
            pemasukan.forEach((item, index) => {
                content += `<tr><td style="text-align:center">${index + 1}</td><td>${item.tanggal}</td><td>${item.keterangan}</td><td style="text-align:right" class="text-green">${item.jumlah}</td></tr>`;
            });
        }
        content += '</tbody></table>';
        
        content += '<div class="section-title">DETAIL PENGELUARAN</div>';
        content += '<table><thead><tr>';
        content += '<th>No</th><th>Tanggal</th><th>Keterangan</th><th style="text-align:right">Jumlah</th>';
        content += '</tr></thead><tbody>';
        if (pengeluaran.length === 0) {
            content += '<tr><td colspan="4" style="text-align:center">Belum ada data pengeluaran</td></tr>';
        } else {
            pengeluaran.forEach((item, index) => {
                content += `<tr><td style="text-align:center">${index + 1}</td><td>${item.tanggal}</td><td>${item.keterangan}</td><td style="text-align:right" class="text-red">${item.jumlah}</td></tr>`;
            });
        }
        content += '</tbody></table>';
        content += '</body></html>';
        
        const printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write(content);
        printWindow.document.close();
        setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }, 250);
    }).catch(error => {
        alert('Gagal memuat data laporan');
    });
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
    if (e) e.preventDefault();
    const target = document.getElementById(targetId);
    if (!target) return;

    const headerOffset = 80;
    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;

    window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
    });
}

window.addEventListener('load', function() {
    const header = document.getElementById('header');
    const carouselContainer = document.getElementById('carousel-container');
    setTimeout(() => {
        header.style.transform = 'translateY(0)';
        header.style.opacity = '1';
    }, 200);
    if (carouselContainer) {
        setTimeout(() => {
        carouselContainer.style.transform = 'translateY(0)';
        carouselContainer.style.opacity = '1';
        }, 350);
    }
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
    const lazyMap = document.querySelector('.js-lazy-map');
    if (lazyMap && lazyMap.dataset.src) {
        const loadMap = () => {
            if (!lazyMap.src || lazyMap.src === 'about:blank') {
                lazyMap.src = lazyMap.dataset.src;
            }
        };

        if ('IntersectionObserver' in window) {
            const mapObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        loadMap();
                        mapObserver.disconnect();
                    }
                });
            }, { rootMargin: '400px 0px' });
            mapObserver.observe(lazyMap);
        } else {
            loadMap();
        }
    }

    observer.observe(document.getElementById('event'));
    observer.observe(document.getElementById('home'));
    observer.observe(document.getElementById('laporan'));
    observer.observe(document.getElementById('recent-section'));
    observer.observe(document.getElementById('donasi'));
    observer.observe(document.getElementById('about-section'));
});

function updateActiveMenu() {
    const sections = ['home', 'event', 'laporan', 'recent-section', 'donasi', 'lokasi'];
    let current = 'home';
    
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 50) {
        current = 'lokasi';
    } else {
        const marker = window.scrollY + 110;
        sections.forEach((section) => {
            const element = document.getElementById(section);
            if (element && element.offsetTop <= marker) {
                current = section;
            }
        });
    }
    
    document.querySelectorAll('.menu-link').forEach(link => {
        const section = link.getAttribute('data-section');
        link.classList.toggle('active', section === current);
    });

    document.querySelectorAll('.mobile-menu-link').forEach(link => {
        const section = link.getAttribute('data-section');
        if (section === current) {
            link.style.backgroundColor = 'rgba(255,255,255,0.2)';
            link.style.color = '#ffffff';
            link.style.textShadow = '';
            link.style.borderRadius = '8px';
        } else {
            link.style.backgroundColor = '';
            link.style.color = '';
            link.style.textShadow = '';
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
</script>
</body>
</html>
