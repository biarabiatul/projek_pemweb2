<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanAlatController extends Controller
{
    public function show()
    {
        return view('pengguna.penggunaalat');
    }

    public function showForm($id)
    {
        $alat = AlatModel::find($id);

        if (!$alat) {
            abort(404);
        }

        // Fetch all data from ruangan table for dropdown
        $allRuangan = DB::table('ruangan')->select('id', 'nama_ruangan')->get();

        return view('pengguna.formPinjamAlat', [
            'alat' => $alat,
            'allRuangan' => $allRuangan,
        ]);
    }

    public function store(Request $request)
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

        // Simpan data peminjaman
        DB::table('peminjaman_alat')->insert([
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
}
