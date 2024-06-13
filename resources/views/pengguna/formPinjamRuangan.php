<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman Ruangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Form Peminjaman Ruangan</h2>
    <form>
        <div class="form-group">
            <label for="nama">Nama</label>
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
</body>
</html>