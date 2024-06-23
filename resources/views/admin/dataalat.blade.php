@extends('layouts.main')
@section('container')

<div class="container">
    {{-- <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>Alat</p>
                    <p>Total alat keseluruhan</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>Tersedia</p>
                    <p>Total alat tersedia</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>Tidak tersedia</p>
                    <p>Total alat dipinjam</p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Manajemen Data Alat</h2>
                  <form action="{{ route('alat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_alat" class="form-label">Nama alat</label>
                            <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan nama alat">
                        </div>
                        <div class="mb-3">
                              <label for="stok" class="form-label">Stok</label>
                              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah stok">
                          </div>                          
                          <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>                       
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                              @foreach($alats as $index => $alat)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                    <td>{{ $alat->nama_alat }}</td>
                                    <td>{{ $alat->stok }}</td>
                                    <td>{{ $alat->deskripsi }}</td>
                                    <td>
                                        <form action="{{ route('alat.delete', $alat->id) }}" method="post" onsubmit="return confirm('Apakah anda ingin menghapus alat ini?')">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('alat.edit', $alat->id) }}" class="btn btn-primary">Edit</a>
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
</div>

@endsection
