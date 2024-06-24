<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {
        // Ambil semua data transaksi dari tabel orders
        $transactions = Orders::orderBy('created_at', 'desc')->get();

        return view('transaksi.transaksi', [
            'transactions' => $transactions
        ]);
    }

    public function checkout(Request $request)
    {
        // Ambil data produk dari request (biasanya dari form checkout)
        $id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Temukan produk berdasarkan ID
        $product = Products::find($id);

        if (!$product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        // Hitung total harga berdasarkan harga produk dan jumlah yang dibeli
        $total_harga = $product->harga * $quantity;

        // Simpan data order ke dalam database
        $order = new Orders();
        $order->product_id = $product->id;
        $order->user_id = Auth::id(); // Ambil ID user yang sedang login
        $order->nama_customer = $request->input('nama_customer');
        $order->no_hp_customer = $request->input('no_hp_customer');
        $order->jumlah_barang = $quantity;
        $order->total_harga = $total_harga;
        $order->status = 'pending'; // Set status awal pending
        $order->save();

        // Redirect ke halaman atau route yang sesuai setelah checkout
        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat.');
    }
}
