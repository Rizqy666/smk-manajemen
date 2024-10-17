<?php $__env->startSection('title', 'Halaman Daftar Siswa'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Daftar Siswa</li>
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
            <div class="card">
                <div class="card-header">
                    Daftar Siswa
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tempat. tanggal lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $siswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->userDetail->kelas_id ?? 'Tidak ada kelas'); ?></td>
                                    <td><?php echo e($item->userDetail->tempat_lahir ?? 'Tidak ada'); ?> -
                                        <?php echo e($item->userDetail->tanggal_lahir ?? 'Tidak ada'); ?></td>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/siswa/index.blade.php ENDPATH**/ ?>