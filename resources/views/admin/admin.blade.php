@extends('layouts.main')
@section('container')

<h1 class="text-center">Dashboard</h1>
<hr>
<h2 class="mb-5">Admin</h2>

	<div class="row">
		<div class="col-12">
					<div class="row">
						
						<div class="col-md-6 text-center ">
							<a href="{{ route("admintempat") }}" class="text-decoration-none">
								<div class="card">
									<div class="card-body">
										<i class="bi bi-house-add"></i>
										<h5 class="card-title">Reservasi Tempat</h5>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6 text-center">
							<a href="{{ route("adminalat") }}" class="text-decoration-none">
								<div class="card">
									<div class="card-body">
										<i class="bi bi-box-seam"></i>
										<h5 class="card-title">Peminjaman Alat</h5>
									</div>
								</div>
							</a>
						</div>
					</div>	

		</div>
	</div>



@endsection
