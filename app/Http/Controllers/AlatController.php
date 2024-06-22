<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\RuanganModel;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function showAlat()
    {
        $daftar_alat = AlatModel::all(); // Ambil semua data ruangan dari model RuanganModel

        return view('pengguna.penggunaalat', [
            'daftar_alat' => $daftar_alat, // Kirimkan data ruangan ke view dengan nama 'ruangan_admin'
        ]);
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'nama_ruangan' => 'required|string',
            'kapasitas' => 'required|integer',
            'lokasi' => 'required|string',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses menyimpan gambar thumbnail jika ada
        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('thumbnails', 'public');
        }

        // Simpan data ke dalam database
        RuanganModel::create([
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'lokasi' => $request->lokasi,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('ruangan.showAdmin')->with('success', 'Room created successfully.');
    }
    public function delete(Request $request)
        {
            // Validasi terhadap id ruangan
            $request->validate([
                'id' => 'required|exists:ruangan,id',
            ]);

            // Temukan ruangan berdasarkan id dan hapus
            $ruangan = RuanganModel::findOrFail($request->id);
            $ruangan->delete();

            return redirect()->route('ruangan.showAdmin')->with('success', 'Room deleted successfully.');
        }

        public function edit($id)
            {
                // Temukan ruangan berdasarkan id
                $ruangan = RuanganModel::findOrFail($id);

                return view('admin/admineditruangan', compact('ruangan'));
            }

            public function update(Request $request, $id)
            {
                // Validasi data form
                $validatedData = $request->validate([
                    'nama_ruangan' => 'required|string',
                    'kapasitas' => 'required|integer',
                    'lokasi' => 'required|string',
                    'deskripsi' => 'nullable|string',
                    'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                // Temukan ruangan berdasarkan id
                $ruangan = RuanganModel::findOrFail($id);

                // Proses menyimpan gambar thumbnail jika ada
                $thumbnailPath = $ruangan->thumbnail;

                if ($request->hasFile('thumbnail')) {
                    $thumbnail = $request->file('thumbnail');
                    $thumbnailPath = $thumbnail->store('thumbnails', 'public');
                }

                // Update data ruangan
                $ruangan->update([
                    'nama_ruangan' => $request->nama_ruangan,
                    'kapasitas' => $request->kapasitas,
                    'lokasi' => $request->lokasi,
                    'deskripsi' => $request->deskripsi,
                    'thumbnail' => $thumbnailPath,
                ]);

                return redirect()->route('ruangan.showAdmin')->with('success', 'Room updated successfully.');
            }
}
