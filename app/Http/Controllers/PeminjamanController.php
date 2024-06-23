<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\RuanganModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanAlat;
use App\Models\PeminjamanRuangan;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
{
    // Menggunakan Eloquent untuk mengambil data peminjaman alat
    $pinjam_alat = DB::table('peminjaman_alat')
        ->join('alat', 'peminjaman_alat.alat_id', '=', 'alat.id')
        ->select('peminjaman_alat.*', 'alat.*')
        ->get();

    // Menggunakan query builder untuk join tabel peminjaman_ruangan dan ruangan
    $reservasi_ruangan = DB::table('peminjaman_ruangan')
        ->join('ruangan', 'peminjaman_ruangan.ruangan_id', '=', 'ruangan.id')
        ->select('peminjaman_ruangan.*', 'ruangan.nama_ruangan as nama_ruangan')
        ->get();

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
        // Validasi request
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah_peserta' => 'required|integer',
            'namaKegiatan' => 'required|string|max:255',
            'waktuMulai' => 'required|date',
            'waktuSelesai' => 'required|date|after_or_equal:waktuMulai',
            'ruangan_id' => 'required|exists:ruangan,id'
        ]);

        // Simpan data ke dalam database
        PeminjamanRuangan::create([
            'nama_peminjam' => $request->nama,
            'jumlah_peserta' => $request->jumlah_peserta,
            'nama_kegiatan' => $request->namaKegiatan,
            'waktu_mulai' => $request->waktuMulai,
            'waktu_selesai' => $request->waktuSelesai,
            'ruangan_id' => $request->ruangan_id
        ]);

        // Redirect ke halaman peminjaman saya dengan pesan sukses
        return redirect()->route('peminjaman.saya')->with('success', 'Peminjaman berhasil diajukan!');
    }

    public function searchRuang(Request $request)
    {
        $nama_peminjam = $request->input('nama_peminjam');

        // Query untuk mencari data berdasarkan nama peminjam
        $peminjamanRuangan = PeminjamanRuangan::where('nama_peminjam', 'like', '%' . $nama_peminjam . '%')->get();

        return view('admin.admintempat', compact('peminjamanRuangan'));
    }
    
    public function searchAlat(Request $request)
    {
        $nama_peminjam = $request->input('nama_peminjam');

        // Query untuk mencari data berdasarkan nama peminjam
        $peminjamanRuangan = PeminjamanRuangan::where('nama_peminjam', 'like', '%' . $nama_peminjam . '%')->get();

        return view('admin.admintempat', compact('peminjamanRuangan'));
    }


}
