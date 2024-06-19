<x-app-layout title="Transaksi">
    <x-navbar />
    <section id="transaksi">
        <div class="container-fluid transaksi-container">
            <div class="header-transaksi pt-5">
                <h3>Arsip Pembayaran</h3>
            </div>
            <div class="table-responsive mt-3 pe-3 ps-3">
                <table class="table table-hover table-borderless table-transaksi">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Jenis Pengiriman</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data transaksi akan ditambahkan di sini -->
                        <tr>
                            <td>1</td>
                            <td>Produk A</td>
                            <td>Diambil</td>
                            <td>31-12-2024</td>
                            <td>Rp 100.000</td>
                            <td>Sukses</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Produk B</td>
                            <td>Diantar</td>
                            <td>31-12-2024</td>
                            <td>Rp 200.000</td>
                            <td>Sukses</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <div class="floating-whatsapp-button">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="#" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    </div>
    <x-footer />
</x-app-layout>
