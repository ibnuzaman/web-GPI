<x-app-layout title="Produk">
    <x-navbar />

    <div class="container mt-5 pt-5">
        <!-- Search Bar -->
        <div class="row mb-4 search-bg">
            <div class="col-12">
                <form action="{{ route('search-produk') }}" method="GET">
                    <input type="text" class="form-control" name="query" id="searchBar" placeholder="Cari Produk">
                </form>
            </div>
        </div>

        <!-- Product List -->
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 pe-2 ps-2 pt-2">
                        <img src="{{ asset('storage/' . $product->foto) }}" class="card-img-top product-img"
                            alt="{{ $product->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama_produk }}</h5>
                            <p class="card-text">Stok: {{ $product->stok }}</p>
                            <p class="card-text">Harga: Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="{{ route('detail-produk', ['id' => $product->id]) }}" class="btn-beli"><button
                                    class="btn">Beli</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->onEachSide(5)->links('vendor.pagination.bootstrap-4') }}
    </div>
    <x-button-whatsapp />
    <x-footer />
</x-app-layout>
