@extends('layouts.master')
@section('title', 'Halaman Tambah Mata Pelajaran')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Daftar Mata Pelajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Mata Pelajaran</li>
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
          {{ $error }}
        @endforeach
`,
                    });
                </script>
            @endif
            <div class="card">
                <div class="card-header">
                    Tambah Mata Pelajaran
                </div>
                <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_pelajaran" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" name="nama_pelajaran"
                                value="{{ old('nama_pelajaran') }}" id="nama_pelajaran" required>
                        </div>
                        <div class="mb-3">
                            <label for="guru_pengajar" class="form-label">Wali Kelas</label>
                            <select name="guru_pengajar" id="guru_pengajar" class="form-control select2">
                                <option value="" disabled selected>-- Pilih Wali Kelas --</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mapel.index') }}" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Simpan</button>
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
@endpush
