<x-app-layout-admin title="Edit Produk">

    <x-aside-admin />
    <button id="toggleAsideBtn" class="toggle-aside-btn d-md-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
        </svg>
    </button>

    <div class="main-content">
        <x-navbar-admin />

        <div class="content-container container mt-4">
            <h1>Edit Produk</h1>
            <div class="container input-container mt-5">
                <form action="{{ route('update-produk', ['id' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row pe-auto">
                        <label for="nama-produk">
                            <h5>Nama Produk</h5>
                        </label>
                        <input type="text" id="nama-produk" name="nama_produk" placeholder="Masukkan Nama Produk"
                            maxlength="200" value="{{ old('nama_produk', $product->nama_produk) }}">
                        @error('nama_produk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <label for="foto-produk">
                            <h5>Foto Produk</h5>
                        </label>
                        <input type="file" id="foto-produk" name="foto">
                        @if ($product->foto)
                            <p>Current Foto:</p>
                            <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk"
                                style="max-width: 100px;">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <label for="qty-produk">
                            <h5>Kuantitas</h5>
                        </label>
                        <input type="number" id="qty-produk" name="stok" placeholder="Masukkan Jumlah barang"
                            value="{{ old('stok', $product->stok) }}">
                        @error('stok')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <label for="harga-produk">
                            <h5>Harga</h5>
                        </label>
                        <input type="number" id="harga-produk" name="harga" placeholder="Masukkan Harga"
                            value="{{ old('harga', $product->harga) }}">
                        @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <hr>
                        <button type="submit" class="btn btn-simpan-edit">Simpan</button>
                        <a href="{{ route('admin.produk-admin') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout-admin>
