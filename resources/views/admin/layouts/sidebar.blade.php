<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo Ramos" style="height: 50px; width: auto;">
            <span class="align-middle" style="font-family: 'Pacifico', cursive font-weight: 700; font-size: 1.2rem; color: #f4f3f3;">Ramos Badminton Center</span>
        </a>

        <div style="margin: 1rem 0; padding: 0 1rem;">
            <div style="height: 2px; background: linear-gradient(90deg,  rgb(255, 255, 255) 50%, rgba(0, 0, 0, 0.5) 100%); border-radius: 2px;"></div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header" style="font-family:sans-serif; letter-spacing: 1px; color: #ffffff; margin-top: 0.5rem;">
                Pages
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="home" style="color: #ffffff;"></i>
                    <span class="align-middle">Dashboard</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.About.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.About.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="info" style="color: #ffffff;"></i>
                    <span class="align-middle">About</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: #ffffff; opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.Menu.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.Menu.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="grid" style="color: #ffffff;"></i>
                    <span class="align-middle">Fasilitas</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.jadwal_lapangan.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.jadwal_lapangan.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="layout" style="color: #ffffff;"></i>
                    <span class="align-middle">Ketersediaan Lapangan</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.reservasi.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.reservasi.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="calendar" style="color: #ffffff"></i>
                    <span class="align-middle">Reservasi</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.testimonials.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="message-square" style="color: #ffffff;"></i>
                    <span class="align-middle">Testimonial</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.Galeri.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.Galeri.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="image" style="color: #ffffff"></i>
                    <span class="align-middle">Galeri</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background:opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.contact.index') ? 'active' : '' }}" style="margin: 0.3rem 0; border-radius: 8px; overflow: hidden;">
                <a class="sidebar-link" href="{{ route('admin.contact.index') }}" style="position: relative; padding-left: 1.5rem;">
                    <i class="align-middle" data-feather="mail" style="color: #ffffff;"></i>
                    <span class="align-middle">Contact</span>
                    <div class="hover-indicator" style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: opacity: 0; transition: all 0.3s ease;"></div>
                </a>
            </li>
        </ul>

        <div style="margin: 1rem 0; padding: 0 1rem;">
            <div style="height: 2px; background: linear-gradient(90deg,  rgb(255, 255, 255) 50%, rgba(0, 0, 0, 0.5) 100%); border-radius: 2px;"></div>
        </div>
    </div>
</nav>

<style>
    .sidebar {
        background: linear-gradient(180deg, #f8f9fa 0%, #ffffff 100%);
        box-shadow: 4px 0 15px rgba(255, 255, 255, 0.05);
    }

    .sidebar-item {
        transition: all 0.3s ease;
    }

    .sidebar-item:hover {
        background-color: rgba(241, 241, 241, 0.05);
        transform: translateX(5px);
    }

    .sidebar-item.active {
        background-color: rgba(255, 255, 255, 0.1);
        border-left: 4px solid #fafafa;
    }

    .sidebar-item.active .sidebar-link {
        font-weight: 600;
    }

    .sidebar-item.active .hover-indicator {
        opacity: 1 !important;
    }

    .sidebar-link {
        transition: all 0.2s ease;
        color: #1d3557;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar-link:hover {
        color: #ffffff;
    }

    .sidebar-link:hover .hover-indicator {
        opacity: 0.7 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarItems = document.querySelectorAll('.sidebar-item');

        sidebarItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });
    });
</script>
