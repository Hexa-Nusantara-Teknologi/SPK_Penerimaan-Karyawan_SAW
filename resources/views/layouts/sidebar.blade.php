<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard-user') }}">
        <div class="sidebar-brand-text mx-3">Rekrutmen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'User')
    <li class="nav-item @if(request()->is('dashboard')) active @endif">
        <a class="nav-link " href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'User')
    <!-- Nav Item - Charts -->
    <li class="nav-item @if(request()->is('data-user')) active @endif">
        <a class="nav-link" href="{{ url('data-user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Saya</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'User')
    <!-- Nav Item - Charts -->
    <li class="nav-item @if(request()->is('pengerjaan-tes')) active @endif">
        <a class="nav-link" href="{{ url('pengerjaan-tes') }}">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Pengerjaan Tes</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')

    <!-- Nav Item - Charts -->
    <li class="nav-item @if(request()->is('master-users')) active @endif">
        <a class="nav-link" href="{{ url('master-users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Users</span></a>
    </li>
    @endif

    @if (auth()->user()->role == 'Admin')

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->is('master-kriteria')) active @endif">
        <a class="nav-link" href="{{ url('master-kriteria') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Master Kriteria</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->is('master-subkriteria')) active @endif">
        <a class="nav-link" href="{{ url('master-subkriteria') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Master Sub Kriteria</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->is('master-soal')) active @endif">
        <a class="nav-link" href="{{ url('master-soal') }}">
            <i class="fas fa-fw fa-question"></i>
            <span>Master Soal</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')

    <!-- Nav Item - Tables -->
    <li class="nav-item @if(request()->is('riwayat-pengisian')) active @endif">
        <a class="nav-link" href="{{ url('riwayat-pengisian') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Pengisian</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'Admin')

    <li class="nav-item @if(request()->is('ranking')) active @endif">
        <a class="nav-link" href="{{ url('ranking') }}">
            <i class="fas fa-fw fa-medal"></i>
            <span>Ranking</span></a>
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