<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">DASHBOARD</li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="ri ri-dashboard-line"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    <li class="nav-heading">DATA MANAGE MASTER</li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
            <i class="ri ri-user-line"></i>
            <span>DATA USER</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}" href="{{ route('jurusan.index') }}">
            <i class="ri  ri-book-2-line"></i>
            <span>DATA JURUSAN</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('kelas.*') ? 'active' : '' }}" href="{{ route('kelas.index') }}">
            <i class="ri  ri-building-line"></i>
            <span>DATA KELAS</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('mapel.*') ? 'active' : '' }}" href="{{ route('mapel.index') }}">
            <i class="ri  ri-artboard-line"></i>
            <span>DATA MATA PELAJARAN</span>
        </a>
    </li>
</ul>
