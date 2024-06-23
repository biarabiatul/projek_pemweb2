<!-- resources/views/formPinjamRuangan.blade.php -->
@extends('layouts.main')

@section('container')
<div class="container mt-5">
    <h2 class="text-center mb-4">Form Peminjaman Ruangan</h2>

    <div class="card">
        <div style="text-align: center;">
            @foreach (File::glob(public_path('assets/img/fotoruangan/*')) as $file)
                <img src="{{ asset('assets/img/fotoruangan/' . basename($file)) }}" class="card-img-top"
                    style="width: 300px; height: auto;" alt="...">
            @endforeach

            <div class="card-body">
                <h5 class="card-title">Ruang {{ $ruangan->nama_ruangan }}</h5>
                <p class="card-text">Kapasitas : {{ $ruangan->kapasitas }} orang</p>
                <p class="card-text">Lokasi : {{ $ruangan->lokasi }}</p>
                <p class="card-text">Deskripsi : {{ $ruangan->deskripsi }}</p>

                <form action="{{ route('peminjaman.ruangan.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ruangan_id" value="{{ $ruangan->id }}">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Pribadi/Organisasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama"
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="jumlah_peserta" class="col-sm-3 col-form-label">Jumlah Peserta</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta"
                                placeholder="Masukkan jumlah peserta" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="namaKegiatan" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan"
                                placeholder="Masukkan nama kegiatan" required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="waktuMulai" class="col-sm-3 col-form-label">Waktu Mulai</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" id="waktuMulai" name="waktuMulai"
                                required>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="waktuSelesai" class="col-sm-3 col-form-label">Waktu Selesai</label>
                        <div class="col-sm-9">
                            <input type="datetime-local" class="form-control" id="waktuSelesai" name="waktuSelesai"
                                required>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
