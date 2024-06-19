<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/login.css" />
    <title>Register Page</title>
</head>

<body>
    <button id="back-button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#2A4264"
            class="bi bi-arrow-left" viewBox="0 0 16 14">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg></button>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('store.register') }}">
                @csrf
                <h1>Buat Akun</h1>
                <span></span>
                <input type="text" placeholder="Nama" name="name" />
                <input type="email" placeholder="E-mail" name="email" />
                <input type="alamat" placeholder="Alamat" name="alamat" />
                <input type="tel" placeholder="No. Handphone"name="nomorHp" />
                <input type="password" placeholder="Password" name="password" />
                <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" />
                <button type="submit">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Masuk</h1>
                <span></span>
                <input type="email" placeholder="Email" />
                <input type="password" placeholder="Password" />
                <a href="#">Lupa Password?</a>
                <button>Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Sudah punya</h1>
                    <h1>akun?</h1>
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Belum punya</h1>
                    <h1>akun?</h1>
                    <button class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/main.js"></script>
</body>

</html>
