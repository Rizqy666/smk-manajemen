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
                <div class="card-header">Detail Profile</div>
                <div class="card-body">
                    <form action="<?php echo e(route('pendaftaran.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class='mb-3'>
                            <label class="form-label" for="nisn">NISN</label>
                            <input type="number" name="nisn" class="form-control" id="nisn"
                                value="<?php echo e(old('nisn', $pendaftarans->nisn ?? '')); ?>" maxlength="10">
                            <?php $__errorArgs = ['nisn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="name" name="name" class="form-control" id="name"
                                value="<?php echo e(old('name', auth()->user()->name)); ?>" readonly>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="sendVerification('email')">Verifikasi</button>
                            </div>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                            <div class="input-group">
                                <input type="number" name="nomor_telepon" class="form-control" id="nomor_telepon"
                                    value="<?php echo e(old('nomor_telepon', $userDetail->nomor_telepon ?? '')); ?>" required
                                    maxlength="15">
                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="sendVerification('nomor_telepon')">Verifikasi</button>
                            </div>
                            <?php $__errorArgs = ['nomor_telepon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                value="<?php echo e(old('tempat_lahir', $userDetail->tempat_lahir ?? '')); ?>" required>
                            <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                value="<?php echo e(old('tanggal_lahir', $userDetail->tanggal_lahir ?? '')); ?>" required>
                            <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control"id="jenis_kelamin" required>
                                <option value="">Pilih</option>
                                <option value="L"
                                    <?php echo e(old('jenis_kelamin', $userDetail->jenis_kelamin ?? '') == 'L' ? 'selected' : ''); ?>>
                                    Laki-laki</option>
                                <option value="P"
                                    <?php echo e(old('jenis_kelamin', $userDetail->jenis_kelamin ?? '') == 'P' ? 'selected' : ''); ?>>
                                    Perempuan</option>
                            </select>
                            <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Islam"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Islam' ? 'selected' : ''); ?>>Islam
                                </option>
                                <option value="Kristen"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Kristen' ? 'selected' : ''); ?>>Kristen
                                </option>
                                <option value="Katolik"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Katolik' ? 'selected' : ''); ?>>Katolik
                                </option>
                                <option value="Hindu"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Hindu' ? 'selected' : ''); ?>>Hindu
                                </option>
                                <option value="Buddha"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Buddha' ? 'selected' : ''); ?>>Buddha
                                </option>
                                <option value="Konghucu"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Konghucu' ? 'selected' : ''); ?>>Konghucu
                                </option>
                                <option value="Lainnya"
                                    <?php echo e(old('agama', $userDetail->agama ?? '') == 'Lainnya' ? 'selected' : ''); ?>>Lainnya
                                </option>
                            </select>
                            <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"><?php echo e(old('alamat', $userDetail->alamat ?? '')); ?></textarea>
                            <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="nama_orang_tua">Nama Orang Tua</label>
                            <input type="text" name="nama_orang_tua" class="form-control" id="nama_orang_tua"
                                value="<?php echo e(old('nama_orang_tua', $pendaftarans->nama_orang_tua ?? '')); ?>" required>
                            <?php $__errorArgs = ['nama_orang_tua'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="alamat_orang_tua">Alamat Orang Tua</label>
                            <textarea name="alamat_orang_tua" id="alamat_orang_tua" class="form-control" cols="30" rows="5"><?php echo e(old('alamat_orang_tua', $pendaftarans->alamat_orang_tua ?? '')); ?></textarea>
                            <?php $__errorArgs = ['alamat_orang_tua'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class='mb-3'>
                            <label class="form-label" for="pekerjaan_orang_tua">Pekerjaan Orang Tua</label>
                            <input type="text" name="pekerjaan_orang_tua" class="form-control"
                                id="pekerjaan_orang_tua"
                                value="<?php echo e(old('pekerjaan_orang_tua', $pendaftarans->pekerjaan_orang_tua ?? '')); ?>"
                                required>
                            <?php $__errorArgs = ['pekerjaan_orang_tua'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan_id" class="form-label">Minat Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control select2">
                                <option value="" disabled selected>-- Pilih Minat Jurusan --</option>
                                <?php $__currentLoopData = $jurusans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e(old('jurusan_id', $pendaftarans->jurusan_id ?? '') == $item->id ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama_jurusan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['jurusan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="ijazah" class="form-label">Upload Ijazah</label>
                            <?php if(isset($pendaftarans->ijazah) && $pendaftarans->ijazah): ?>
                                <div>
                                    <a href="<?php echo e(asset('storage/' . $pendaftarans->ijazah)); ?>" target="_blank">
                                        Lihat Ijazah
                                    </a>
                                </div>
                            <?php else: ?>
                                <input type="file" name="ijazah" id="ijazah" class="form-control" required>
                            <?php endif; ?>
                            <?php $__errorArgs = ['ijazah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="transkip_nilai" class="form-label">Upload Transkrip Nilai</label>
                            <?php if(isset($pendaftarans->transkip_nilai) && $pendaftarans->transkip_nilai): ?>
                                <div>
                                    <a href="<?php echo e(asset('storage/' . $pendaftarans->transkip_nilai)); ?>" target="_blank">
                                        Lihat Transkrip Nilai
                                    </a>
                                </div>
                            <?php else: ?>
                                <input type="file" name="transkip_nilai" id="transkip_nilai" class="form-control"
                                    required>
                            <?php endif; ?>
                            <?php $__errorArgs = ['transkip_nilai'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i>
                                Simpan</button>
                        </div>
                    </form>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/pendaftaran/index.blade.php ENDPATH**/ ?>