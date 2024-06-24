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
                            <th>Nama Customer</th>
                            <th>No HP Customer</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->product->nama_produk }}</td>
                                <td>{{ $transaction->nama_customer }}</td>
                                <td>{{ $transaction->no_hp_customer }}</td>
                                <td>{{ $transaction->jumlah_barang }}</td>
                                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $transaction->status }}</td>
                            </tr>
                        @endforeach
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
