<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Products;
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
        $orders = Orders::where('status', 'diterima')->orderByDesc('created_at')->get();

        return view('admin.rekap-admin', compact('orders'));
    }

    public function konfirmasiBayar()
    {
        $orders = Orders::where('status', 'pending')->orderByDesc('created_at')->get();

        return view('admin.konfirmasi-admin', compact('orders'));
        // return view('admin.konfirmasi-admin');
    }

    // Method untuk menangani konfirmasi pembayaran
    public function confirm(Orders $order)
    {
        // Ubah status order menjadi diterima
        $order->status = 'diterima';
        $order->save();

        // Kurangi stok produk berdasarkan jumlah barang yang dibeli
        $product = Products::find($order->id); // Menggunakan $order->id karena Anda menggunakan 'id' sebagai product_id
        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        // Periksa apakah stok mencukupi sebelum mengurangi
        if ($product->stok >= $order->jumlah_beli) {
            $product->stok -= $order->jumlah_beli;
            $product->save();

            return redirect()->back()->with('success', 'Order berhasil diterima. Stok produk berhasil dikurangi.');
        } else {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }
    }



    // Method untuk menangani penolakan pembayaran
    public function reject(Orders $order)
    {
        // Update status order menjadi ditolak
        $order->status = 'ditolak';
        $order->save();

        return redirect()->back()->with('success', 'Order berhasil ditolak.');
        // return redirect()->back();
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
        return redirect()->back();
    }
}
