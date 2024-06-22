<x-app-layout title="Detail Produk">

    <x-navbar />

    <div class="container detail-container mt-5">
        <div class="row">
            <div class="col-xl-6">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./assets/img/produk1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/img/produk2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./assets/img/produk3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="product-info">
                    <h2>Product Name</h2>
                    <p>Harga: Rp100.000</p>
                    <p>Stok: 20</p>
                    <p>Deskripsi: This is a great product.</p>
                    <div class=" mt-auto actions">
                        <div class="quantity">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="999">
                            <button onclick="increaseQuantity()">+</button>
                        </div>
                        <button class="btn btn-dtl-beli" data-bs-toggle="modal"
                            data-bs-target="#orderModal">Beli</button>
                        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="orderForm">
                                            <div class="form-group">
                                                <label for="customerName">Nama Customer:</label>
                                                <input type="text" class="form-control" id="customerName" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="orderTime">Waktu Pembelian:</label>
                                                <input type="text" class="form-control" id="orderTime" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="productName">Nama Produk:</label>
                                                <input type="text" class="form-control" id="productName" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="productQuantity">Kuantitas Produk:</label>
                                                <input type="number" class="form-control" id="productQuantity"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="totalPrice">Total Harga:</label>
                                                <input type="text" class="form-control" id="totalPrice" readonly>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Kembali</button>
                                        <button type="button" class="btn btn-primary">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-button-whatsapp />

        <x-footer />



</x-app-layout>
