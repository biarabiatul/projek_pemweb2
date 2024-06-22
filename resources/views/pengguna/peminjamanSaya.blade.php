@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2 class="text-center">Peminjaman Saya</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Kegiatan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Aksi</th>
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
                    <span class="badge badge-warning">PENDING</span>
                    @else
                    {{ ucfirst($item->status) }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('peminjaman.saya', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
