<x-app-layout-admin title="Konfirmasi Pembayaran">
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
            <h1>Konfirmasi Pembayaran</h1>
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
                            <tr class="table-primary">
                                <th>ID</th>
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>No.Hp Customer</th>
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
                                    <td>{{ $order->nama_produk }}</td>
                                    <td>{{ $order->nama_customer }}</td>
                                    <td>{{ $order->nomorHp }}</td>
                                    <td>{{ $order->jumlah_beli }}</td>
                                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <form action="{{ route('admin.orders.diterima', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Terima</button>
                                            </form>
                                            <form action="{{ route('admin.orders.ditolak', $order->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                            </form>
                                        @else
                                            <span>{{ $order->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout-admin>
