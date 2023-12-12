<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo.jpg') }}" alt="logo" style="width: 50px;">
        </div>
        <div class="sidebar-brand-text mx-3">Lobster Tawar
            @if (Auth::user()->role == 1)
                <sup>adm</sup>
            @elseif (Auth::user()->role == 2)
                <sup>sadm</sup>
            @else
                <sup>usr</sup>
            @endif

        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    @if (Auth::user()->role == 1)
        <li
            class="nav-item {{ request()->is('dashboard/admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @elseif (Auth::user()->role == 2)
        <li
            class="nav-item {{ request()->is('dashboard/superadmin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('superadmin') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @else
        <li
            class="nav-item {{ request()->is('dashboard/user') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endif



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Account</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Account Options:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Tables -->
    @if (Auth::user()->role == 2)
        <li class="nav-item {{ request()->is('dashboard/superadmin/kelola-admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('superadmin_kelola_admin') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Kelola Admin</span></a>
        </li>
    @endif

    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
        @if (Auth::user()->role == 1)
            <li class="nav-item {{ request()->is('dashboard/admin/kelola-pelanggan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_kelola_pelanggan') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Kelola Pelanggan</span></a>
            </li>
        @else
            <li class="nav-item {{ request()->is('dashboard/superadmin/kelola-pelanggan') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('superadmin_kelola_pelanggan') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Pelanggan</span></a>
            </li>
        @endif
    @endif

    @if (Auth::user()->role == 1 || Auth::user()->role == 2)
        @if (Auth::user()->role == 1)
            <li class="nav-item {{ request()->is('dashboard/admin/laporan-pengaduan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_laporan_pengaduan') }}">
                    <i class="fas fa-fw fa-fish"></i>
                    <span>Kelola Pengaduan</span></a>
            </li>
        @else
            <li class="nav-item {{ request()->is('dashboard/superadmin/laporan-pengaduan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('superadmin_laporan_pengaduan') }}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Kelola Pengaduan</span></a>
            </li>
        @endif
    @else
    <li class="nav-item {{ request()->is('dashboard/user/detail-perangkat') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('detail_perangkat') }}">
            <i class="fas fa-fw fa-wifi"></i>
            <span>Detail Perangkat</span></a>
    </li>
        <li class="nav-item {{ request()->is('dashboard/user/laporan-pengaduan') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('laporan_pengaduan') }}">
                <i class="fas fa-fw fa-tasks"></i>
                <span>Laporan Pengaduan</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
