<?php

namespace App\Http\Controllers;

use App\Models\RuanganModel;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function show(){
        $data['ruangan'] = RuanganModel::all();

        return view('pengguna/penggunaruangan', $data);
    }
    public function showForm(){

        return view('pengguna/formPinjamRuangan');
    } 

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'description' => 'nullable',
        ]);

        RuanganModel::create($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully.');
    }

       
}
