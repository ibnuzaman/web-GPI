<x-app-layout-admin title="Rekap Data Pembayaran">
    <x-aside-admin />

    <div class="main-content">
        <x-navbar-admin />

        <div class="content-container container mt-4">
            <h1 class="mb-4">Rekap Data</h1>
            <div class="row">
                <div class="col-xl-12">
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th>Nama Produk</th>
                                <th>Nama Customer</th>
                                <th>No. HP Customer</th>
                                <th>Jumlah Barang</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Status</th> <!-- Kolom untuk tombol aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->nama_produk }}</td>
                                    <td>{{ $order->nama_customer }}</td>
                                    <td>{{ $order->nomorHp }}</td>
                                    <td>{{ $order->jumlah_beli }}</td>
                                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Terima</button>
                                            </form>
                                            <form action="{{ route('admin.orders.reject', $order->id) }}"
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
