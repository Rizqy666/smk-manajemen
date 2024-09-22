@extends('layouts.master')
@section('title', 'Halaman Edit User')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Daftar User</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                    Edit User</div>
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" class="form-control" value="{{ old('name', $user->name) }}" name="name"
                                id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ old('email', $user->email) }}"
                                name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Pilih Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option disabled>Pilih Role Untuk Login</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="siswa" {{ old('role', $user->role) == 'siswa' ? 'selected' : '' }}>Siswa
                                </option>
                                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff
                                </option>
                                <option value="guru" {{ old('role', $user->role) == 'guru' ? 'selected' : '' }}>Guru
                                </option>
                            </select>
                        </div>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Perbaharui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
