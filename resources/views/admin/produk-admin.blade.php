<x-app-layout-admin title="Produk">
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
            <h1>Produk</h1>
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
            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="4">
                                    <span class="judul-table"></span>
                                </th>
                                <th colspan="2" style="text-align: right;">
                                    <a href="{{ route('add-produk') }}">
                                        <button class="btn btn-add-product">Tambah Produk</button>
                                    </a>
                                </th>
                            </tr>
                            <tr class="table-primary">
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Foto Produk</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->nama_produk }}</td>
                                    <td>
                                        @if ($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}" alt="Foto Produk"
                                                style="max-width: 100px;">
                                        @else
                                            Foto tidak tersedia
                                        @endif
                                    </td>
                                    <td>{{ $product->stok }}</td>
                                    <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('edit-produk', $product->id) }}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
                                        <form action="{{ route('hapus-produk', $product->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>

    </div>

</x-app-layout-admin>
