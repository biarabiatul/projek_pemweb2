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
}
