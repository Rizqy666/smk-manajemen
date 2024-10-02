<?php $__env->startSection('title', 'Halaman Edit Tahun Ajaran'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('tahunAjaran.index')); ?>">Daftar Tahun Ajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Tahun Ajaran</li>
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
                    Tahun Ajaran</div>
                <form action="<?php echo e(route('tahunAjaran.update', $tahunAjaran->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_awal" class="form-label">Tahun Awal</label>
                                    <input type="number" class="form-control" name="tahun_awal"
                                        value="<?php echo e(old('tahun_awal', $tahunAjaran->tahun_awal ?? '')); ?>" id="tahun_awal"
                                        min="1900" max="2099" oninput="validateYear(this)" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_akhir" class="form-label">Tahun Akhir</label>
                                    <input type="number" class="form-control" name="tahun_akhir"
                                        value="<?php echo e(old('tahun_akhir', $tahunAjaran->tahun_akhir ?? '')); ?>" id="tahun_akhir"
                                        min="1900" max="2099" oninput="validateYear(this)" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select name="semester" id="semester" class="form-control" required>
                                <option disabled
                                    <?php echo e(is_null(old('semester', $tahunAjaran->semester ?? null)) ? 'selected' : ''); ?>>
                                    Pilih semester
                                </option>
                                <option value="ganjil"
                                    <?php echo e(old('semester', $tahunAjaran->semester ?? '') == 'ganjil' ? 'selected' : ''); ?>>
                                    Ganjil
                                </option>
                                <option value="genap"
                                    <?php echo e(old('semester', $tahunAjaran->semester ?? '') == 'genap' ? 'selected' : ''); ?>>
                                    Genap
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('tahunAjaran.index')); ?>" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i>
                            Perbaharui</button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/tahunajaran/edit.blade.php ENDPATH**/ ?>