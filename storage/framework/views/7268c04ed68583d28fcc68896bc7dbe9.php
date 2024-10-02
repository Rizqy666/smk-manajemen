<?php $__env->startSection('title', 'Halaman Daftar Jadwal Pelajaran Seluruh Kelas'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('jadwalPelajaran.index')); ?>">Daftar Jadwal Pelajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Jadwal Seluruh Kelas</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="<?php echo e(route('jadwalPelajaran.index')); ?>" class="btn btn-secondary btn-sm"> <i
                        class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Jadwal Pelajaran SMK N 1 XXX</h1>
                </div>
                <div class="card-body">
                    <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelasItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2>Kelas <?php echo e($kelasItem->nama_kelas); ?></h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru Pengajar</th>
                                    <th>Jam Pelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $kelasItem->jadwalPelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jadwal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(ucfirst($jadwal->hari)); ?></td>
                                        <td><?php echo e($jadwal->mata_Pelajaran->nama_pelajaran ?? 'tidak ada mata pelajaran'); ?></td>
                                        <td><?php echo e($jadwal->guru->name ?? 'tidak ada guru pengajar'); ?></td>
                                        <td><?php echo e($jadwal->jam_mulai); ?> - <?php echo e($jadwal->jam_selesai); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada jadwal pelajaran untuk kelas ini.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <hr> <!-- Memisahkan setiap tabel dengan garis -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/jadwalPelajaran/show.blade.php ENDPATH**/ ?>