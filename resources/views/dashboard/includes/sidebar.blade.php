
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">CRM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('profile.index') }}">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('client.index') }}">
            <i class="fas fa-id-card"></i>
            <span>Clients</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('project.index') }}">
            <i class="fas fa-project-diagram"></i>
            <span>Projects</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('file.index') }}">
            <i class="fas fa-file-alt"></i>
            <span>Files</span>
        </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

<!-- End of Sidebar -->
