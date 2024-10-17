@extends('layouts.master')
@section('title', 'Halaman Daftar Tahun Ajaran')
@section('breadcrumb')
    <li class="breadcrumb-item active">Daftar Tahun Ajaran</li>
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
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('tahunAjaran.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-user-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card">
                <div class="card-header">
                    Daftar Tahun Ajaran
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semester</th>
                                <th>Tahun Ajaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tahunAjaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->semester }}</td>
                                    <td>{{ $item->tahun_awal }} - {{ $item->tahun_akhir }}</td>
                                    </td>

                                    <td>

                                        <div class="d-grid gap-2 d-md-flex justify-content-md">
                                            <a href="{{ route('tahunAjaran.edit', $item->id) }}"
                                                class="btn btn-sm text-white bg-warning"><i class="ri ri-pencil-line"></i>
                                                Edit</a>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('tahunAjaran.destroy', $item->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button class="btn btn-sm text-white bg-danger"
                                                onclick="confirmDelete({{ $item->id }})"><i
                                                    class="ri ri-delete-bin-5-line"></i> Hapus</button>
                                        </div>
                                    </td>
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
