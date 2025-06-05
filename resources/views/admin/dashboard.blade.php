<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Admin Dashboard for Ramos Badminton Center">
    <meta name="author" content="Ramos Badminton">
    <meta name="keywords" content="badminton, sports, admin, dashboard, management">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <title>Admin Dashboard | Ramos Badminton Center</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css') }}" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main">
            @include('admin.layouts.navbar')

            <main class="content">
                <div class="container-fluid p-4">
                    <!-- Hero Greeting -->
                    <div class="card shadow-sm p-4 mb-4" data-aos="fade-up" style="background: linear-gradient(135deg, #f0f4f8, #ffffff); border-left: 5px solid #2a4365;">
                        <h2 class="mb-1 fw-bold text-dark">Selamat <span id="time-of-day">Pagi</span>, Admin!</h2>
                        <p class="text-muted mb-0" id="current-date">Memuat tanggal...</p>
                    </div>

                    <!-- Quick Summary -->
                    <div class="row g-4">
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="card p-3 border-0 shadow-sm">
                                <h5 class="fw-semibold mb-2">
                                    <i class="fas fa-calendar-check text-primary me-2"></i>Jumlah Booking Bulan Ini
                                </h5>
                                <p class="text-muted mb-0">480 Booking telah dilakukan.</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="card p-3 border-0 shadow-sm">
                                <h5 class="fw-semibold mb-2">
                                    <i class="fas fa-users text-success me-2"></i>Pengguna Aktif
                                </h5>
                                <p class="text-muted mb-0">35 Member aktif berpartisipasi.</p>
                            </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="card p-3 border-0 shadow-sm">
                                <h5 class="fw-semibold mb-2">
                                    <i class="fas fa-trophy text-warning me-2"></i>Turnamen Terdekat
                                </h5>
                                <p class="text-muted mb-0">Ramos Cup - 18 Mei 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include('admin.layouts.footer')
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Auto update year
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Time of day greeting
        function updateGreeting() {
            const hour = new Date().getHours();
            let greeting;

            if (hour < 12) greeting = "Pagi";
            else if (hour < 14) greeting = "Siang";
            else if (hour < 18) greeting = "Sore";
            else greeting = "malam";

            document.getElementById('time-of-day').textContent = greeting;
        }

        // Current date
        function updateCurrentDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            document.getElementById('current-date').textContent = today.toLocaleDateString('en-US', options);
        }

        // Initialize greeting and date
        updateGreeting();
        updateCurrentDate();
    </script>
</body>

</html>
