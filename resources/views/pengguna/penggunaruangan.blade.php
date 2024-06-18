@extends('layouts.main')
        @section('container')

        <div class="row">

            
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                                            
                            @foreach($ruangan as $room)
                                <div><img src="{{ asset('img/fotoruangan/ruangkhd.jpg') }}/{{ $room->thumbnail}}" class="img-fluid"></div>
                                <div>{{ $room->nama_ruangan }}</div>
                                <div>{{ $room->kapasitas }}</div>
                                <div>{{ $room->lokasi }}</div>
                                <div>{{ $room->deskripsi }}</div>
                            @endforeach
                        
                    </div>
                </div>
                </div> --}}
                    {{-- <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                                    
                                    @foreach($ruangan as $room)
                                        <div><img src="{{ asset('img/photos') }}/{{ $room->thumbnail}}" class="img-fluid"></div>
                                        <div>{{ $room->nama_ruangan }}</div>
                                        <div>{{ $room->kapasitas }}</div>
                                        <div>{{ $room->lokasi }}</div>
                                        <div>{{ $room->deskripsi }}</div>
                                    @endforeach
                                
                            </div>
                        </div>
                    </div> --}}
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
                      <a href="pengguna/formPinjamRuangan" class="btn btn-primary">Pinjam</a>
                      <a href="#" class="btn btn-primary">Detail</a>
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
            

				{{-- <div class="container-fluid p-0">

					<h1 class="h3 mb-3">Ini halaman dashboard pengguna</h1>
                    <ul>
                        @foreach($ruangan as $room)
                            <li>{{ $room->nama_ruangan }}</li>
                            <li>{{ $room->kapasitas }} </li>
                            <li>{{ $room->lokasi }}</li>
                            <li>{{ $room->deskripsi }}</li>
                            <li> <img src="{{ asset('img/photos') }}/{{ $room->thumbnail}}" class="img-fluid"></li>
                        @endforeach
                    </ul>
					</div> --}}
@endsection
	