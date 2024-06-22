<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanSayaController extends Controller
{
    public function index()
    {
        // Menggunakan Query Builder untuk join antara tabel peminjaman_alat dan alat
        $pinjam_alat = DB::table('peminjaman_alat')
            ->join('alat', 'peminjaman_alat.alat_id', '=', 'alat.id')
            ->select('peminjaman_alat.*', 'alat.nama_alat', 'alat.stok', 'alat.deskripsi')
            ->get();

        // Menggunakan Query Builder untuk join antara tabel peminjaman_ruangan dan ruangan
        $reservasi_ruangan = DB::table('peminjaman_ruangan')
            ->join('ruangan', 'peminjaman_ruangan.ruangan_id', '=', 'ruangan.id')
            ->select('peminjaman_ruangan.*', 'ruangan.nama_ruangan')
            ->get();

        return view('pengguna.peminjamanSaya', compact('pinjam_alat', 'reservasi_ruangan'));
    }
}
