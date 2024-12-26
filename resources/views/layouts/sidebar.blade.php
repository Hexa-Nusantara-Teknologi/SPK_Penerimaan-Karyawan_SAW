<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard-user') }}">
        <div class="sidebar-brand-text mx-3">Rekrutmen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    @if (auth()->user()->role == 'SuperAdmin' || auth()->user()->role == 'User')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'User')
    <!-- Nav Item - Charts -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ url('data-user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Saya</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'User')
    <!-- Nav Item - Charts -->
    <li class="nav-item ">
        <a class="nav-link" href="{{ url('data-user') }}">
            <i class="fas fa-fw fa-pencil-alt"></i>
            <span>Pengerjaan Tes</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'SuperAdmin')

    <!-- Nav Item - Charts -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('data-user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Master Users</span></a>
    </li>
    @endif

    @if (auth()->user()->role == 'SuperAdmin')

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-list"></i>
            <span>Master Kriteria</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'SuperAdmin')

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-question"></i>
            <span>Master Soal</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'SuperAdmin')

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-history"></i>
            <span>Riwayat Pengisian Soal</span></a>
    </li>
    @endif
    @if (auth()->user()->role == 'SuperAdmin')

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
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