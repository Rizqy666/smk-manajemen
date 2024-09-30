<ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-heading">DASHBOARD</li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">
            <i class="ri ri-dashboard-line"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    <li class="nav-heading">DATA MANAGE MASTER</li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('user.*') ? 'active' : ''); ?>" href="<?php echo e(route('user.index')); ?>">
            <i class="ri ri-user-line"></i>
            <span>DATA USER</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('jurusan.*') ? 'active' : ''); ?>" href="<?php echo e(route('jurusan.index')); ?>">
            <i class="ri  ri-book-2-line"></i>
            <span>DATA JURUSAN</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('kelas.*') ? 'active' : ''); ?>" href="<?php echo e(route('kelas.index')); ?>">
            <i class="ri  ri-building-line"></i>
            <span>DATA KELAS</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(request()->routeIs('mapel.*') ? 'active' : ''); ?>" href="<?php echo e(route('mapel.index')); ?>">
            <i class="ri  ri-artboard-line"></i>
            <span>DATA MATA PELAJARAN</span>
        </a>
    </li>
</ul>
<?php /**PATH C:\laragon\www\smk-management\resources\views/components/sidebar.blade.php ENDPATH**/ ?>