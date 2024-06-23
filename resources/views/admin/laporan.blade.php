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
                                <button type="button" class="btn btn-primary" onclick="exportPeminjamanRuanganPdf()"><i class="bi bi-file-earmark-arrow-up-fill"></i> Eksport PDF</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="ruanganTable" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Kegiatan</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Selesai</th>
                                            <th>Status</th>
                                        
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($peminjamanRuangan as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->nama_peminjam }}</td>
                                            <td>{{ $item->jumlah_peserta }}</td>
                                            <td>{{ $item->nama_kegiatan }}</td>
                                            <td>{{ $item->waktu_mulai }}</td>
                                            <td>{{ $item->waktu_selesai }}</td>
                                            <td>{{ ucfirst($item->status) }}</td>
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
                                <button type="button" class="btn btn-primary" onclick="exportPeminjamanAlatPdf()"><i class="bi bi-file-earmark-arrow-up-fill"></i> Eksport PDF</button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="alatTable" class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 15%;">Nama Peminjam</th>
                                            <th style="width: 10%;">NIM</th>
                                            <th style="width: 10%;">Prodi</th>
                                            <th style="width: 10%;">Jumlah Pinjam</th>
                                            <th style="width: 15%;">Keperluan</th>
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
                                            <td>{{ $item->nama_peminjam }}</td>
                                            <td>{{ $item->nim }}</td>
                                            <td>{{ $item->prodi }}</td>
                                            <td>{{ $item->jumlah_pinjam }}</td>
                                            <td>{{ $item->keperluan }}</td>
                                            <td>{{ $item->jam_pinjam }}</td>
                                            <td>{{ $item->jam_kembali }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ ucfirst($item->status) }}</td>
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
    function exportRuanganPdf() {
        var tanggalawal = document.getElementById('tanggalawal_ruangan').value;
        var tanggalakhir = document.getElementById('tanggalakhir_ruangan').value;
        window.location.href = `{{ url('/export/peminjaman-ruangan/pdf') }}?tanggalawal=${tanggalawal}&tanggalakhir=${tanggalakhir}`;
    }

    function exportAlatPdf() {
        var tanggalawal = document.getElementById('tanggalawal_alat').value;
        var tanggalakhir = document.getElementById('tanggalakhir_alat').value;
        window.location.href = `{{ url('/export/peminjaman-alat/pdf') }}?tanggalawal=${tanggalawal}&tanggalakhir=${tanggalakhir}`;
    }
</script>

@endsection
