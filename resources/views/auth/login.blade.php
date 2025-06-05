<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Ramos Badminton Center</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2a4365;
            --secondary-color: #f79318;
            --accent-color: #e53e3e;
            --light-color: #f7fafc;
            --dark-color: #1a202c;
        }

        .login-container {
            width: 100%;
            max-width: 1100px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-hero {
            background: linear-gradient(rgb(0, 0, 0), rgba(0, 0, 0, 0)), url('../img/IMG-20250512-WA0010.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-hero h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .login-hero p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .login-features {
            list-style: none;
            padding: 0;
        }

        .login-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .login-features i {
            color: var(--secondary-color);
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .login-form {
            background-color: white;
            padding: 60px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            height: 60px;
        }

        .form-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 10px;
            text-align: center;
        }

        .form-subtitle {
            color: #6c757d;
            text-align: center;
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .form-control {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding-left: 45px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(42, 67, 101, 0.25);
        }

        .input-group-text {
            position: absolute;
            z-index: 5;
            height: 50px;
            background: transparent;
            border: none;
            color: #6c757d;
        }

        .btn-login {
            background-color: var(--secondary-color);
            border: none;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background-color: #002861;
            transform: translateY(-2px);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e0e0e0;
        }

        .divider-text {
            padding: 0 15px;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .shuttlecock {
            position: absolute;
            top: -50px;
            right: -30px;
            width: 100px;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }

        @media (max-width: 992px) {
            .login-hero {
                padding: 40px;
            }

            .login-form {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .login-hero {
                display: none;
            }

            .login-form {
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row g-0">
            <!-- Bagian Hero -->
            <div class="col-lg-6 login-hero">
                <img src="{{ URL::asset('img/shuttlecock.png') }}" alt="Shuttlecock" class="shuttlecock">
                <h2>Selamat Datang Kembali di Ramos Badminton Center</h2>
                <p>Masuk untuk mengakses akun Anda dan memesan lapangan, melacak pertandingan Anda, dan bergabung dengan komunitas badminton kami.</p>
                <ul class="login-features">
                    <li><i class="fas fa-check-circle"></i> Pesan lapangan dalam hitungan detik</li>
                    <li><i class="fas fa-check-circle"></i> Lacak riwayat pertandingan Anda</li>
                    <li><i class="fas fa-check-circle"></i> Ikuti turnamen</li>
                    <li><i class="fas fa-check-circle"></i> Terhubung dengan pemain lain</li>
                </ul>
            </div>

            <!-- Bagian Form Masuk -->
            <div class="col-lg-6 login-form">
                <div class="logo">
                    <img src="{{ URL::asset('img/logo.jpg') }}" alt="Ramos Badminton Center">
                </div>

                <h1 class="form-title">Akses Akun Anda</h1>
                <p class="form-subtitle">Masukkan kredensial Anda untuk mengakses akun</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input id="email" type="email" class="form-control ps-5 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input id="password" type="password" class="form-control ps-5 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
                        @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <!-- Ingat Saya & Lupa Sandi -->
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Ingat Saya</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Kata Sandi?</a>
                        @endif
                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit" class="btn btn-primary btn-login w-100 mb-4">
                        <i class="fas fa-sign-in-alt me-2"></i> Masuk
                    </button>
                </form>

                <!-- Tautan Daftar -->
                <div class="login-footer">
                    @if (Route::has('register'))
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Tambahkan animasi ke elemen formulir
        document.addEventListener('DOMContentLoaded', function () {
            const formElements = document.querySelectorAll('.form-control, .btn-login, .social-btn');
            formElements.forEach((element, index) => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = 'all 0.5s ease ' + (index * 0.1) + 's';
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
</body>
</html>
