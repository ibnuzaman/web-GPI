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

                {{-- Rekap Konfirmasi --}}
                <div class="col-xl-8">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th colspan="6">
                                    <span class="judul-table">Konfirmasi Pembayaran</span>
                                </th>
                                <th colspan="2" style="text-align: right;">
                                    <a href="{{ route('admin.konfirmasi-admin') }}" class="btn btn-lihat">Lihat
                                        Semua</a>
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
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->product->nama_produk }}</td>
                                    <td>{{ $order->nama_customer }}</td>
                                    <td>{{ $order->nomorHp }}</td>
                                    <td>{{ $order->jumlah_beli }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Card Toltal Produk --}}
                <div class="col-xl-4">
                    <div class="card card-product border-0">
                        <div class="card-body">
                            <h4 class="card-title">Total Produk</h4>
                            <h1>{{ $totalProducts }}</h1>
                            <h6>Produk</h6>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Rekap Data --}}
            <div class="col-xl-8 mt-3">
                <table class="table table-borderless table-hover">
                    <thead class="table-header">
                        <tr>
                            <th colspan="2">
                                <span class="judul-table">Rekap Data Penjualan</span>
                            </th>
                            <th colspan="2" style="text-align: right;">
                                <a href="{{ route('admin.rekap-admin') }}" class="btn btn-lihat">Lihat Semua</a>
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
                        @foreach ($rekapData as $data)
                            <tr>
                                <td>{{ $data->product->nama_produk }}</td>
                                <td>{{ $data->jumlah_beli }}</td>
                                <td>Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $data->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout-admin>
