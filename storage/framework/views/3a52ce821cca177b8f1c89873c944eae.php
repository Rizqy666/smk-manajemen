<?php $__env->startSection('title', 'Halaman Daftar Kelas'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Daftar Kelas</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: "<?php echo e(session('success')); ?>",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            <?php endif; ?>
            <div class="d-flex justify-content-end mb-3">
                <a href="<?php echo e(route('kelas.create')); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    Daftar Kelas
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->nama_kelas); ?></td>
                                    <td><?php echo e($item->guru->nama_guru ?? 'Belum ada wali kelas'); ?></td>
                                    <td>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md">
                                            <a href="<?php echo e(route('kelas.edit', $item->id)); ?>"
                                                class="btn btn-sm text-white bg-warning"><i class="ri ri-pencil-line"></i>
                                                Edit</a>
                                            <form id="delete-form-<?php echo e($item->id); ?>"
                                                action="<?php echo e(route('kelas.destroy', $item->id)); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                            </form>
                                            <button class="btn btn-sm text-white bg-danger"
                                                onclick="confirmDelete(<?php echo e($item->id); ?>)"><i
                                                    class="ri ri-delete-bin-5-line"></i> Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                autoWidth: true,
                responsive: true,
                columnDefs: [{
                        width: "2%",
                        targets: 0
                    },
                    {
                        width: "35%",
                        targets: 1
                    },
                    {
                        width: "40%",
                        targets: 2
                    }
                ]
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/kelas/index.blade.php ENDPATH**/ ?>