@extends('layouts.main')
      @section('container')

				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Beranda</h1>

					</div>
					<div class="row">
						<div class="col-6">
							<div class="card">
								<div class="card-body" >
									<div class="col-md-12 text-center">
										<a href="{{ route("ruangan.show") }}" class="text-decoration-none">
											<i class="bi bi-house-add"></i>
											<h5 class="card-title">Reservasi Tempat</h5>
										</a>
									</div>
								</div>
							</div>
						</div>

					<div class="col-6">
						<div class="card">
							<div class="card-body" >
								<div class="col-md-12 text-center">
									<a href="{{ route("adminalat") }}" class="text-decoration-none">							
										<i class="bi bi-box-seam"></i>
										<h5 class="card-title">Peminjaman Alat</h5>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
@endsection
			