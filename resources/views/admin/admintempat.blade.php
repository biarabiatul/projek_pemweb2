@extends('layouts.main')

@section('container')
   

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Manajemen Peminjaman Ruangan</h2>
                    <hr>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="tanggalawal_alat" class="form-label">Tanggal Awal</label>
                                        <input type="date" class="form-control" id="tanggalawal_alat"
                                            name="tanggalawal_alat">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="tanggalakhir_alat" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="tanggalakhir_alat"
                                            name="tanggalakhir_alat">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">

                                <form action="{{ route('admin.peminjaman.ruangan.search') }}" method="GET"
                                    class="row mb-3">
                                    @csrf
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="nama_peminjam" class="form-label">Cari Nama</label>
                                            <input type="text" class="form-control" id="nama_peminjam"
                                                name="nama_peminjam" value="{{ request('nama_peminjam') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary mb-3"><i class="bi bi-search"></i>
                                            Cari</button>
                                    </div>
                                </form>
                            </div>
                        </div>  
                        @if (session('success'))
                                <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        </div>
                        @endif

                        <table id="ruanganTable" class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Peminjam</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Nama Ruangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamanRuangan as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->nama_peminjam }}</td>
                                        <td>{{ $item->jumlah_peserta }}</td>
                                        <td>{{ $item->nama_kegiatan }}</td>
                                        <td>{{ $item->waktu_mulai }}</td>
                                        <td>{{ $item->waktu_selesai }}</td>
                                        <td>{{ $item->nama_ruangan }}</td> <!-- Tampilkan nama ruangan -->
                                        <td>
                                            @if ($item->status == 'pending')
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
                                            <form action="{{ route('admin.peminjaman.ruangan.updateStatus', $item->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                <select name="status" class="form-control form-control-sm">
                                                    <option value="pending"
                                                        {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="disetujui"
                                                        {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui
                                                    </option>
                                                    <option value="ditolak"
                                                        {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    <option value="selesai"
                                                        {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-success mt-2">Update</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#ruanganTable').DataTable();
        });
    </script>
@endsection
