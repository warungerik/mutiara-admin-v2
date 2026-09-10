<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        return redirect()->route('admin.dashboard')->with('success', 'Berhasil masuk.');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        return redirect()->route('admin.dashboard')->with('success', 'Akun berhasil dibuat.');
    }

    public function forgotPassword(): View
    {
        return view('auth.forgot');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    public function logout(): RedirectResponse
    {
        return redirect()->route('login')->with('info', 'Anda telah keluar.');
    }
}
