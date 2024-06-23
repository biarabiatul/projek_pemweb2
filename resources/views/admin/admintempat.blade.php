@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2 class="text-center">Manajemen Peminjaman Ruangan</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Kegiatan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamanRuangan as $item)
            <tr>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->jumlah_peserta }}</td>
                <td>{{ $item->nama_kegiatan }}</td>
                <td>{{ $item->waktu_mulai }}</td>
                <td>{{ $item->waktu_selesai }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>
                    <form action="{{ route('admin.peminjaman.ruangan.updateStatus', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        <select name="status" class="form-control form-control-sm">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection