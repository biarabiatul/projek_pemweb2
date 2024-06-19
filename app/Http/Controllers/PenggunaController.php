<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function show()
    {
        return view('pengguna/pengguna');
    }
    public function showRuangan()
    {
        return view('pengguna/penggunaruangan');
    }
    
}
