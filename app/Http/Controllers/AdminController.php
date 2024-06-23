<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use Illuminate\Routing\Controller;
use App\Models\PeminjamanAlat;

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
        // Ambil semua data peminjaman ruangan
        $peminjamanRuangan = PeminjamanRuangan::all();

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
        // Ambil semua data peminjaman alat
        $peminjamanAlat = PeminjamanAlat::all();

        // Tampilkan view dengan membawa data peminjaman alat
        return view('admin.adminalat', [
            'peminjamanAlat' => $peminjamanAlat,
        ]);
    }

    public function updateStatusAlat(Request $request, $id)
    {
        $pinjamAlat = PeminjamanAlat::findOrFail($id);
        $pinjamAlat->status = $request->status;
        $pinjamAlat->save();

        return redirect()->back()->with('success', 'Status peminjaman alat berhasil diperbarui.');
    }
}
