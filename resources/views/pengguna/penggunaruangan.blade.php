@extends('layouts.main')
      @section('container')

				<div class="container-fluid p-0">

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
					</div>
@endsection
	