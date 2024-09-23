@extends('layouts.master')
@section('title', 'Halaman Profile')
@section('breadcrumb')
    <li class="breadcrumb-item active">Profile</li>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />
@endpush
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <script>
                    Swal.fire({
                        title: 'Berhasil!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    window.onload = function() {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Profil Belum Lengkap',
                            text: 'Anda harus melengkapi profil terlebih dahulu sebelum melanjutkan.',
                            confirmButtonText: 'Lengkapi Profil'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // window.history.back();
                            }
                        });
                    };
                </script>
            @endif
            <div class="card">
                <div class="card-header">Detail Profile</div>
                <div class="card-body">
                    <form action="{{ route('profile.complete.store') }}" method="POST">
                        @csrf
                        <!-- Alamat -->
                        <div class='mb-3'>
                            <label class="form-label" for="name">Nama Lengkap</label>
                            <input type="name" name="name" class="form-control" id="name"
                                value="{{ old('name', auth()->user()->name) }}" readonly>
                            @error('name')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Email -->
                        <div class='mb-3'>
                            <label class="form-label" for="email">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="sendVerification('email')">Verifikasi</button>
                            </div>
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nomor Telepon -->
                        <div class='mb-3'>
                            <label class="form-label" for="nomor_telepon">Nomor Telepon</label>
                            <div class="input-group">
                                <input type="number" name="nomor_telepon" class="form-control" id="nomor_telepon"
                                    value="{{ old('nomor_telepon', $userDetail->nomor_telepon ?? '') }}" required
                                    maxlength="15">
                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="sendVerification('nomor_telepon')">Verifikasi</button>
                            </div>
                            @error('nomor_telepon')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tempat Lahir -->
                        <div class='mb-3'>
                            <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir"
                                value="{{ old('tempat_lahir', $userDetail->tempat_lahir ?? '') }}" required>
                            @error('tempat_lahir')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class='mb-3'>
                            <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $userDetail->tanggal_lahir ?? '') }}" required>
                            @error('tanggal_lahir')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class='mb-3'>
                            <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control"id="jenis_kelamin" required>
                                <option value="">Pilih</option>
                                <option value="L"
                                    {{ old('jenis_kelamin', $userDetail->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $userDetail->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Agama -->
                        <div class='mb-3'>
                            <label class="form-label" for="agama">Agama</label>
                            <select name="agama" id="agama" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Islam"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam
                                </option>
                                <option value="Kristen"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen
                                </option>
                                <option value="Katolik"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik
                                </option>
                                <option value="Hindu"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu
                                </option>
                                <option value="Buddha"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha
                                </option>
                                <option value="Konghucu"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                                <option value="Lainnya"
                                    {{ old('agama', $userDetail->agama ?? '') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                </option>
                            </select>
                            @error('agama')
                                <div>{{ $message }}</div>
                            @enderror
                            <div class='mb-3'>
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5">{{ old('alamat', $userDetail->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div>{{ $message }}</div>
                                @enderror
                            </div>
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
@endsection
@push('js')
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

        function sendVerification(type) {
            let emailOrPhone = (type === 'email') ? document.getElementById('email').value : document.getElementById(
                'nomor_telepon').value;

            if (emailOrPhone) {
                // Kirim AJAX request untuk verifikasi
                fetch('{{ route('profile.send.verification') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan CSRF token disertakan
                        },
                        body: JSON.stringify({
                            type: type,
                            value: emailOrPhone
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json(); // Parsing responsenya sebagai JSON
                    })
                    .then(data => {
                        alert(data.message); // Tampilkan pesan sukses dari server
                    })
                    .catch(error => {
                        console.error('Error:', error); // Tampilkan error di console
                    });
            } else {
                alert("Masukkan " + (type === 'email' ? "email" : "nomor telepon") + " terlebih dahulu.");
            }
        }
    </script>
@endpush
