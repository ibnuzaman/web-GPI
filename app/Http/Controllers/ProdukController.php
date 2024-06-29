<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Products;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('produk.produk');
        // Ambil semua produk dari database
        $products = Products::paginate(8);

        // Kirim data produk ke view
        return view('produk.produk', compact('products'));
    }

    public function detailProduk()
    {
        return view('test');
    }

    public function addProduk()
    {
        return view('admin.addProduct-admin');
    }

    public function editProduk($id)
    {
        $product = Products::findOrFail($id);

        return view('admin.editProduct-admin', compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $products = Products::all();
        $products = Products::paginate(3);
        return view('admin.produk-admin', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function storeProduk(Request $request)
    {
        // Definisikan aturan validasi
        $rules = [
            'nama_produk' => 'required|min:5',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format file :attribute harus jpeg, png, jpg, gif, atau svg.',
            'max' => 'Ukuran file :attribute tidak boleh lebih dari :max kilobytes.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
        ];

        // validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Validasi gagal
        if ($validator->fails()) {
            return redirect()->route('add-produk')->withErrors($validator)->withInput();
        }

        // Buat instance produk baru
        $produk = new Products();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        // Upload dan simpan foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('product_images', 'public');
            $produk->foto = $filePath;
        }

        // Simpan produk ke database
        $produk->save();

        //  respons json sukses dengan data produk
        // return response()->json(['message' => 'Product added successfully!', 'produk' => $produk], 200);
        // respon bener

        return redirect()->route('add-produk')->with('success', 'Produk Berhasil ditambah!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::findOrFail($id);

        return view('produk.detail-produk', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updateProduk(Request $request, $id)
    {
        // dd($request->method());

        $rules = [
            'nama_produk' => 'required|min:5',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ];
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'min' => 'Kolom :attribute minimal :min karakter.',
            'image' => 'File harus berupa gambar.',
            'mimes' => 'Format file :attribute harus jpeg, png, jpg, gif, atau svg.',
            'max' => 'Ukuran file :attribute tidak boleh lebih dari :max kilobytes.',
            'numeric' => 'Kolom :attribute harus berupa angka.',
        ];

        // validasi
        $validator = Validator::make($request->all(), $rules, $messages);

        // Validasi gagal
        if ($validator->fails()) {
            return redirect()->route('update-produk', ['id' => $id])->withErrors($validator)->withInput();
        }

        // Cari produk berdasarkan id
        $produk = Products::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        // Upload dan simpan foto jika ada
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filePath = $file->store('product_images', 'public');
            $produk->foto = $filePath;

            // Hapus foto lama jika ada
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
        }

        // Simpan perubahan produk ke database
        $produk->save();

        return redirect()->route('edit-produk', ['id' => $id])->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusProduk(string $id)
    {
        $produk = Products::findOrFail($id);
        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        // Hapus produk dari database
        $produk->delete();

        // return redirect()->route('edit-produk', ['id' => $id])->with('success', 'Produk berhasil dihapus.');
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Pencarian produk berdasarkan ID atau nama dengan paginasi
        $products = Products::where('id', $query)
            ->orWhere('nama_produk', 'like', '%' . $query . '%')
            ->paginate(10); // Paginasi dengan 10 item per halaman

        // Kirim data produk yang ditemukan ke view
        return view('produk.produk', compact('products'));
    }
}
