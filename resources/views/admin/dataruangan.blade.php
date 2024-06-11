@extends('layouts.main')
@section('container')

<div class="container">
	<div class="row">
            <div class="col-md-4">
                  
                  <div class="card">
                        <div class="card-body">
                              <p>Ruangan</p>
      
                              <p>Total ruangan keseluruhan</p>                        
                        </div>
                  </div>
            </div>
            <div class="col-md-4">
                  
                  <div class="card">
                        <div class="card-body">
                              <p>Tersedia</p>
      
                              <p>Total ruangan tersedia</p>                        
                        </div>
                  </div>
            </div>
            <div class="col-md-4">
                  
                  <div class="card">
                        <div class="card-body">
                              <p>Tidak Tersedia</p>
      
                              <p>Total ruangan yang sedang dipinjam</p>                        
                        </div>
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="col-md-4">
                  <div class="card">
                        <div class="card-body">
                              <div class="mb-3">
                                    <label for="addRuangan" class="form-label">Nama Ruangan</label>
                                    <input type="text" class="form-control" id="ruangan" placeholder="Masukkan nama ruangan">
                              </div>
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-6">
                                                <div class="mb-3">
                                                      <label for="kapasitas" class="form-label">Kapasitas</label>
                                                      <input type="number" class="form-control" id="kapasitas" placeholder="Kapasitas Ruangan">
                                                </div>
                                          </div>
                                          <div class="col-md-6">
                                                <div class="mb-3">
                                                      <label for="lokasi" class="form-label">Lokasi</label>
                                                      <input type="text" class="form-control" id="lokasi" placeholder="Lokasi Ruangan">
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" rows="3"></textarea>
                              </div>                              
                              <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Thumbnail</label>
                                    <input type="file" class="form-control" id="thumbanil">
                              </div>                              
                        </div>
                  </div>
            </div>

            <div class="col-md-8">
                  <div class="card">
                        <div class="card-body">
                              <p>Hello World</p>
                        </div>
                  </div>
            </div>
      </div>

@endsection
