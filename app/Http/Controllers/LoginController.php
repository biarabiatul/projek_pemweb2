<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->checkRemember)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->intended('/admin');
            } else {
                return redirect()->intended('/pengguna');
            }
        }

        return back()->withErrors([
            'name' => 'Tidak ada akun yang cocok dengan inputan anda'
        ])->onlyInput('name');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
