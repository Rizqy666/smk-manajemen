@extends('layouts.master')
@section('title', 'Halaman Edit Mata Pelajaran')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Daftar Mata Pelajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Mata Pelajaran</li>
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
                    Mata Pelajaran</div>
                <form action="{{ route('mapel.update', $mataPelajaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nama_pelajaran" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control"
                                value="{{ old('mataPelajaran', $mataPelajaran->nama_pelajaran) }}" name="nama_pelajaran"
                                id="nama_pelajaran" required>
                            @error('nama_pelajaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="guru_pengajar" class="form-label">Guru Pengajar Kelas</label>
                            <select name="guru_pengajar" id="guru_pengajar" class="form-control select2">
                                <option value="" disabled>-- guru pengajar kelas --</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}"
                                        {{ $guru->id == old('guru_pengajar', $mataPelajaran->guru_pengajar) ? 'selected' : '' }}>
                                        {{ $guru->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('guru_pengajar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mapel.index') }}" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i>
                            Perbaharui</button>
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
