<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanAlat;
use App\Models\PeminjamanRuangan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function show()
    {
        return view('admin/admin');
    }
    public function showalat()
    {
        return view('admin/adminalat');
    }
    public function showtempat()
    {
        return view('admin/admintempat');
    }
    public function dataalat()
    {
        return view('admin/dataalat');
    }
    public function dataruangan()
    {
        return view('admin/dataruangan');
    }
    public function laporan()
    {
        return view('admin/laporan');
    }
    public function manajemenPeminjamanRuangan()
{
    // Menggunakan query builder untuk join tabel peminjaman_ruangan dengan ruangan
    $peminjamanRuangan = DB::table('peminjaman_ruangan')
        ->join('ruangan', 'peminjaman_ruangan.ruangan_id', '=', 'ruangan.id')
        ->select(
            'peminjaman_ruangan.*',
            'ruangan.nama_ruangan'
        )
        ->get();

    // Tampilkan view dengan membawa data peminjaman ruangan
    return view('admin.admintempat', [
        'peminjamanRuangan' => $peminjamanRuangan,
    ]);
}


    public function updateStatusRuangan(Request $request, $id)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman ruangan berhasil diperbarui.');
    }

    public function manajemenPeminjamanAlat()
{
    // Menggunakan query builder untuk join tabel peminjaman_alat dengan alat
    $peminjamanAlat = DB::table('peminjaman_alat')
        ->join('alat', 'peminjaman_alat.alat_id', '=', 'alat.id')
        ->select(
            'peminjaman_alat.*',
            'alat.nama_alat'
        )
        ->get();

    // Tampilkan view dengan membawa data peminjaman alat
    return view('admin.adminalat', [
        'peminjamanAlat' => $peminjamanAlat,
    ]);
}

    public function updateStatusAlat(Request $request, $id)
    {
        $pinjamAlat = DB::table('peminjaman_alat')->where('id', $id)->first();

        if ($pinjamAlat->status !== 'disetujui' && $request->status === 'disetujui') {
            $jumlah_peminjaman = $pinjamAlat->jumlah_peminjaman;

            DB::table('alat_models')->where('id', $pinjamAlat->alat_id)->decrement('stok', $jumlah_peminjaman);
        }

        DB::table('peminjaman_alats')->where('id', $id)->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status peminjaman alat berhasil diperbarui.');
    }


    public function laporanPeminjaman()
{
    // Menggunakan query builder untuk join tabel peminjaman_alat dengan alat
    $peminjamanAlat = DB::table('peminjaman_alat')
        ->join('alat', 'peminjaman_alat.alat_id', '=', 'alat.id')
        ->select(
            'peminjaman_alat.*',
            'alat.nama_alat'
        )
        ->get();

    // Menggunakan query builder untuk join tabel peminjaman_ruangan dengan ruangan
    $peminjamanRuangan = DB::table('peminjaman_ruangan')
        ->join('ruangan', 'peminjaman_ruangan.ruangan_id', '=', 'ruangan.id')
        ->select(
            'peminjaman_ruangan.*',
            'ruangan.nama_ruangan'
        )
        ->get();

    // Tampilkan view dengan membawa data peminjaman alat dan ruangan
    return view('admin.laporan', [
        'peminjamanAlat' => $peminjamanAlat,
        'peminjamanRuangan' => $peminjamanRuangan,
    ]);
}
}
