<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Ramos Badminton Center</title>

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

        .register-container {
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

        .register-hero {
             background: linear-gradient(rgb(0, 0, 0), rgba(0, 0, 0, 0)), url('../img/IMG-20250512-WA0010.jpg');
            background-size: cover;
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-hero h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.8rem;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .register-hero p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .register-features {
            list-style: none;
            padding: 0;
        }

        .register-features li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .register-features i {
            color: var(--secondary-color);
            font-size: 1.2rem;
            margin-right: 10px;
        }

        .register-form {
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

        .btn-register {
            background-color: var(--secondary-color);
            border: none;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
        }

        .btn-register:hover {
            background-color: #1e365a;
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

        .register-footer {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .register-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }

        /* Floating animation for shuttlecock */
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

        /* Password strength indicator */
        .password-strength {
            height: 5px;
            background: #e0e0e0;
            border-radius: 3px;
            margin-top: 5px;
            overflow: hidden;
        }

        .strength-meter {
            height: 100%;
            width: 0;
            transition: width 0.3s, background 0.3s;
        }

        /* Responsive design */
        @media (max-width: 992px) {
            .register-hero {
                padding: 40px;
            }

            .register-form {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .register-hero {
                display: none;
            }

            .register-form {
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container register-container">
        <div class="row g-0">
            <!-- Hero Section -->
            <div class="col-lg-6 register-hero">
                <img src="<?php echo e(URL::asset('img/shuttlecock.png')); ?>" alt="Shuttlecock" class="shuttlecock">
                <h2>Bergabung dengan Komunitas Ramos Badminton</h2>
                <p>Buat akun Anda untuk memesan lapangan, melacak pertandingan, dan terhubung dengan pecinta badminton lainnya.</p>

                <ul class="register-features">
                    <li><i class="fas fa-check-circle"></i> Sistem pemesanan lapangan yang mudah</li>
                    <li><i class="fas fa-check-circle"></i> Lacak riwayat pertandingan Anda</li>
                    <li><i class="fas fa-check-circle"></i> Ikuti turnamen dan acara</li>
                    <li><i class="fas fa-check-circle"></i> Terhubung dengan pemain lokal</li>
                </ul>
            </div>

            <!-- Register Form Section -->
            <div class="col-lg-6 register-form">
                <div class="logo">
                    <img src="<?php echo e(URL::asset('img/logo.jpg')); ?>" alt="Ramos Badminton Center">
                </div>

                <h1 class="form-title">Buat Akun</h1>
                <p class="form-subtitle">Bergabunglah dengan komunitas badminton kami dalam beberapa langkah saja</p>

                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>

                    <!-- Name Field -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input id="name" type="text" class="form-control ps-5 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus
                               placeholder="Nama Lengkap">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input id="email" type="email" class="form-control ps-5 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email"
                               placeholder="Alamat Email">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input id="password" type="password" class="form-control ps-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               name="password" required autocomplete="new-password"
                               placeholder="Kata Sandi" onkeyup="checkPasswordStrength(this.value)">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="password-strength">
                            <div class="strength-meter" id="strength-meter"></div>
                        </div>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-4 position-relative">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input id="password-confirm" type="password" class="form-control ps-5"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Konfirmasi Kata Sandi">
                    </div>

                    <!-- Terms Checkbox -->
                    <div class="mb-4 form-check">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            Saya setuju dengan <a href="#" class="text-decoration-none">Syarat Layanan</a> dan <a href="#" class="text-decoration-none">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-register w-100 mb-4">
                        <i class="fas fa-user-plus me-2"></i> Daftar
                    </button>

                    <!-- Divider -->
                    <div class="divider">
                        <span class="divider-text">SUDAH PUNYA AKUN?</span>
                    </div>

                    <!-- Login Link -->
                    <div class="register-footer">
                        <p>Sudah mendaftar? <a href="<?php echo e(route('login')); ?>">Masuk di sini</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <script>
        // Tetap dalam bahasa Inggris karena teknis
    </script>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/auth/register.blade.php ENDPATH**/ ?>