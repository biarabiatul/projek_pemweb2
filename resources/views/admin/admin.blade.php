@extends('layouts.main')
@section('container')

<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Ini halaman dashboard admin</h1>

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row text-center">
						<div class="col-md-6">
							<a href="#" class="text-decoration-none">
								<div class="card">
									<div class="card-body">
										<i class="bi bi-house-add"></i>
										<h5 class="card-title">Reservasi Tempat</h5>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-6">
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
		</div>
	</div>

</div>

@endsection
