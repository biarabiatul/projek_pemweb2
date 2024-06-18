<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function dataruangan() 
    {
        return view('admin/dataruangan');
    }
    public function dataalat() 
    {
        return view('admin/dataalat');
    }
    public function laporan() 
    {
        return view('admin/laporan');
    }
    public function peminjamanSaya() 
    {
        return view('admin/peminjamanSaya');
    }

    public function penggunaruangan() 
    {
        return view('pengguna/penggunaruangan');
    }
}
