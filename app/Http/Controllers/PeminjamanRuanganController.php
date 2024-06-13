<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        $peminjaman_ruangan = PeminjamanRuangan::all();
        return view('peminjaman_ruangan.index', compact('peminjaman_ruangan'));
    }

    public function create()
    {
        return view('formPinjamRuangan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'kegiatan' => 'required|string|max:255',
            'waktu_mulai' => 'required|date_format:H:i', // Format waktu HH:ii
            'waktu_selesai' => 'required|date_format:H:i', // Format waktu HH:ii
        ]);

        // Simpan data peminjaman ruangan
        PeminjamanRuangan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman_ruangan.index') // Belum ada route
                        ->with('success', 'Peminjaman ruangan berhasil dibuat.');
    }

    public function show($id)
    {
        $peminjaman_ruangan = PeminjamanRuangan::find($id);
        return view('peminjaman_ruangan.show', compact('peminjaman_ruangan'));
    }

    public function edit($id)
    {
        $peminjaman_ruangan = PeminjamanRuangan::find($id);
        return view('peminjaman_ruangan.edit', compact('peminjaman_ruangan'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Perbarui data peminjaman ruangan
        PeminjamanRuangan::find($id)->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman_ruangan.index')
                        ->with('success', 'Peminjaman ruangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data peminjaman ruangan
        PeminjamanRuangan::find($id)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('peminjaman_ruangan.index')
                        ->with('success', 'Peminjaman ruangan berhasil dihapus.');
    }
        
}
