<x-app-layout title="Detail Produk">
    <x-navbar />

    <div class="container detail-container mt-5">
        <div class="row">
            <div class="col-xl-6">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $product->foto) }}" class="d-block w-100"
                                alt="{{ $product->nama_produk }}">
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
                    <h2>{{ $product->nama_produk }}</h2>
                    <p>Harga: Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
                    <p>Stok: {{ $product->stok }}</p>
                    <div class="mt-auto actions">
                        <div class="quantity">
                            <button onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="999" readonly>
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
                                    <form id="orderForm" action="{{ route('checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="form-group">
                                            <label for="customerName">Nama Customer:</label>
                                            <input type="text" class="form-control" id="customerName"
                                                name="customer_name" value="{{ Auth::user()->name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomorHp">Nomor Handphone:</label>
                                            <input type="text" class="form-control" id="nomorHp"
                                                value="{{ Auth::user()->nomorHp }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="orderTime">Waktu Pembelian:</label>
                                            <input type="text" class="form-control" id="orderTime"
                                                value="{{ now()->format('Y-m-d H:i:s') }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="productName">Nama Produk:</label>
                                            <input type="text" class="form-control" id="productName"
                                                value="{{ $product->nama_produk }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="productQuantity">Kuantitas Produk:</label>
                                            <input type="number" class="form-control" id="productQuantity"
                                                name="quantity" value="1" min="1" max="999" required
                                                onchange="updateTotalPrice()">
                                        </div>
                                        <div class="form-group">
                                            <label for="totalPrice">Total Harga:</label>
                                            <div id="totalPriceDisplay">
                                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Bayar</button>
                                        </div>
                                    </form>
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
    <script>
        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateModalQuantity(quantityInput.value); // Update modal quantity
                updateTotalPrice(); // Update total price
            }
        }

        function increaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            let max = parseInt(quantityInput.getAttribute('max'));

            if (currentValue < max) {
                quantityInput.value = currentValue + 1;
                updateModalQuantity(quantityInput.value); // Update modal quantity
                updateTotalPrice(); // Update total price
            }
        }

        function updateModalQuantity(value) {
            document.getElementById('productQuantity').value = value;
        }

        function updateTotalPrice() {
            var pricePerUnit = {{ isset($product) ? $product->harga : 0 }};
            var quantity = document.getElementById('quantity').value;
            var totalPrice = pricePerUnit * quantity;
            document.getElementById('totalPriceDisplay').innerText = 'Rp' + totalPrice.toLocaleString('id-ID');
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotalPrice();
        });
    </script>
</x-app-layout>
