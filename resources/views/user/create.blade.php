@extends('layouts.master')
@section('title', 'Halaman Tambah User')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Daftar User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    Tambah User
                </div>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Pilih Role Untuk Login</option>
                                <option value="admin">Admin</option>
                                <option value="siswa">Siswa</option>
                                <option value="staff">Staff</option>
                                <option value="guru">Guru</option>
                            </select>
                        </div>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="card-footer">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm"> <i
                                class="fas fa-arrow-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-save"></i> Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
