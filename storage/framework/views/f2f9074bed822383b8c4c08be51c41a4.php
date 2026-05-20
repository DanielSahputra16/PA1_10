<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard | Ramos Badminton Center</title>

    <!-- Font Awesome & Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --dark-green: #06231D;
            --medium-green: #064c42;
            --light-green: #076653;
            --accent-green: #0a8c70;
            --highlight: #0cb992;
            --soft-bg: #f8fafc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--soft-bg);
            color: #334155;
        }

        /* --- Global Wrapper Adjustment --- */
        .main {
            background-color: var(--soft-bg);
            min-height: 100vh;
        }

        /* --- Hero Greeting Card --- */
        .greeting-card {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            border: none;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            border-left: 6px solid var(--accent-green);
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        .greeting-card::after {
            content: '\f44b'; /* Icon Shuttlecock / Sports */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            right: -20px;
            bottom: -20px;
            font-size: 8rem;
            color: rgba(10, 140, 112, 0.05);
            transform: rotate(-15deg);
        }

        /* --- Stats Card Premium --- */
        .stat-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 1.25rem;
            flex-shrink: 0;
        }

        .bg-gradient-green {
            background: linear-gradient(135deg, var(--light-green) 0%, var(--accent-green) 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(7, 102, 83, 0.2);
        }

        .bg-gradient-orange {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        .bg-gradient-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(29, 78, 216, 0.2);
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 0;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* --- Section Title --- */
        .section-title {
            font-weight: 700;
            color: var(--dark-green);
            position: relative;
            padding-left: 15px;
            margin-bottom: 25px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 5px;
            height: 25px;
            background: var(--highlight);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar dimuat di sini -->
        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main">
            <!-- Navbar dimuat di sini -->
            <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main class="content">
                <div class="container-fluid p-4">

                    <!-- Header Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card greeting-card p-4" data-aos="fade-down">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h2 class="fw-bold text-dark">
                                            Selamat <span id="time-of-day" class="text-primary">Pagi</span>, Admin! 🏸
                                        </h2>
                                        <p class="text-muted fs-5 mb-0" id="current-date">Memuat tanggal...</p>
                                    </div>
                                    <div class="col-md-4 text-md-end d-none d-md-block">
                                        <div class="badge bg-white text-dark shadow-sm p-2 px-3 border-radius-10">
                                            <i class="fas fa-circle text-success me-2 animate-pulse"></i> Sistem Online
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="section-title">Ringkasan Aktivitas</h4>

                    <!-- Stats Grid -->
                    <div class="row g-4 mb-4">
                        <!-- Card 1 -->
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="stat-card">
                                <div class="icon-box bg-gradient-green">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div>
                                    <h3 class="stat-value">480</h3>
                                    <p class="stat-label mb-0">Booking Bulan Ini</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                            <div class="stat-card">
                                <div class="icon-box bg-gradient-blue">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h3 class="stat-value">35</h3>
                                    <p class="stat-label mb-0">Pengguna Aktif</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-xl-4 col-md-12" data-aos="zoom-in" data-aos-delay="300">
                            <div class="stat-card">
                                <div class="icon-box bg-gradient-orange">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div>
                                    <h3 class="stat-value">Ramos Cup</h3>
                                    <p class="stat-label mb-0">Turnamen Terdekat (18 Mei)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Anda bisa menambahkan grafik atau tabel di bawah sini -->

                </div>
            </main>

            <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-out-back',
            once: true
        });

        // Time of day greeting
        function updateGreeting() {
            const hour = new Date().getHours();
            let greeting, color;

            if (hour < 12) { greeting = "Pagi"; color = "#0a8c70"; }
            else if (hour < 15) { greeting = "Siang"; color = "#f59e0b"; }
            else if (hour < 18) { greeting = "Sore"; color = "#d97706"; }
            else { greeting = "Malam"; color = "#064c42"; }

            const el = document.getElementById('time-of-day');
            el.textContent = greeting;
            el.style.color = color;
        }

        // Current date in Indonesian
        function updateCurrentDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            document.getElementById('current-date').textContent = today.toLocaleDateString('id-ID', options);
        }

        updateGreeting();
        updateCurrentDate();
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\PA_10\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>