<x-app-layout-auth title="Lupa Password">
    <div class="container container-forget">
        <div class="form-container">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1>Lupa Password</h1>
                <div class="form-group">
                    <label for="forgot-password-email">Masukkan Email Anda</label>
                    <input type="email" class="form-control" id="forgot-password-email" placeholder="Email"
                        name="email" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-send">Kirim</button>
                <a class="btn btn-back" href="{{ route('home') }}">Kembali</a>
            </form>
        </div>
    </div>

</x-app-layout-auth>
