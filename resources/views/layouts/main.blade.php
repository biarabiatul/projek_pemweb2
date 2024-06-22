<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="assets/img/logo-ulm.png" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />
    <title>Dashboard</title>

    <link href="{{ asset('static/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ route('home') }}">
                    <span class="align-middle">Sub-Bagian Umum dan BMN FKIP ULM</span>
                </a>
                <div class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('dashboard') }}">
                        <i class="bi bi-sliders2-vertical"></i> <span class="align-middle">Beranda</span>
                        <hr>
                    </a>
                    @can('admin')
                        <a class="sidebar-link" href="{{ route('ruangan.showAdmin') }}">
                            <i class="bi bi-house"></i> <span class="align-middle">Data Ruangan</span></a>

                        <a class="sidebar-link" href="{{ route('alat.showAdminalat') }}">
                            <i class="bi bi-box-seam"></i> <span class="align-middle">Data Alat</span></a>

                        <a class="sidebar-link" href="{{ route('laporan') }}">
                            <i class="bi bi-file-earmark"></i> <span class="align-middle">Laporan</span>
                            <hr>
                        </a>

                        <a class="sidebar-link" href="{{ route('admin.admintempat') }}">
                            <i class="bi bi-house-add"></i> <span class="align-middle">Reservasi Tempat</span></a>

                        <a class="sidebar-link" href="{{ route('admin.adminalat') }}">
                            <i class="bi bi-box-seam"></i> <span class="align-middle">Peminjaman Alat</span></a>
                    @endcan

                    @cannot('admin')
                        <a class="sidebar-link" href="{{ route('ruangan.showPengguna') }}">
                            <i class="bi bi-house-add"></i> <span class="align-middle">Reservasi Tempat</span></a>

                        <a class="sidebar-link" href="{{ route('showAlat') }}">
                            <i class="bi bi-box-seam"></i> <span class="align-middle">Peminjaman Alat</span></a>

                        <a class="sidebar-link" href="{{ route('peminjaman.saya') }}">
                            <i class="bi bi-list"></i> <span class="align-middle">Peminjaman Saya</span></a>
                    @endcan

                </div>

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{ asset('assets/img/profile.jpeg') }}" class="avatar img-fluid rounded me-1" /> <span
                                    class="text-dark">{{ Auth::user()->name }}</span>
                            </a>
                            @can('admin')
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="logout-admin">Log out</a>
                                </div>
                            @endcan
                            @cannot('admin')
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout-user') }}">Log out</a>
                                </div>
                            @endcannot
                        </li>
                    </ul>
                </div>
            </nav>


            <main class="content">
                @yield('container')

            </main>



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('static/js/app.js') }}"></script>

</body>

</html>
