<div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="">
        <span class="d-none d-lg-block g-6">SIPEBAR</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        


        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <div class="profile-circle-header">
                    <span><?php echo e(strtoupper(substr(Auth::user()->name, 0, 3))); ?></span> <!-- Menggunakan Auth::user() -->
                </div>
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <!-- User Info -->
                <li class="dropdown-header">
                    <h6><?php echo e(Auth::user()->name); ?></h6>
                    <span><?php echo e(Auth::user()->role); ?></span>

                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Profile -->
                




                <li>
                    <hr class="dropdown-divider">
                </li>
                <!-- Settings -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Notifications -->
                
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Help -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <!-- Logout -->
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>
            </ul><!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->
<?php /**PATH C:\laragon\www\smk-management\resources\views/components/header.blade.php ENDPATH**/ ?>