<?php $__env->startSection('title', 'Halaman Tambah Jurusan'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('jurusan.index')); ?>">Daftar Jurusan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Jurusan</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if($errors->any()): ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: `
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    `,
                    });
                </script>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    Tambah Jurusan
                </div>
                <form action="<?php echo e(route('jurusan.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" name="nama_jurusan" id="nama_jurusan"
                                value="<?php echo e(old('nama_jurusan')); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ketua_jurusan_id" class="form-label">Ketua Jurusan</label>
                            <select name="ketua_jurusan_id" id="ketua_jurusan_id" class="form-control select2">
                                <option value="" disabled selected>-- Pilih Ketua Jurusan --</option>
                                <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($guru->id); ?>"><?php echo e($guru->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('jurusan.index')); ?>" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: function() {
                    return $(this).data('placeholder');
                },
                allowClear: true
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/jurusan/create.blade.php ENDPATH**/ ?>