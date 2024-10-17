<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">DASHBOARD</li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="ri ri-dashboard-line"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <!-- Check if the user has 'admin' or 'staff' role -->
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff')
        <li class="nav-heading">DATA MANAGE MASTER</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <i class="ri ri-user-line"></i>
                <span>DATA USER</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('jurusan.*') ? 'active' : '' }}"
                href="{{ route('jurusan.index') }}">
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
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('tahunAjaran.*') ? 'active' : '' }}"
                href="{{ route('tahunAjaran.index') }}">
                <i class="ri  ri-calendar-2-line"></i>
                <span>DATA TAHUN AJARAN</span>
            </a>
        </li>
    @endif

    <!-- Check if the user has 'admin', 'staff', or 'guru' role -->
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff' || auth()->user()->role == 'guru')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('jadwalPelajaran.*') ? 'active' : '' }}"
                href="{{ route('jadwalPelajaran.index') }}">
                <i class="ri  ri-alarm-line"></i>
                <span>DATA JADWAL PELAJARAN</span>
            </a>
        </li>
    @endif

    <!-- Check if the user has 'siswa' role -->
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'staff' || auth()->user()->role == 'guru')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.*') ? 'active' : '' }}" href="{{ route('siswa.index') }}">
                <i class="ri  ri-alarm-line"></i>
                <span>DATA SISWA</span>
            </a>
        </li>
    @endif
    @if (auth()->user()->role == 'siswa')
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('pendaftaran.*') ? 'active' : '' }}"
                href="{{ route('pendaftaran.index') }}">
                <i class="ri  ri-alarm-line"></i>
                <span>PENDAFTARAN </span>
            </a>
        </li>
    @endif
</ul>
