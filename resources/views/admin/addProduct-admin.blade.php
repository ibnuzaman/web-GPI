<x-app-layout-admin title="Tambah Produk">

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
            <h1>Tambah Produk</h1>
            <div class="container input-container mt-5">
                <form action="{{ route('store-produk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row pe-auto">
                        <label for="nama-produk">
                            <h5>Nama Produk</h5>
                        </label>
                        <input type="text" name="nama_produk" id="nama-produk" placeholder="Masukkan Nama Produk"
                            maxlength="200" required>
                        <hr>
                        <label for="foto-produk">
                            <h5>Foto Produk</h5>
                        </label>
                        <input type="file" name="foto" id="foto-produk" required>
                        <hr>
                        <label for="qty-produk">
                            <h5>Stok</h5>
                        </label>
                        <input type="number" name="stok" id="qty-produk" placeholder="Masukkan Jumlah barang"
                            required>
                        <hr>
                        <label for="harga-produk">
                            <h5>Harga</h5>
                        </label>
                        <input type="number" name="harga" id="harga-produk" placeholder="Masukkan Harga" required>
                        <hr>
                        <button type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout-admin>
