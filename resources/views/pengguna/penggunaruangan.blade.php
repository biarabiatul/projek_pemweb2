@extends('layouts.main')
        @section('container')

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                        @foreach($ruangan as $room)
                      <h5 class="card-title">Ruang {{ $room->nama_ruangan }}</h5>
                      <p class="card-text">Kapasitas : {{ $room->kapasitas }} orang</p>
                      <p class="card-text">Lokasi : {{ $room->lokasi }}</p>
                      <p class="card-text">Deskripsi :{{ $room->deskripsi }}</p>
                      @endforeach
                      <a href="#" class="btn btn-primary">Reservasi</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/img/fotoruangan/ruangkhd.png" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>

        </div>
@endsection
	