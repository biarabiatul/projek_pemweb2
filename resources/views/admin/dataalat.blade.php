@extends('layouts.main')
@section('container')

<div class="container">
	<div class="row">
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
      </div>
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-body">
                              <button type="button" class="btn btn-primary"><i class="bi bi-plus"></i>Tambah Alat</button>
                              <div class="mb-3">
                                    <table class="table table-hover table-condensed">
                
                                          <thead>
                                              <tr class="text-center">
                                                  <th style="width: 3%">No</th>
                                                  <th style="width: 15%">Nama Barang</th>
                                                  <th style="width: 15%">Jumlah / Satuan</th>
                                                  <th style="width: 10%">Keperluan</th>
                                                  <th style="width: 10%">Jam Pinjam</th>
                                                  <th style="width: 15%">Jam Kembali</th>
                                                  <th style="width: 10%">No. HP</th>
                                                  <th style="width: 10%">Ruang</th>   
                                              </tr>
                                          </thead>
                                      </table>
                              </div>                         
                        </div>
                  </div>
            </div>
      </div>

@endsection
