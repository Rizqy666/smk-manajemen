@extends('layouts.master')
@section('title', 'Halaman Tambah Jadwal Pelajaran')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('jadwalPelajaran.index') }}">Daftar Jadwal Pelajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Jadwal Pelajaran</li>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: `
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    `,
                    });
                </script>
            @endif
            <div class="card">
                <div class="card-header">
                    Tambah Jadwal Pelajaran
                </div>
                <form action="{{ route('jadwalPelajaran.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="mata_pelajaran_id" class="form-label">Mata Pelajaran</label>
                            <select name="mata_pelajaran_id" id="mata_pelajaran_id" class="form-control select2">
                                <option disabled {{ old('mata_pelajaran_id') ? '' : 'selected' }}>Pilih mata pelajaran
                                </option>
                                @foreach ($mataPelajaran as $mata)
                                    <option value="{{ $mata->id }}"
                                        {{ old('mata_pelajaran_id') == $mata->id ? 'selected' : '' }}>
                                        {{ $mata->nama_pelajaran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="guru_pengajar" class="form-label">Guru</label>
                            <select name="guru_pengajar" id="guru_pengajar" class="form-control select2">
                                <option disabled {{ old('guru_pengajar') ? '' : 'selected' }}>Pilih guru</option>
                                @foreach ($gurus as $g)
                                    <option value="{{ $g->id }}"
                                        {{ old('guru_pengajar') == $g->id ? 'selected' : '' }}>
                                        {{ $g->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control select2">
                                <option disabled {{ old('kelas_id') ? '' : 'selected' }}>Pilih kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan_id" class="form-label">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control select2">
                                <option disabled {{ old('jurusan_id') ? '' : 'selected' }}>Pilih jurusan</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"
                                        {{ old('jurusan_id') == $j->id ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran_id" class="form-label">Tahun Ajaran</label>
                            <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control select2">
                                <option disabled {{ old('tahun_ajaran_id') ? '' : 'selected' }}>Pilih tahun ajaran
                                </option>
                                @foreach ($tahunAjaran as $ta)
                                    <option value="{{ $ta->id }}"
                                        {{ old('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                                        {{ $ta->tahun_awal }} - {{ $ta->tahun_akhir }} - ({{ $ta->semester }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" id="jam_mulai" class="form-control"
                                        value="{{ old('jam_mulai') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" id="jam_selesai" class="form-control"
                                        value="{{ old('jam_selesai') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Jam Selesai</label>
                            <select name="hari" id="hari" class="form-control">
                                <option selected disabled>Pilih hari</option>
                                <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>Senin</option>
                                <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ old('hari') == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('jadwalPelajaran.index') }}" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
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
@endpush
