<x-app-layout title="Transaksi">
    <x-navbar />

    <section id="transaksi">
        <div class="container-fluid transaksi-container">
            <div class="header-transaksi pt-5">
                <h3>Arsip Pembayaran</h3>
            </div>
            <div class="table-responsive mt-3 pe-3 ps-3">
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
                <table class="table table-hover table-borderless table-transaksi">
                    <thead class="table-info">
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Nama Customer</th>
                            <th>Nomor HP</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->nama_produk }}</td>
                                <td>{{ $transaction->nama_customer }}</td>
                                <td>{{ $transaction->nomorHp }}</td>
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
