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
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();

            if ($request->has('remember')) {
                $rememberToken = Auth::user()->getRememberToken();
                $minutes = 60*24*30; // Berlaku 30 hari

                cookie()->queue('remember_token', $rememberToken, $minutes);
            }
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->withInput($request->only('nim', 'remember'))->withErrors([
            'nim' => 'NIM/NIP anda tidak cocok.',
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
