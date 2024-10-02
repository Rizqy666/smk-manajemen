@extends('layouts.master')
@section('title', 'Halaman Daftar Jadwal Pelajaran Seluruh Kelas')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('jadwalPelajaran.index') }}">Daftar Jadwal Pelajaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Jadwal Seluruh Kelas</li>
@endsection
@push('css')
    {{-- // --}}
@endpush
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('jadwalPelajaran.index') }}" class="btn btn-secondary btn-sm"> <i
                        class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Jadwal Pelajaran SMK N 1 XXX</h1>
                </div>
                <div class="card-body">
                    @foreach ($kelas as $kelasItem)
                        <h2>Kelas {{ $kelasItem->nama_kelas }}</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Guru Pengajar</th>
                                    <th>Jam Pelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelasItem->jadwalPelajaran as $jadwal)
                                    <tr>
                                        <td>{{ ucfirst($jadwal->hari) }}</td>
                                        <td>{{ $jadwal->mata_Pelajaran->nama_pelajaran ?? 'tidak ada mata pelajaran' }}</td>
                                        <td>{{ $jadwal->guru->name ?? 'tidak ada guru pengajar' }}</td>
                                        <td>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada jadwal pelajaran untuk kelas ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <hr> <!-- Memisahkan setiap tabel dengan garis -->
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- // --}}
@endpush
