<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Masjid Abal Qosim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #0f172a;
            --brand-900: #0f2813;
            --brand-700: #1c4b24;
            --brand-500: #47c163;
            --gold-400: #f6d045;
        }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            color: var(--ink);
            background:
                radial-gradient(1100px 420px at 8% -10%, rgba(71, 193, 99, 0.18), transparent 60%),
                radial-gradient(900px 380px at 100% 0%, rgba(246, 208, 69, 0.18), transparent 58%),
                linear-gradient(140deg, #0d1f10 0%, #163f1d 55%, #1d5525 100%);
            position: relative;
            overflow-x: hidden;
            font-family: "Plus Jakarta Sans", "Segoe UI", Roboto, Arial, sans-serif;
        }
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(transparent 95%, rgba(255, 255, 255, 0.06) 95%),
                linear-gradient(90deg, transparent 95%, rgba(255, 255, 255, 0.06) 95%);
            background-size: 26px 26px;
            opacity: 0.3;
            pointer-events: none;
        }
        .auth-shell {
            width: min(1020px, calc(100% - 1.5rem));
            position: relative;
            z-index: 1;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.34);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(6px);
        }
        .auth-grid {
            display: grid;
            grid-template-columns: 1.05fr 1fr;
            min-height: 610px;
        }
        .auth-side {
            padding: 2.4rem 2.2rem;
            background:
                radial-gradient(560px 280px at 20% 10%, rgba(246, 208, 69, 0.19), transparent 60%),
                linear-gradient(160deg, rgba(9, 24, 12, 0.92), rgba(16, 42, 21, 0.92));
            color: #edf9ef;
        }
        .badge-trust {
            display: inline-flex;
            align-items: center;
            gap: .38rem;
            border-radius: 999px;
            border: 1px solid rgba(246, 208, 69, 0.4);
            background: rgba(246, 208, 69, 0.16);
            color: #fbe9a2;
            font-size: .72rem;
            letter-spacing: .04em;
            text-transform: uppercase;
            font-weight: 700;
            padding: .38rem .62rem;
        }
        .auth-title {
            margin-top: 1rem;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            line-height: 1.06;
            font-weight: 800;
        }
        .auth-subtitle {
            margin-top: .8rem;
            color: rgba(238, 249, 240, 0.88);
            line-height: 1.65;
            font-size: .95rem;
            max-width: 42ch;
        }
        .auth-points {
            margin-top: 1.4rem;
            display: grid;
            gap: .65rem;
        }
        .auth-point {
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            padding: .7rem .8rem;
            font-size: .88rem;
        }
        .auth-form-wrap {
            background: linear-gradient(170deg, #ffffff 0%, #f5f8f4 62%, #fff8e6 100%);
            padding: 2.4rem 2rem;
        }
        .auth-card-logo {
            width: 72px;
            height: 72px;
            object-fit: contain;
            filter: drop-shadow(0 10px 16px rgba(0, 0, 0, 0.22));
        }
        .form-label {
            font-size: .85rem;
            color: #334155;
            font-weight: 600;
        }
        .input-group-text {
            border-radius: 12px 0 0 12px;
            border-color: #d6e0d5;
            background: #f7faf7;
            color: #315037;
        }
        .form-control {
            border-color: #d6e0d5;
            border-radius: 0 12px 12px 0;
            min-height: 46px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 .2rem rgba(71, 193, 99, 0.18);
            border-color: #8bc897;
        }
        .btn-login {
            min-height: 48px;
            border: 1px solid rgba(8, 29, 12, 0.2);
            border-radius: 12px;
            background: linear-gradient(120deg, var(--brand-700), var(--brand-500));
            color: #fff;
            font-weight: 700;
            letter-spacing: .01em;
        }
        .btn-login:hover {
            color: #fff;
            background: linear-gradient(120deg, #245d2c, #53cf70);
        }
        .btn-pass-toggle {
            border: 1px solid #d6e0d5;
            border-left: 0;
            border-radius: 0 12px 12px 0;
            background: #f7faf7;
            color: #35533a;
        }
        .link-muted {
            color: #2f6f3b;
            font-weight: 600;
            text-decoration: none;
            font-size: .92rem;
        }
        .link-muted:hover {
            color: #1f4f2a;
        }
        .error-box {
            border: 1px solid #f5c2c7;
            background: #fff1f2;
            border-radius: 12px;
            color: #842029;
            font-size: .9rem;
            padding: .72rem .85rem;
        }
        @media (max-width: 991px) {
            .auth-grid {
                grid-template-columns: 1fr;
            }
            .auth-side {
                padding-bottom: 1.4rem;
            }
            .auth-form-wrap {
                padding-top: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <main class="auth-shell">
        <div class="auth-grid">
            <aside class="auth-side">
                <span class="badge-trust"><i class="fas fa-shield-alt"></i> Portal Internal</span>
                <h1 class="auth-title">Login Pengurus Masjid Abal Qosim</h1>
                <p class="auth-subtitle">Masuk untuk mengelola laporan kas, donasi, zakat, wakaf, dan data jamaah secara aman.</p>

                <div class="auth-points">
                    <div class="auth-point"><i class="fas fa-check-circle me-2 text-warning"></i>Akses khusus untuk admin terverifikasi.</div>
                    <div class="auth-point"><i class="fas fa-check-circle me-2 text-warning"></i>Data keuangan dan operasional dalam satu dashboard.</div>
                    <div class="auth-point"><i class="fas fa-check-circle me-2 text-warning"></i>Riwayat transaksi tersimpan dan mudah ditelusuri.</div>
                </div>
            </aside>

            <section class="auth-form-wrap d-flex flex-column justify-content-center">
                <div class="text-center mb-4">
                    <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="auth-card-logo mb-3">
                    <h2 class="h4 fw-bold mb-1">Masuk ke Dashboard</h2>
                    <p class="text-muted mb-0">Gunakan email dan password admin Anda</p>
                </div>

                @if($errors->any())
                    <div class="error-box mb-3">
                        <i class="fas fa-triangle-exclamation me-2"></i>{{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control border-end-0" id="password" name="password" autocomplete="current-password" required>
                            <button class="btn btn-pass-toggle" type="button" id="togglePassword" aria-label="Tampilkan password">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        <i class="fas fa-right-to-bracket me-2"></i>Masuk
                    </button>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="{{ route('password.request') }}" class="link-muted"><i class="fas fa-key me-1"></i>Lupa Password?</a>
                        <a href="{{ route('landing') }}" class="link-muted"><i class="fas fa-arrow-left me-1"></i>Kembali ke Beranda</a>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <script>
        const togglePasswordBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        if (togglePasswordBtn && passwordInput) {
            togglePasswordBtn.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';
                passwordInput.type = isPassword ? 'text' : 'password';
                this.innerHTML = isPassword ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
            });
        }
    </script>
</body>
</html>
