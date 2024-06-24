<!-- resources/views/pengguna/peminjamanSaya.blade.php -->

@extends('layouts.main')

@section('container')
<div class="container">
    <h2 class="text-center"><strong>Peminjaman Saya</strong></h2>

    <!-- Tabel Peminjaman Ruangan -->
    <h3 class="mt-4">Peminjaman Ruangan</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead class="text-center">
            <tr>
                <th>Nama Peminjam</th>
                <th>Jumlah Peserta</th>
                <th>Nama Kegiatan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Nama Ruangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservasi_ruangan as $item)
                <tr>
                    <td>{{ $item->nama_peminjam }}</td>
                    <td>{{ $item->jumlah_peserta }}</td>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->waktu_mulai }}</td>
                    <td>{{ $item->waktu_selesai }}</td>
                    <td>{{ $item->nama_ruangan }}</td>
                    <td>
                        @if($item->status == 'pending')
                            <span class="badge bg-warning my-2">PENDING</span>
                        @elseif($item->status == 'disetujui')
                            <span class="badge bg-success my-2">DISETUJUI</span>
                        @elseif($item->status == 'ditolak')
                            <span class="badge bg-danger my-2">DITOLAK</span>
                        @else
                            {{ ucfirst($item->status) }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    <!-- Tabel Peminjaman Alat -->
    <h3 class="mt-4">Peminjaman Alat</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Pribadi/Organisasi</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Nama Alat</th>
                    <th>Jumlah Pinjam</th>
                    <th>Keperluan</th>
                    <th>Jam Pinjam</th>
                    <th>Jam Kembali</th>
                    <th>No HP</th>
                    <th>Ruang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pinjam_alat as $index => $item)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->nama_alat }}</td>
                        <td>{{ $item->jumlah_pinjam }}</td>
                        <td>{{ $item->keperluan }}</td>
                        <td>{{ $item->jam_pinjam }}</td>
                        <td>{{ $item->jam_kembali }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->nama_ruangan }}</td>
                        <td>
                            @if($item->status == 'pending')
                                <span class="badge bg-warning my-2">PENDING</span>
                            @elseif($item->status == 'disetujui')
                                <span class="badge bg-success my-2">DISETUJUI</span>
                            @elseif($item->status == 'ditolak')
                                <span class="badge bg-danger my-2">DITOLAK</span>
                            @else
                                {{ ucfirst($item->status) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
