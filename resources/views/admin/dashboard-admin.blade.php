<x-app-layout-admin title="Dashboard Admin">
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
            <h1>Dashboard</h1>
            <div class="row">
                <div class="col-xl-8">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th colspan="6">
                                    <span class="judul-table">Konfirmasi Pembayaran</span>
                                </th>
                                <th colspan="2" style="text-align: right;">
                                    <button class="btn btn-lihat">Lihat Semua</button>
                                </th>
                            </tr>
                            <tr class="table-primary">
                                <th>ID</th>
                                <th>Produk</th>
                                <th>Nama Customer</th>
                                <th>No HP Customer</th>
                                <th>Jumlah Barang</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Produk A</td>
                                <td>John Doe</td>
                                <td>1234567890</td>
                                <td>2</td>
                                <td>2024-06-11</td>
                                <td>Rp100.000</td>
                                <td>Confirmed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xl-4">
                    <div class="card card-product border-0">
                        <div class="card-body">
                            <h4 class="card-title">Total Produk</h4>
                            <h1>30</h1>
                            <h6>Produk</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 mt-3">
                <table class="table table-borderless table-hover">
                    <thead class="table-header">
                        <tr>
                            <th colspan="2">
                                <span class="judul-table">Rekap Data Penjualan</span>
                            </th>
                            <th colspan="2" style="text-align: right;">
                                <button class="btn btn-lihat">Lihat Semua</button>
                            </th>
                        </tr>
                        <tr class="table-primary">
                            <th>Nama Barang</th>
                            <th>Jumlah Terjual</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Produk X</td>
                            <td>10</td>
                            <td>Rp500.000</td>
                            <td>2024-06-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout-admin>
