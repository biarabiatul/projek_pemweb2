@extends('layouts.main')
@section('container')

@can('admin')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('ruangan.showAdmin') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-house-add display-4"></i>
                        <h2 class="card-title mt-2">Data Ruangan</h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('alat.showAdminalat') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-box-seam display-4"></i>
                        <h5 class="card-title mt-2">Data Alat</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="laporan" class="text-decoration-none text-dark">
                        <i class="bi bi-file-earmark-text display-4"></i>
                        <h5 class="card-title mt-2">Laporan</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('admin.admintempat') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-house-add display-4"></i>
                        <h5 class="card-title mt-2">Reservasi Tempat</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('admin.adminalat') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-box-seam display-4"></i>
                        <h5 class="card-title mt-2">Peminjaman Alat</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan

@cannot('admin')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3 fw-bold">Dashboard Pengguna</h1>
    <div class="row mb-4">
        <div class="col-lg-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('ruangan.showPengguna') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-house-add display-4"></i>
                        <h5 class="card-title mt-2">Reservasi Tempat</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card h-100">
                <div class="card-body text-center">
                    <a href="{{ route('showAlat') }}" class="text-decoration-none text-dark">
                        <i class="bi bi-box-seam display-4"></i>
                        <h5 class="card-title mt-2">Peminjaman Alat</h5>
                    </a>
                </div>
            </div>
        </div>
		<div class="row justify-content-center"> <!-- Menggunakan justify-content-center untuk membuat div center secara horizontal -->
		<div class="col-lg-6 mb-3">
			<div class="card h-100 mx-auto">
				<div class="card-body text-center">
					<a href="{{ route('peminjaman.saya') }}" class="text-decoration-none text-dark">
						<i class="bi bi-list display-4"></i> <!-- Mengganti ikon menjadi bi-list -->
						<h5 class="card-title mt-2">Peminjaman Saya</h5>
					</a>
				</div>
			</div>
    	</div>
</div>


		</div>
    </div>
</div>
@endcan

@endsection
