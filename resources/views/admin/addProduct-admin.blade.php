<x-app-layout-admin title="Tambah Produk">

    <x-aside-admin />
    <button id="toggleAsideBtn" class="toggle-aside-btn d-md-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
        </svg>
    </button>

    <div class="main-content">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Add New Admin</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content-container container mt-4">
            <h1>Tambah Produk</h1>
            <div class="container input-container mt-5">
                <form action="POST">
                    <div class="row pe-auto">
                        <label for="nama-produk">
                            <h5>Nama Produk</h5>
                        </label>
                        <input type="text" id="nama-produk" placeholder="Masukkan Nama Produk" maxlength="200">
                        <hr>
                        <label for="foto-produk">
                            <h5>Foto Produk</h5>
                        </label>
                        <input type="file" id="foto-produk">
                        <hr>
                        <label for="qty-produk">
                            <h5>Kuantitas</h5>
                        </label>
                        <input type="number" id="qty-produk" placeholder="Masukkan Jumlah barang">
                        <hr>
                        <label for="harga-produk">
                            <h5>Harga</h5>
                        </label>
                        <input type="number" id="harga-produk" placeholder="Masukkan Harga">
                        <hr>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout-admin>
