@extends('layouts.main')

@section('container')

<div class="container">
    <h2 class="text-center mb-4"><strong>Daftar Ruangan</strong></h2>
    <div class="row">
        @foreach($ruangan_admin as $room)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <a href="{{ route('peminjaman.ruangan.form', $room->id) }}"><img src="{{ Storage::url($room->thumbnail) }}" alt="Gambar {{ $room->nama_ruangan }}" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;" ></a>
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title text-dark">Ruang {{ $room->nama_ruangan }}</h5><br>
                    </div>
                    <p class="card-text"><strong>Kapasitas:</strong> {{ $room->kapasitas }} orang</p>
                    <p class="card-text"><strong>Lokasi:</strong> {{ $room->lokasi }}</p>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $room->deskripsi }}</p><br>
                    <div class="text-center mt-auto">
                        <a href="{{ route('peminjaman.ruangan.form', $room->id) }}" class="btn btn-primary">Reservasi</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection