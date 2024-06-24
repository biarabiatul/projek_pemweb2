<!-- resources/views/formPinjamRuangan.blade.php -->
@extends('layouts.main')

@section('container')
    <div class="container">
        <h2 class="text-center"><strong>Form Peminjaman Alat</strong></h2><br>

        <div class="card">
            <div style="text-align: center;">

                <div class="card-body">
                    <h5 class="card-title">Nama Alat {{ $alat->nama_alat }}</h5>
                    <p class="card-text">Stok : {{ $alat->stok }}</p>
                    <p class="card-text">Deskripsi : {{ $alat->deskripsi }}</p>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.alat.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alat_id" value="{{ $alat->id }}">

                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Pribadi/Organisasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="nim" class="col-sm-3 col-form-label">NIM</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nim" name="nim"
                                    placeholder="Masukkan NIM" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="prodi" class="col-sm-3 col-form-label">Prodi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="prodi" name="prodi"
                                    placeholder="Masukkan Program Studi" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="jumlahPinjam" class="col-sm-3 col-form-label">Jumlah Pinjam</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="jumlahPinjam" name="jumlahPinjam" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="keperluan" class="col-sm-3 col-form-label">Keperluan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="jamPinjam" class="col-sm-3 col-form-label">Jam Pinjam</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" id="jamPinjam" name="jamPinjam" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <label for="jamKembali" class="col-sm-3 col-form-label">Jam Kembali</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control" id="jamKembali" name="jamKembali"
                                    required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <label for="nohp" class="col-sm-3 col-form-label">No HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nohp" name="nohp" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <label for="ruang" class="col-sm-3 col-form-label">Ruang</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="ruang" name="ruang" required>
                                    <option value="" disabled selected>Pilih Ruangan</option>
                                    @foreach ($allRuangan as $ruang)
                                        <option value="{{ $ruang->id }}">{{ $ruang->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
