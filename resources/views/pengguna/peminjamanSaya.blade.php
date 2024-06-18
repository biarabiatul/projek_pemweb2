@extends('main')

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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman_saya as $peminjaman)
            <tr>
                <td>{{ $peminjaman->nama }}</td>
                <td>{{ $peminjaman->jumlah }}</td>
                <td>{{ $peminjaman->kegiatan }}</td>
                <td>{{ $peminjaman->waktu_mulai }}</td>
                <td>{{ $peminjaman->waktu_selesai }}</td>
                <td>
                    <a href="{{ route('peminjaman_ruangan.show', $peminjaman->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    <a href="{{ route('peminjaman_ruangan.edit', $peminjaman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('peminjaman_ruangan.destroy', $peminjaman->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
