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

    public function showAdminalat()
    {
        $alats = AlatModel::all();
        return view('admin.dataalat', compact('alats'));
    }
    public function store(Request $request)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'stok' => 'required|integer',
            'deskripsi' => 'required|text',
        ]);
        
        // Simpan data ke dalam database
        AlatModel::create([
            'nama_alat' => $validatedData['nama_alat'],
            'stok' => $validatedData['stok'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);
        
        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('alat.showAdminalat')->with('success', 'Alat created successfully.');
    }
    
    public function edit($id)
    {
        $alat = AlatModel::findOrFail($id);
        return view('admin.admineditalat', compact('alat'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_alat' => 'required|string|max:255',
            'stok' => 'required|integer',
            'deskripsi' => 'required|deskripsi',
        ]);
    
        $alat = AlatModel::findOrFail($id);
        $alat->update($validatedData);
    
        return redirect()->route('alat.showAdminalat')->with('success', 'Data alat berhasil diperbarui.');
    }
    

    public function delete($id)
    {
        $alat = AlatModel::findOrFail($id);
        $alat->delete();
        return redirect()->route('alat.showAdminalat');
    }
}
