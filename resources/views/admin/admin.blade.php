@extends('layouts.main')
@section('container')

<div class="container">
	<div class="row">
		<div class="col-4">
			<div class="card">
				<div class="card-body" >
						<div class="col-md-12 text-center ">
							<a href="#" class="text-decoration-none">
								<i class="bi bi-house-add"></i>
								<h5 class="card-title">Data Ruangan</h5>
							</a>
						</div>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-body" >
						<div class="col-md-12 text-center ">
							<a href="#" class="text-decoration-none">
								<i class="bi bi-box-seam"></i>
								<h5 class="card-title">Data Alat</h5>
							</a>
						</div>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-body" >
					<div class="col-md-12 text-center ">
						<a href="#" class="text-decoration-none">
							<i class="bi bi-house-add"></i>
							<h5 class="card-title">Laporan</h5>
						</a>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body" >
					<div class="col-md-12 text-center">
						<a href="{{ route("admintempat") }}" class="text-decoration-none">
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



</div>

@endsection
