@extends('layouts.main')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Manajemen Data Ruangan</h2>
                    <form action="{{ route('ruangan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="ruangan" class="form-label">Nama Ruangan</label>
                            <input type="text" class="form-control" id="ruangan" name="nama_ruangan" placeholder="Masukkan nama ruangan">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kapasitas" class="form-label">Kapasitas</label>
                                        <input type="number" class="form-control" id="kapasitas" name="kapasitas" placeholder="Kapasitas Ruangan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Ruangan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kapasitas</th>
                            <th>Lokasi</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ruangan as $index => $room)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><div>{{ $room->nama_ruangan }}</div></td>
                            <td><div>{{ $room->kapasitas }} orang</div></td>
                            <td><div>{{ $room->lokasi }}</div></td>
                            <td>
                                  <form action="{{ route('ruangan.delete') }}" method="post" onsubmit="return confirm('Apakah anda ingin menghapus ruangan ini?')">
                                      @csrf
                                      @method('delete')
                                      <a href="{{ route('ruangan.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                                      <input type="hidden" name="id" value="{{ $room->id }}">
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                                  
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
      