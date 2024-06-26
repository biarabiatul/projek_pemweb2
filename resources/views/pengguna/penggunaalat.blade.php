@extends('layouts.main')

@section('container')
<div class="container">
    <h2 class="text-center"><strong>Daftar Alat</strong></h2><br>
    <div class="row">
        <div class="col">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Alat</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($daftar_alat as $index => $alat)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $alat->nama_alat }}</td>
                        <td>{{ $alat->stok }}</td>
                        <td>{{ $alat->deskripsi }}</td>
                        <td class="text-center">
                            <a href="{{ route('peminjaman.alat.form', $alat->id) }}" class="btn btn-primary">Pinjam</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
