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
        // Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan produk berdasarkan ID
        $product = Products::findOrFail($validated['product_id']);

        // Hitung total harga berdasarkan harga produk dan jumlah yang dibeli
        $total_harga = $product->harga * $validated['quantity'];

        // Simpan data order ke dalam database menggunakan mass assignment
        $order = Orders::create([
            'product_id' => $product->id,
            'nama_produk' => $product->nama_produk,
            'user_id' => Auth::id(),
            'nama_customer' => Auth::user()->name, // Menggunakan nama user yang sedang login
            'nomorHp' => Auth::user()->nomorHp,    // Menggunakan nomorHp user yang sedang login
            'jumlah_beli' => $validated['quantity'],
            'total_harga' => $total_harga,
            'waktu_beli' => now(),
            'status' => 'pending',
        ]);

        $waLink = 'https://wa.me/6288215571069?text=' . urlencode("Halo saya ingin mengkonfirmasi pesanan
        Nomor Pesanan: {$order->id}
        Nama: {$order->customer_name}
        Nomor Telepon: {$order->nomor_hp}
        Waktu Pembelian: {$order->order_time}
        Nama Produk: {$order->product->nama_produk}
        Kuantitas Produk: {$order->quantity}
        Total Harga: Rp" . number_format($order->total_price, 0, ',', '.'));

        // Redirect ke halaman konfirmasi dengan pesan sukses dan link WhatsApp
        return redirect()->route('transaksi')->with([
            'success' => 'Pesanan berhasil dibuat.',
            'waLink' => $waLink
        ]);

        // Redirect ke halaman atau route yang sesuai setelah checkout
        // return redirect()->route('transaksi')->with('success', 'Pesanan berhasil dibuat.');
        // return redirect()->back();

    }
}
