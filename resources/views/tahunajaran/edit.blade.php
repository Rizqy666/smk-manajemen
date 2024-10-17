@extends('layouts.master')
@section('title', 'Halaman Edit Tahun Ajaran')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('tahunAjaran.index') }}">Daftar Tahun Ajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Tahun Ajaran</li>
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
                    Tahun Ajaran</div>
                <form action="{{ route('tahunAjaran.update', $tahunAjaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_awal" class="form-label">Tahun Awal</label>
                                    <input type="number" class="form-control" name="tahun_awal"
                                        value="{{ old('tahun_awal', $tahunAjaran->tahun_awal ?? '') }}" id="tahun_awal"
                                        min="1900" max="2099" oninput="validateYear(this)" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tahun_akhir" class="form-label">Tahun Akhir</label>
                                    <input type="number" class="form-control" name="tahun_akhir"
                                        value="{{ old('tahun_akhir', $tahunAjaran->tahun_akhir ?? '') }}" id="tahun_akhir"
                                        min="1900" max="2099" oninput="validateYear(this)" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select name="semester" id="semester" class="form-control" required>
                                <option disabled
                                    {{ is_null(old('semester', $tahunAjaran->semester ?? null)) ? 'selected' : '' }}>
                                    Pilih semester
                                </option>
                                <option value="ganjil"
                                    {{ old('semester', $tahunAjaran->semester ?? '') == 'ganjil' ? 'selected' : '' }}>
                                    Ganjil
                                </option>
                                <option value="genap"
                                    {{ old('semester', $tahunAjaran->semester ?? '') == 'genap' ? 'selected' : '' }}>
                                    Genap
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('tahunAjaran.index') }}" class="btn btn-secondary btn-sm"> <i
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
