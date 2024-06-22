<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard-admin');
    }

    public function produk()
    {
        return view('admin.produk-admin');
    }

    public function rekapData()
    {
        return view('admin.rekap-admin');
    }
    public function konfirmasiBayar()
    {
        return view('admin.konfirmasi-admin');
    }
    public function tambahAdmin()
    {
        return view('auth.register-admin');
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'alamat' => ['required', 'string', 'max:255'],
            'nomorHp' => ['required', 'string', 'max:16'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required', 'in:admin,customer'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nomorHp' => $request->nomorHp,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        session()->flash('success', 'Akun berhasil didaftarkan.');

        // dd($request->all());
        return redirect()->back();
    }
}
