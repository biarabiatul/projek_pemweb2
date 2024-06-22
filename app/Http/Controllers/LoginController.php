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
        $credentials = $request->only('nim', 'password');

        // Lakukan validasi dengan menggunakan method Auth::attempt
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Jika autentikasi berhasil, dapatkan user yang terautentikasi
            $user = Auth::user();

            // Set cookie jika opsi "Remember Me" dicentang
            if ($request->has('remember')) {
                $rememberToken = Auth::user()->getRememberToken();
                $minutes = 60*24*30; // Contoh: cookie berlaku selama 30 hari

                // Set cookie dengan remember_token
                cookie()->queue('remember_token', $rememberToken, $minutes);
            }

            // Redirect ke halaman setelah login
            return redirect()->intended('/dashboard');
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withInput($request->only('nim', 'remember'))->withErrors([
            'nim' => 'NIM anda tidak cocok.',
        ]);

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
