@extends('layouts.main')
@section('container')

<div class="row">
    @foreach($ruangan as $room)
    <div class="col-md-4">
        <div class="card">
            <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
            <div class="card-body">
                <h5 class="card-title">Ruang {{ $room->nama_ruangan }}</h5>
                <p class="card-text">Kapasitas : {{ $room->kapasitas }} orang</p>
                <p class="card-text">Lokasi : {{ $room->lokasi }}</p>
                <p class="card-text">Deskripsi : {{ $room->deskripsi }}</p>
                <a href="formPinjamRuangan" class="btn btn-primary">Reservasi</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
