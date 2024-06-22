<x-app-layout title="Produk">
    <x-navbar />

    <div class="container mt-5 pt-5">
        <!-- Search Bar -->
        <div class="row mb-4 search-bg">
            <div class="col-12">
                <input type="text" class="form-control" id="searchBar" placeholder="Cari Produk">
            </div>
        </div>

        <!-- Product List -->
        <div class="row">
            <!-- Product Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 pe-2 ps-2 pt-2">
                    <img src="./assets/img/produk1.jpg" class="card-img-top product-img" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Stok: 10</p>
                        <p class="card-text">Harga: Rp100.000.000</p>
                        <a href="{{ route('detail-produk') }}" class="btn-beli"><button class="btn">Beli</button></a>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 pe-2 ps-2 pt-2">
                    <img src="./assets/img/produk2.jpg" class="card-img-top product-img" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Stok: 15</p>
                        <p class="card-text">Harga: Rp100.000.000</p>
                        <a href="detail-produk.html" class="btn-beli"><button class="btn">Beli</button></a>
                    </div>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 pe-2 ps-2 pt-2">
                    <img src="./assets/img/produk3.jpg" class="card-img-top product-img" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Stok: 5</p>
                        <p class="card-text">Harga: Rp100.000.000</p>
                        <a href="detail-produk.html" class="btn-beli"><button class="btn">Beli</button></a>
                    </div>
                </div>
            </div>
            <!-- Product Card 4 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100 pe-2 ps-2 pt-2">
                    <img src="./assets/img/produk4.jpg" class="card-img-top product-img" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Product 4</h5>
                        <p class="card-text">Stok: 20</p>
                        <p class="card-text">Harga: Rp100.000.000</p>
                        <a href="detail-produk.html" class="btn-beli"><button class="btn">Beli</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="floating-whatsapp-button">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="#" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    </div>

    <x-footer />
</x-app-layout>
