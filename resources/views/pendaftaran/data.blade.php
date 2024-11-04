@extends('layouts.master')
@section('title', 'Halaman Pendaftaran')
@section('breadcrumb')
    <li class="breadcrumb-item active">Pendaftaran</li>
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
                </script>
            @endif
            <div class="d-flex justify-content-end mb-3">
                <span
                    class="badge text-bg-{{ $pendaftarans->status == 'Pending' ? 'warning' : ($pendaftarans->status == 'Diterima' ? 'success' : 'danger') }}">{{ $pendaftarans->status ?? 'Belum ada data' }}</span>
            </div>
            <div class="card">
                <div class="card-header">Detail Pendaftaran Anda</div>
                <div class="card-body">
                    <div class="container">
                        <h2>Data Pendaftaran Anda</h2>

                        @php
                            // Mengambil data pendaftaran berdasarkan user_id
                            $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->first();
                        @endphp

                        @if ($pendaftaran)

                            <table class="table">
                                <tr>
                                    <th>NISN</th>
                                    <td>{{ $pendaftaran->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $pendaftaran->email }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $pendaftaran->nomor_telepon }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>{{ $pendaftaran->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ $pendaftaran->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $pendaftaran->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <th>Agama</th>
                                    <td>{{ $pendaftaran->agama }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $pendaftaran->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Orang Tua</th>
                                    <td>{{ $pendaftaran->nama_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat Orang Tua</th>
                                    <td>{{ $pendaftaran->alamat_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan Orang Tua</th>
                                    <td>{{ $pendaftaran->pekerjaan_orang_tua }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ optional($pendaftaran->jurusan)->nama_jurusan }}</td>
                                    <!-- Pastikan relasi sudah ada -->
                                </tr>
                                <tr>
                                    <th>Ijazah</th>
                                    <td>
                                        @if ($pendaftaran->ijazah)
                                            <a href="{{ asset('storage/' . $pendaftaran->ijazah) }}" target="_blank">Lihat
                                                Ijazah</a>
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Transkrip Nilai</th>
                                    <td>
                                        @if ($pendaftaran->transkip_nilai)
                                            <a href="{{ asset('storage/' . $pendaftaran->transkip_nilai) }}"
                                                target="_blank">Lihat Transkrip Nilai</a>
                                        @else
                                            Tidak ada
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        @else
                            <p>Data pendaftaran tidak ditemukan. Anda belum mendaftar.</p>
                        @endif
                    </div>
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
    </script>
@endpush
