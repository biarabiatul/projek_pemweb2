<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\PeminjamanAlat;
use App\Models\PeminjamanRuangan;
use App\Models\RuanganModel;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Menggunakan Eloquent untuk mengambil data peminjaman alat
        $pinjam_alat = PeminjamanAlat::with('alat')->get();

        // Menggunakan Eloquent untuk mengambil data peminjaman ruangan
        $reservasi_ruangan = PeminjamanRuangan::with('ruangan')->get();

        return view('pengguna.peminjamanSaya', compact('pinjam_alat', 'reservasi_ruangan'));
    }

    public function showAlat()
    {
        return view('pengguna.penggunaalat');
    }

    public function showFormAlat($id)
    {
        $alat = AlatModel::find($id);

        if (!$alat) {
            abort(404);
        }

        // Fetch all data from ruangan table for dropdown
        $allRuangan = RuanganModel::select('id', 'nama_ruangan')->get();

        return view('pengguna.formPinjamAlat', [
            'alat' => $alat,
            'allRuangan' => $allRuangan,
        ]);
    }

    public function storeAlat(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'alat_id' => 'required|exists:alat,id',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jumlahPinjam' => 'required|integer|min:1',
            'keperluan' => 'required|string|max:255',
            'jamPinjam' => 'required|date',
            'jamKembali' => 'required|date|after:jamPinjam',
            'nohp' => 'required|string|max:15',
            'ruang' => 'required|exists:ruangan,id',
        ]);

        // Simpan data peminjaman menggunakan model
        PeminjamanAlat::create([
            'alat_id' => $validatedData['alat_id'],
            'nama_peminjam' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'jumlah_pinjam' => $request->input('jumlahPinjam'),
            'keperluan' => $request->input('keperluan'),
            'jam_pinjam' => $request->input('jamPinjam'),
            'jam_kembali' => $request->input('jamKembali'),
            'no_hp' => $request->input('nohp'),
            'ruangan_id' => $request->input('ruang'),
            'status' => 'pending'
        ]);

        return redirect()->route('peminjaman.saya')->with('success', 'Peminjaman alat berhasil dibuat.');
    }

    public function showFormRuangan($id)
    {
        $ruangan = RuanganModel::find($id);

        if (!$ruangan) {
            abort(404);
        }

        return view('pengguna.formPinjamRuangan', [
            'ruangan' => $ruangan,
        ]);
    }

    public function storeRuangan(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'jumlahPeserta' => 'required|integer|min:1',
            'keperluan' => 'required|string|max:255',
            'jamMulai' => 'required|date',
            'jamSelesai' => 'required|date|after:jamMulai',
            'nohp' => 'required|string|max:15',
        ]);

        // Simpan data peminjaman ruangan
        PeminjamanRuangan::create([
            'ruangan_id' => $validatedData['ruangan_id'],
            'nama_peminjam' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'prodi' => $request->input('prodi'),
            'jumlah_peserta' => $request->input('jumlahPeserta'),
            'keperluan' => $request->input('keperluan'),
            'jam_mulai' => $request->input('jamMulai'),
            'jam_selesai' => $request->input('jamSelesai'),
            'no_hp' => $request->input('nohp'),
            'status' => 'pending'
        ]);

        return redirect()->route('peminjaman.saya')->with('success', 'Peminjaman ruangan berhasil dibuat.');
    }
}
