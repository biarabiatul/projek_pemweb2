@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2 class="text-center">Manajemen Peminjaman Alat</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Jumlah Pinjam</th>
                <th>Keperluan</th>
                <th>Jam Pinjam</th>
                <th>Jam Kembali</th>
                <th>No HP</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjamanAlat as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td>{{ $item->keperluan }}</td>
                <td>{{ $item->jam_pinjam }}</td>
                <td>{{ $item->jam_kembali }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>
                    <form action="{{ route('admin.peminjaman.alat.updateStatus', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        <select name="status" class="form-control form-control-sm">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $item->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="rejected" {{ $item->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
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
