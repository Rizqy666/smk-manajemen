<?php $__env->startSection('title', 'Halaman Edit User'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('user.index')); ?>">Daftar User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    Edit User</div>
                <form action="<?php echo e(route('user.update', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" class="form-control" value="<?php echo e(old('name', $user->name)); ?>" name="name"
                                id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>"
                                name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option disabled>Pilih Role Untuk Login</option>
                                <option value="admin" <?php echo e(old('role', $user->role) == 'admin' ? 'selected' : ''); ?>>Admin
                                </option>
                                <option value="siswa" <?php echo e(old('role', $user->role) == 'siswa' ? 'selected' : ''); ?>>Siswa
                                </option>
                                <option value="staff" <?php echo e(old('role', $user->role) == 'staff' ? 'selected' : ''); ?>>Staff
                                </option>
                                <option value="guru" <?php echo e(old('role', $user->role) == 'guru' ? 'selected' : ''); ?>>Guru
                                </option>
                            </select>
                        </div>
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('user.index')); ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Perbaharui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/user/edit.blade.php ENDPATH**/ ?>