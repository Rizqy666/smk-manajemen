<?php $__env->startSection('title', 'Halaman Edit Jadwal Pelajaran'); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('jadwalPelajaran.index')); ?>">Daftar Kelass</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Jadwal Pelajarans</li>
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
                    Edit Jadwal Pelajaran</div>
                <form action="<?php echo e(route('jadwalPelajaran.update', $jadwalPelajaran->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control select2">
                                <option disabled
                                    <?php echo e(old('mata_pelajaran_id', $jadwalPelajaran->mata_pelajaran_id) ? '' : 'selected'); ?>>
                                    Pilih mata pelajaran
                                </option>
                                <?php $__currentLoopData = $mataPelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mata->id); ?>"
                                        <?php echo e(old('mata_pelajaran_id', $jadwalPelajaran->mata_pelajaran_id) == $mata->id ? 'selected' : ''); ?>>
                                        <?php echo e($mata->nama_pelajaran); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="guru_pengajar" class="form-label">Guru</label>
                            <select name="guru_pengajar" id="guru_pengajar" class="form-control select2">
                                <option disabled
                                    <?php echo e(old('guru_pengajar', $jadwalPelajaran->guru_pengajar) ? '' : 'selected'); ?>>Pilih guru
                                </option>
                                <?php $__currentLoopData = $gurus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($g->id); ?>"
                                        <?php echo e(old('guru_pengajar', $jadwalPelajaran->guru_pengajar) == $g->id ? 'selected' : ''); ?>>
                                        <?php echo e($g->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control select2">
                                <option disabled <?php echo e(old('kelas_id', $jadwalPelajaran->kelas_id) ? '' : 'selected'); ?>>Pilih
                                    kelas</option>
                                <?php $__currentLoopData = $kelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($k->id); ?>"
                                        <?php echo e(old('kelas_id', $jadwalPelajaran->kelas_id) == $k->id ? 'selected' : ''); ?>>
                                        <?php echo e($k->nama_kelas); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control select2">
                                <option disabled <?php echo e(old('jurusan_id', $jadwalPelajaran->jurusan_id) ? '' : 'selected'); ?>>
                                    Pilih jurusan</option>
                                <?php $__currentLoopData = $jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($j->id); ?>"
                                        <?php echo e(old('jurusan_id', $jadwalPelajaran->jurusan_id) == $j->id ? 'selected' : ''); ?>>
                                        <?php echo e($j->nama_jurusan); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran_id" class="form-label">Tahun Ajaran</label>
                            <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control select2">
                                <option disabled
                                    <?php echo e(old('tahun_ajaran_id', $jadwalPelajaran->tahun_ajaran_id) ? '' : 'selected'); ?>>Pilih
                                    tahun ajaran
                                </option>
                                <?php $__currentLoopData = $tahunAjaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($ta->id); ?>"
                                        <?php echo e(old('tahun_ajaran_id', $jadwalPelajaran->tahun_ajaran_id) == $ta->id ? 'selected' : ''); ?>>
                                        <?php echo e($ta->tahun_awal); ?> - <?php echo e($ta->tahun_akhir); ?> - (<?php echo e($ta->semester); ?>)
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                                        value="<?php echo e(old('jam_mulai', $jadwalPelajaran->jam_mulai)); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control"
                                        value="<?php echo e(old('jam_selesai', $jadwalPelajaran->jam_selesai)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <option selected disabled>Pilih hari</option>
                                <option value="senin"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'senin' ? 'selected' : ''); ?>>Senin</option>
                                <option value="selasa"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'selasa' ? 'selected' : ''); ?>>Selasa</option>
                                <option value="rabu"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'rabu' ? 'selected' : ''); ?>>Rabu</option>
                                <option value="kamis"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'kamis' ? 'selected' : ''); ?>>Kamis</option>
                                <option value="jumat"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'jumat' ? 'selected' : ''); ?>>Jumat</option>
                                <option value="sabtu"
                                    <?php echo e(old('hari', $jadwalPelajaran->hari) == 'sabtu' ? 'selected' : ''); ?>>Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('jadwalPelajaran.index')); ?>" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i>
                            Simpan</button>
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
            $('#mata_pelajaran_id').change(function() {
                var mataPelajaranId = $(this).val();
                $.ajax({
                    url: '/get-guru-pengajar/' + mataPelajaranId,
                    type: 'GET',
                    success: function(response) {
                        $('#guru_pengajar').empty();
                        $.each(response.all_gurus, function(key, guru) {
                            if (guru.id == response.guru_pengajar.id) {
                                $('#guru_pengajar').append('<option value="' + guru.id +
                                    '" selected>' + guru.name + '</option>');
                            } else {
                                $('#guru_pengajar').append('<option value="' + guru.id +
                                    '">' + guru.name + '</option>');
                            }
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
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

        function validateYear(input) {
            if (input.value.length > 4) {
                input.value = input.value.slice(0, 4);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\smk-management\resources\views/jadwalpelajaran/edit.blade.php ENDPATH**/ ?>