<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand ps-3" href="/"><img src="./assets/img/logo GPI.png" alt="" width="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mt-2 mb-lg-2 flex-grow-1 justify-content-center ps-3">
                <li class="nav-item ps-3">
                    <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item ps-3">
                    <a class="nav-link {{ Route::currentRouteName() == 'produk' ? 'active' : '' }}"
                        href="{{ route('produk') }}">Produk</a>
                </li>
                <li class="nav-item ps-3">
                    <a class="nav-link {{ Route::currentRouteName() == 'transaksi' ? 'active' : '' }}"
                        href="{{ route('transaksi') }}">Transaksi</a>
                </li>
            </ul>


            <div class="nav-button ps-lg-3 ps-4 pt-auto">
                <div class="nav-button ps-lg-3 ps-4 pt-auto">
                    @guest
                        <a href="{{ route('login') }}"><button class="login-btn pe-4">Masuk</button></a>
                        <a href="{{ route('register') }}"><button class="register-btn">Daftar</button></a>
                    @else
                        <div class="dropdown">
                            <button class="btn dropdown-toggle welcome-btn pe-4 ms-4" id="welcomeBtn" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, <span id="nav-username">{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    class="bi bi-person-fill" viewBox="0 0 16 20">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="welcomeBtn">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                        @csrf
                                        <button type="submit"
                                            style="border: none; background: none; padding: 0; margin: 0;">Logout</button>
                                    </form>
                                </li>
                                @if (Auth::user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard-admin') }}">Dashboard
                                            Admin</a></li>
                                @endif
                            </ul>
                        </div>
                    @endguest
                </div>

            </div>

        </div>
</nav>
