@extends('layouts.main')
@section('container')

<div class="container">
	<div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-body">
                              <div class="container">
						<div class="row">
							<div class="col-md-4">
								<form action="#">
									<div class="mb-3">
										<label for="alat" class="form-label">Tanggal Awal</label>
										<input type="date" class="form-control" id="tanggalawal" >                                                      
									</div>
								</form>
							</div>
							<div class="col-md-4">
								<form action="#">
									<div class="mb-3">
										<label for="alat" class="form-label">Tanggal Awal</label>
										<input type="date" class="form-control" id="tanggalawal" >                                                      
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<button type="button" class="btn btn-primary"><i class="bi bi-file-earmark-arrow-up-fill"></i>Eksport File</button>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-hover table-condensed">
                
									<thead>
									    <tr class="text-center">
										  <th style="width: 3%">No</th>
										  <th style="width: 15%">Peminjam</th>
										  <th style="width: 15%">Ruangan</th>
										  <th style="width: 10%">Tanggal Peminjaman</th>
										  <th style="width: 10%">Jam Pinjam</th>
										  <th style="width: 15%">Jam Kembali</th>
										  <th style="width: 10%">Keperluan</th>
										  <th style="width: 10%">Ruang</th>   
									    </tr>
									</thead>
								  </table>
							</div>
						</div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>


@endsection
