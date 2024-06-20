@extends('layouts.main')
@section('container')

    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            padding: 10px;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>

    <div class="form-container">
        <h2>Form Peminjaman Ruangan</h2>
        <form>
            <div class="form-group">
                <label for="nama">Nama Pribadi/Organisasi</label>
                <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label for="kapasitas">Kapasitas Ruangan</label>
                <input type="number" class="form-control" id="kapasitas" placeholder="Masukkan kapasitas ruangan">
            </div>
            <div class="form-group">
                <label for="namaKegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" id="namaKegiatan" placeholder="Masukkan nama kegiatan">
            </div>
            <div class="form-group">
                <label for="waktuMulai">Waktu Mulai</label>
                <input type="datetime-local" class="form-control" id="waktuMulai">
            </div>
            <div class="form-group">
                <label for="waktuSelesai">Waktu Selesai</label>
                <input type="datetime-local" class="form-control" id="waktuSelesai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection