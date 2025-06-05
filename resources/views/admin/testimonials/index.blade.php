<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Testimonial - Admin</title>

    <link href="{{ URL::asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .custom-pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .custom-pagination li {
            margin: 0 5px;
        }

        .custom-pagination a,
        .custom-pagination span {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-pagination a:hover {
            background-color: #f0f0f0;
        }

        .custom-pagination .active span {
            background-color: #4e73df;
            color: white;
            border-color: #4e73df;
        }

        .custom-pagination .disabled span {
            color: #999;
            border-color: #ccc;
            cursor: not-allowed;
        }

        .custom-pagination .disabled span:hover {
            background-color: transparent;
        }

        /* New Styles for Enhanced Cards */
        .testimonial-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            position: relative;
            overflow: hidden;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .testimonial-card::before {
            content: """;
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            top: 20px;
            left: 25px;
            font-size: 60px;
            color: rgba(78, 115, 223, 0.1);
            z-index: 0;
        }

        .testimonial-content {
            position: relative;
            z-index: 1;
            padding: 30px;
        }

        .testimonial-text {
            font-size: 16px;
            line-height: 1.7;
            color: #555;
            margin-bottom: 25px;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .author-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #4e73df;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .author-info {
            margin-left: 15px;
        }

        .author-name {
            font-weight: 600;
            margin-bottom: 0;
            color: #333;
        }

        .author-title {
            color: #6c757d;
            font-size: 14px;
        }

        .testimonial-rating {
            color: #ffc107;
            margin-bottom: 15px;
        }

        .btn-delete {
            margin-top: 15px;
            transition: all 0.3s;
        }

        .btn-delete:hover {
            transform: scale(1.05);
        }

        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            width: 50px;
            height: 3px;
            background: #4e73df;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>

<body>
<div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main">
         @include('admin.layouts.navbar')

            <main class="content">
                  <div class="container-fluid p-0">
        <div class="container-fluid pt-4 px-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="text-center">
                        <h4 class="section-title ff-secondary text-center text-primary fw-normal">Testimonials</h4>
                        <h1 class="mb-5 fw-bold">Manage Testimonials</h1>
                    </div>
                    <div class="row g-4">
                        @if(count($testimonials) > 0)
                            @foreach($testimonials as $testimonial)
                                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                    <div class="testimonial-card">
                                        <div class="testimonial-content">
                                            <p class="testimonial-text">{{ $testimonial->message }}</p>
                                            <div class="testimonial-author">
                                                <img class="author-img" src="{{ asset('img/biodata.PNG') }}" alt="{{ $testimonial->name }}">
                                                <div class="author-info">
                                                    <h5 class="author-name">{{ $testimonial->name }}</h5>
                                                    <span class="author-title">{{ $testimonial->subject }}</span>
                                                </div>
                                            </div>

                                            <!-- Delete button -->
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-delete"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                                    <i class="fas fa-trash-alt me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i> No testimonials found.
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Custom Pagination Links -->
                    <div class="custom-pagination">
                        @if($testimonials instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <ul>
                                @if ($testimonials->onFirstPage())
                                    <li class="disabled"><span><i class="fas fa-chevron-left me-1"></i> Previous</span></li>
                                @else
                                    <li><a href="{{ $testimonials->previousPageUrl() }}" rel="prev"><i class="fas fa-chevron-left me-1"></i> Previous</a></li>
                                @endif

                                @foreach ($testimonials->getUrlRange(max($testimonials->currentPage() - 2, 1), min($testimonials->currentPage() + 2, $testimonials->lastPage())) as $page => $url)
                                    @if ($page == $testimonials->currentPage())
                                        <li class="active"><span>{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                @if ($testimonials->hasMorePages())
                                    <li><a href="{{ $testimonials->nextPageUrl() }}" rel="next">Next <i class="fas fa-chevron-right ms-1"></i></a></li>
                                @else
                                    <li class="disabled"><span>Next <i class="fas fa-chevron-right ms-1"></i></span></li>
                                @endif
                            </ul>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

            <footer class="footer mt-auto py-3 border-top">
                <div class="container-fluid">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="mb-2 mb-md-0">
                            <span class="text-muted">© <span id="current-year"></span> Badminton Ramos Center</span>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-social-icons">
                                <a href="https://www.facebook.com/profile.php?id=61572922522102" class="text-decoration-none mx-2 text-primary">
                                    <i class="align-middle" data-feather="facebook"></i>
                                </a>
                                <a href="https://www.instagram.com/ramos_badmintoncenter/?utm_source=ig_web_button_share_sheet" class="text-decoration-none mx-2 text-danger">
                                    <i class="align-middle" data-feather="instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{URL::asset('js/app.js')}}"></script>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace()
    </script>
</body>

</html>
