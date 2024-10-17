@extends('layouts.master')
@section('title', 'Halaman Daftar Siswa')
@section('breadcrumb')
    <li class="breadcrumb-item active">Daftar Siswa</li>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <div class="card">
                <div class="card-header">
                    Daftar Siswa
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tempat. tanggal lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->userDetail->kelas_id ?? 'Tidak ada kelas' }}</td>
                                    <td>{{ $item->userDetail->tempat_lahir ?? 'Tidak ada' }} -
                                        {{ $item->userDetail->tanggal_lahir ?? 'Tidak ada' }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                autoWidth: true,
                responsive: true,
                columnDefs: [{
                        width: "2%",
                        targets: 0
                    },
                    {
                        width: "35%",
                        targets: 1
                    },
                    {
                        width: "40%",
                        targets: 2
                    }
                ]
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endpush
