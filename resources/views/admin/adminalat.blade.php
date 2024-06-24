@extends('layouts.main')

@section('container')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Manajemen Peminjaman Alat</h2>
                <hr>
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="#">
                                <div class="mb-3">
                                    <label for="tanggalawal_alat" class="form-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="tanggalawal_alat" name="tanggalawal_alat">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form action="#">
                                <div class="mb-3">
                                    <label for="tanggalakhir_alat" class="form-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="tanggalakhir_alat" name="tanggalakhir_alat">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('admin.peminjaman.alat.search') }}" method="GET" class="row mb-3">
                                @csrf
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="nama_peminjam" class="form-label">Cari Nama</label>
                                        <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ request('nama_peminjam') }}">
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary mb-3"><i class="bi bi-search"></i> Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="alatTable" class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 15%;">Nama Alat</th> <!-- Ganti menjadi Nama Alat -->
                                <th style="width: 10%;">NIM</th>
                                <th style="width: 10%;">Prodi</th>
                                <th style="width: 10%;">Jumlah Pinjam</th>
                                <th style="width: 15%;">Nama Peminjam</th> <!-- Ganti menjadi Nama Peminjam -->
                                <th style="width: 10%;">Jam Pinjam</th>
                                <th style="width: 10%;">Jam Kembali</th>
                                <th style="width: 10%;">No HP</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjamanAlat as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_alat }}</td> <!-- Tampilkan nama alat -->
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->prodi }}</td>
                                <td>{{ $item->jumlah_pinjam }}</td>
                                <td>{{ $item->nama_peminjam }}</td> <!-- Pindahkan nama peminjam ke kolom ini -->
                                <td>{{ $item->jam_pinjam }}</td>
                                <td>{{ $item->jam_kembali }}</td>
                                <td>{{ $item->no_hp }}</td>
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
                                <td>
                                    <form action="{{ route('admin.peminjaman.alat.updateStatus', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($peminjamanAlat->isEmpty())
                    <p class="text-center">Tidak ada data peminjaman alat ditemukan untuk nama yang dimasukkan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#alatTable').DataTable();
    });
</script>

@endsection
