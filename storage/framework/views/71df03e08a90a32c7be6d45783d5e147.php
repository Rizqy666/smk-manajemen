<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $__env->yieldContent('title'); ?> - Sistem Informasi Pengelolaan Data</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Favicons -->
    <link href="<?php echo e(asset('assets/img/favicon.png')); ?>" rel="icon">
    <link href="<?php echo e(asset('assets/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/quill/quill.snow.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/quill/quill.bubble.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.0/sweetalert2.min.css">

    <?php echo $__env->yieldPushContent('css'); ?>
    <style>
        .sidebar-nav {
            width: 250px;
            background-color: #ffffff;
            /* Light background color for the sidebar */
            /* Add other styles for the sidebar as needed */
        }

        .nav-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin: 0;
        }

        /* Styling for nav-links */
        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            padding: 10px;
            color: #000000;
            /* Default color for text and icons */
            text-decoration: none;
            background-color: #ffffff;
            /* White background for inactive links */
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
            /* Optional: rounded corners for better look */
            margin: 5px 0;
            /* Optional: space between items */
        }

        /* Styling for nav-links when active */
        .sidebar-nav .nav-link.active {
            background-color: #007bff;
            /* Background color for active link */
            color: #fff;
            /* Color for text when active */
        }

        /* Styling for icons inside nav-links */
        .sidebar-nav .nav-link i {
            color: #4d4b4b;
            /* Default color for icons */
            margin-right: 10px;
            /* Space between icon and text */
        }

        /* Styling for icons when nav-link is active */
        .sidebar-nav .nav-link.active i {
            color: #fff;
            /* Color for icons when active */
        }

        .fixed-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            z-index: 1000;
        }

        .profile-circle {
            width: 100px;
            height: 100px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            color: rgb(255, 255, 255);
            font-weight: bold;
        }

        .profile-circle-header {
            width: 40px;
            height: 40px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: white;
            font-weight: bold;
        }

        #example {
            width: 100%;
            border-collapse: collapse;
        }

        #example th,
        #example td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #example th {
            background-color: #f4f4f4;
            text-align: left;
        }

        #example tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php if ($__env->exists('components.header')) echo $__env->make('components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <?php if ($__env->exists('components.sidebar')) echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><?php echo $__env->yieldContent('title'); ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <?php echo $__env->yieldContent('breadcrumb'); ?>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <?php if(session('access_denied')): ?>
                    <script>
                        window.onload = function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Akses Ditolak',
                                text: 'Anda tidak memiliki izin untuk mengakses halaman ini.',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.history.back();
                                }
                            });
                        };
                    </script>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer fixed-footer">
        <?php if ($__env->exists('components.footer')) echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo e(asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/quill/quill.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/tinymce/tinymce.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/php-email-form/validate.js')); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.0/sweetalert2.all.min.js"></script>

    <?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\smk-management\resources\views/layouts/master.blade.php ENDPATH**/ ?>