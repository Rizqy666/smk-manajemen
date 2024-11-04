<?php $__env->startSection('title', 'Halaman Pendaftaran'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item active">Pendaftaran</li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
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
                <span
                    class="badge text-bg-<?php echo e($pendaftarans->status == 'Pending' ? 'warning' : ($pendaftarans->status == 'Diterima' ? 'success' : 'danger')); ?>"><?php echo e($pendaftarans->status ?? 'Belum ada data'); ?></span>
            </div>
            <div class="card">
                <div class="card-header">Detail Pendaftaran Anda</div>
                <div class="card-body">
                    <div class="container">
                        <h2>Data Pendaftaran Anda</h2>

                        <?php
                            // Mengambil data pendaftaran berdasarkan user_id
                            $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();
                        ?>

                        <?php if($pendaftaran): ?>

                            <table class="table">
                                <tr>
                                    <th>NISN</th>
                                    <td><?php echo e($pendaftaran->nisn); ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td><?php echo e(auth()->user()->name); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($pendaftaran->email); ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td><?php echo e($pendaftaran->nomor_telepon); ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><?php echo e($pendaftaran->tempat_lahir); ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?php echo e($pendaftaran->tanggal_lahir); ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?php echo e($pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td><?php echo e($pendaftaran->agama); ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?php echo e($pendaftaran->alamat); ?></td>
                                </tr>
                                <tr>
                                    <th>Nama Orang Tua</th>
                                    <td><?php echo e($pendaftaran->nama_orang_tua); ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Orang Tua</th>
                                    <td><?php echo e($pendaftaran->alamat_orang_tua); ?></td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan Orang Tua</th>
                                    <td><?php echo e($pendaftaran->pekerjaan_orang_tua); ?></td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td><?php echo e(optional($pendaftaran->jurusan)->nama_jurusan); ?></td>
                                    <!-- Pastikan relasi sudah ada -->
                                </tr>
                                <tr>
                                    <th>Ijazah</th>
                                    <td>
                                        <?php if($pendaftaran->ijazah): ?>
                                            <a href="<?php echo e(asset('storage/' . $pendaftaran->ijazah)); ?>" target="_blank">Lihat
                                                Ijazah</a>
                                        <?php else: ?>
                                            Tidak ada
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Transkrip Nilai</th>
                                    <td>
                                        <?php if($pendaftaran->transkip_nilai): ?>
                                            <a href="<?php echo e(asset('storage/' . $pendaftaran->transkip_nilai)); ?>"
                                                target="_blank">Lihat Transkrip Nilai</a>
                                        <?php else: ?>
                                            Tidak ada
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        <?php else: ?>
                            <p>Data pendaftaran tidak ditemukan. Anda belum mendaftar.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/pendaftaran/data.blade.php ENDPATH**/ ?>