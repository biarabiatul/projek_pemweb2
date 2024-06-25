@extends('layouts.main')
@section('container')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="container">
    <!-- Laporan Reservasi Ruangan -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Laporan Reservasi Ruangan</h2>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="tanggalawal_ruangan" class="form-label">Tanggal Awal</label>
                                        <input type="date" class="form-control" id="tanggalawal_ruangan" name="tanggalawal_ruangan">                                                      
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="#">
                                    <div class="mb-3">
                                        <label for="tanggalakhir_ruangan" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" id="tanggalakhir_ruangan" name="tanggalakhir_ruangan">                                                      
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success" onclick="exportRuanganExcel()"><i class="bi bi-file-earmark-arrow-up-fill"></i>Eksport Excel</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
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
                                        {{-- {{ ucfirst($item->status) }} --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Laporan Peminjaman Alat -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Laporan Peminjaman Alat</h2>
                    <hr>
                    <div class="container">
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
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success" onclick="exportAlatExcel()"><i class="bi bi-file-earmark-arrow-up-fill"></i>Eksport Excel</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 table-responsive">
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
                                {{-- {{ ucfirst($item->status) }} --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function exportRuanganExcel() {
        var tanggalawal = document.getElementById('tanggalawal_ruangan').value;
        var tanggalakhir = document.getElementById('tanggalakhir_ruangan').value;
        window.location.href = `{{ url('admin/laporan.exportRuanganExcel') }}?tanggalawal=${tanggalawal}&tanggalakhir=${tanggalakhir}`;
    }

    function exportAlatExcel() {
        var tanggalawal = document.getElementById('tanggalawal_alat').value;
        var tanggalakhir = document.getElementById('tanggalakhir_alat').value;
        window.location.href = `{{ url('admin/laporan.exportAlatExcel') }}?tanggalawal=${tanggalawal}&tanggalakhir=${tanggalakhir}`;
    }
</script>

@endsection
