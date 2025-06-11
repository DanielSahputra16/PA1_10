<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin & Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Daftar Reservasi - Admin</title>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/yss.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main">
            @include('admin.layouts.navbar')
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-white rounded-3 shadow-sm p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h4 class="mb-0 fw-bold text-primary">Daftar Reservasi Lapangan</h4>
                                        <div class="d-flex gap-2">
                                        </div>
                                    </div>

                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <!-- Helper function untuk warna badge status -->
                                    @php
                                    if (!function_exists('getStatusBadgeClass')) {
                                    function getStatusBadgeClass($status)
                                    {
                                    switch (strtolower($status)) {
                                    case 'dikonfirmasi':
                                    case 'confirmed':
                                    return 'bg-success bg-opacity-10 text-success';
                                    case 'pending':
                                    case 'menunggu pembayaran':
                                    return 'bg-warning bg-opacity-10 text-warning';
                                    case 'dibatalkan':
                                    case 'cancelled':
                                    return 'bg-danger bg-opacity-10 text-danger';
                                    case 'selesai':
                                    case 'completed':
                                    return 'bg-info bg-opacity-10 text-info';
                                    default:
                                    return 'bg-secondary bg-opacity-10 text-secondary';
                                    }
                                    }
                                    }
                                    @endphp

                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="py-3 px-4 text-center">No</th>
                                                    <th scope="col" class="py-3 px-4">Nama</th>
                                                    <th scope="col" class="py-3 px-4">No. HP</th>
                                                    <th scope="col" class="py-3 px-4">Lapangan</th>
                                                    <th scope="col" class="py-3 px-4">Tanggal Mulai</th>
                                                    <th scope="col" class="py-3 px-4">Tanggal Selesai</th>
                                                    <th scope="col" class="py-3 px-4 text-center">Status</th>
                                                    <th scope="col" class="py-3 px-4">Gambar</th>
                                                    <th scope="col" class="py-3 px-4 text-end">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($reservasis as $reservasi)
                                                <tr class="border-bottom">
                                                    <td class="px-4 py-3 text-center fw-semibold">
                                                        {{ $loop->iteration }}</td>
                                                    <td class="px-4 py-3 fw-semibold">{{ $reservasi->nama }}</td>
                                                    <td class="px-4 py-3">{{ $reservasi->no_hp }}</td>
                                                    <td class="px-4 py-3">{{ $reservasi->lapangan->nama ?? 'N/A' }}</td>
                                                    <td class="px-4 py-3">
                                                        <i class="far fa-calendar-alt me-2 text-primary"></i>
                                                        {{ \Carbon\Carbon::parse($reservasi->waktu_mulai)->isoFormat('D MMM YYYY, HH:mm') }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <i class="far fa-calendar-alt me-2 text-primary"></i>
                                                        {{ \Carbon\Carbon::parse($reservasi->waktu_selesai)->isoFormat('D MMM YYYY, HH:mm') }}
                                                    </td>
                                                    <td class="px-4 py-3 text-center">
                                                        <span
                                                            class="badge {{ getStatusBadgeClass($reservasi->status) }}">{{ $reservasi->status }}</span>
                                                    </td>
                                                    <td>
                                                        @if($reservasi->gambar)
                                                        <img src="{{ asset('storage/gambar/' . $reservasi->gambar) }}"
                                                            alt="Gambar Reservasi" width="50">
                                                        @else
                                                        Tidak ada gambar
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-3 text-end">
                                                        <div class="d-flex justify-content-end gap-2">
                                                            <a href="{{ route('admin.reservasi.show', $reservasi->id) }}"
                                                                class="btn btn-sm btn-outline-info rounded-circle p-2"
                                                                title="Detail" data-bs-toggle="tooltip">
                                                                <i class="fas fa-eye fa-sm"></i>
                                                            </a>
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-sm btn-outline-primary rounded-circle p-2 dropdown-toggle"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false" title="Ubah Status"
                                                                    data-bs-toggle="tooltip">
                                                                    <i class="fas fa-exchange-alt fa-sm"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <form
                                                                        action="{{ route('admin.reservasi.updateStatus', $reservasi->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <li>
                                                                            <button type="submit" name="status"
                                                                                value="pending"
                                                                                class="dropdown-item @if($reservasi->status == 'pending') active @endif">
                                                                                <i
                                                                                    class="fas fa-clock me-2 text-warning"></i>Pending
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button type="submit" name="status"
                                                                                value="confirmed"
                                                                                class="dropdown-item @if($reservasi->status == 'confirmed') active @endif">
                                                                                <i
                                                                                    class="fas fa-check me-2 text-success"></i>Dikonfirmasi
                                                                            </button>
                                                                        </li>
                                                                        <li>
                                                                            <button type="submit" name="status"
                                                                                value="cancelled"
                                                                                class="dropdown-item @if($reservasi->status == 'cancelled') active @endif">
                                                                                <i
                                                                                    class="fas fa-times me-2 text-danger"></i>Dibatalkan
                                                                            </button>
                                                                        </li>
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.reservasi.destroy', $reservasi->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger rounded-circle p-2"
                                                                    title="Hapus" data-bs-toggle="tooltip">
                                                                    <i class="fas fa-trash-alt fa-sm"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-4 text-muted">
                                                        <i class="fas fa-calendar-times me-2"></i>Tidak ada data reservasi
                                                        ditemukan
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include('admin.layouts.footer')
        </div>
    </div>

    <script src="{{URL::asset('js/app.js')}}"></script>
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>
</body>

</html>
