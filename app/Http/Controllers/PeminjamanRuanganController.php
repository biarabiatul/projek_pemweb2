<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RuanganModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanRuangan;
use Illuminate\Support\Facades\DB;

class PeminjamanRuanganController extends Controller
{

public function showForm($id)
{
    $ruangan = RuanganModel::find($id);

    if (!$ruangan) {
        abort(404);
    }

    return view('pengguna/formPinjamRuangan', [
        'ruangan' => $ruangan,
    ]);
}


public function store(Request $request)
{
    // Validasi request
    $request->validate([
        'nama' => 'required|string|max:255',
        'jumlah_peserta' => 'required|integer',
        'namaKegiatan' => 'required|string|max:255',
        'waktuMulai' => 'required|date',
        'waktuSelesai' => 'required|date|after_or_equal:waktuMulai',
        'ruangan_id' => 'required|exists:ruangan,id' // Pastikan ruangan_id valid
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



    public function adminIndex()
    {
        // Mengambil semua data peminjaman untuk admin
        $peminjaman = PeminjamanRuangan::all();

        return view('admin/adminPinjamRuangan', compact('peminjaman'));
    }

    public function updateStatus(Request $request, $id)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $peminjaman->status = $request->status;
        $peminjaman->save();

        return redirect()->route('admin.peminjaman.index')->with('success', 'Status peminjaman berhasil diperbarui');
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
