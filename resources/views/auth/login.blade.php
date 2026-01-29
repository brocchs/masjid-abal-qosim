<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Masjid Abal Qosim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2c5530, #4a7c59);
            min-height: 100vh;
            position: relative;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255,255,255,.05) 35px, rgba(255,255,255,.05) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(255,255,255,.05) 35px, rgba(255,255,255,.05) 70px);
            opacity: 0.5;
        }
        .login-card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card login-card" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px);">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <img src="{{ asset('pictures/logo-abal-qosim.png') }}" alt="Logo Masjid" class="mx-auto mb-3" style="width: 80px; height: 80px; filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.8));">
                            <h4 class="text-success" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">Masjid Abal Qosim</h4>
                            <p class="text-muted">Sistem Admin Pengurus Masjid</p>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Masuk
                            </button>
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('password.request') }}" class="text-decoration-none text-success d-inline-flex align-items-center" style="font-size: 0.9rem; transition: all 0.3s;" onmouseover="this.style.textShadow='0 0 10px rgba(44, 85, 48, 0.5)'; this.style.transform='scale(1.05)';" onmouseout="this.style.textShadow=''; this.style.transform='scale(1)';">
                                    <i class="fas fa-key me-2"></i>
                                    Lupa Password?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>