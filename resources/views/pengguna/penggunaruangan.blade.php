<!-- resources/views/pengguna/penggunaruangan.blade.php -->

@extends('layouts.main')

@section('container')

<div class="container mt-5">
    <h2 class="text-center">Daftar Ruangan</h2>
    <div class="row">
        @foreach($ruangan_admin as $room)
        <div class="col-md-4">
            <div class="card">
                <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ruang {{ $room->nama_ruangan }}</h5>
                    <p class="card-text">Kapasitas : {{ $room->kapasitas }} orang</p>
                    <p class="card-text">Lokasi : {{ $room->lokasi }}</p>
                    <p class="card-text">Deskripsi : {{ $room->deskripsi }}</p>
                    <a href="{{ route('peminjaman.ruangan.form', $room->id) }}" class="btn btn-primary">Reservasi</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
