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
</ul>
<?php /**PATH C:\laragon\www\smk-management\resources\views/components/sidebar.blade.php ENDPATH**/ ?>