@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Alat</h5>
                    <form action="{{ route('alat.update', $alat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama_alat" class="form-label">Nama Alat</label>
                            <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ old('nama_alat', $alat->nama_alat) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $alat->stok) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="baik" {{ old('status', $alat->status) == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak ringan" {{ old('status', $alat->status) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="rusak berat" {{ old('status', $alat->status) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('alat.showAdminalat') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
