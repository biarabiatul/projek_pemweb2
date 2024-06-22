@extends('layouts.main')

@section('container')
<div class="container">
    <h2 class="text-center mb-4"><strong>Form Peminjaman Ruangan</strong></h2>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-center">
                    @foreach (File::glob(public_path('assets/img/fotoruangan/*')) as $file)
                    <img src="{{ asset('assets/img/fotoruangan/' . basename($file)) }}" class="card-img-top"
                        style="width: 300px; height: auto;" alt="...">
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <h5 class="card-title text-dark">Ruang {{ $ruangan->nama_ruangan }}</h5><br>
                    </div>
                    <p class="card-text"><strong>Kapasitas :</strong> {{ $ruangan->kapasitas }} orang</p>
                    <p class="card-text"><strong>Lokasi :</strong> {{ $ruangan->lokasi }}</p>
                    <p class="card-text"><strong>Deskripsi :</strong> {{ $ruangan->deskripsi }}</p>
                </div>
            </div>

            <hr>

            <form action="{{ route('peminjaman.ruangan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="ruangan_id" value="{{ $ruangan->id }}">

    <div class="form-group row mb-3">
        <label for="nama" class="col-sm-4 col-form-label text-end card-text"><strong>Nama Pribadi/Organisasi</strong></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="jumlah_peserta" class="col-sm-4 col-form-label text-end card-text"><strong>Jumlah Peserta</strong></label>
        <div class="col-sm-8">
            <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta"
                placeholder="Masukkan jumlah peserta" required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="namaKegiatan" class="col-sm-4 col-form-label text-end card-text"><strong>Nama Kegiatan</strong></label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan"
                placeholder="Masukkan nama kegiatan" required>
        </div>
    </div>

    <div class="form-group row mb-3">
        <label for="waktuMulai" class="col-sm-4 col-form-label text-end card-text"><strong>Waktu Mulai</strong></label>
        <div class="col-sm-8">
            <input type="datetime-local" class="form-control" id="waktuMulai" name="waktuMulai" required>
        </div>
    </div>

    <div class="form-group row mb-4">
        <label for="waktuSelesai" class="col-sm-4 col-form-label text-end card-text"><strong>Waktu Selesai</strong></label>
        <div class="col-sm-8">
            <input type="datetime-local" class="form-control" id="waktuSelesai" name="waktuSelesai" required>
        </div>
    </div>

    <div class="form-group row mt-4">
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

        </div>
    </div>
</div>
@endsection
