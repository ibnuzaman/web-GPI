<x-app-layout-auth title="Auth Admin">
    <x-button-back-auth />

    <div class="container active" id="container">
        {{-- <div class="form-container sign-up"> --}}
        <form method="POST" action="{{ route('store.admin') }}">
            @csrf
            <h1>Buat Akun Admin</h1>
            <span></span>
            <input type="text" placeholder="Nama" name="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            <input type="email" placeholder="E-mail" name="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            <input type="text" placeholder="Alamat" name="alamat" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
            <input type="tel" placeholder="No. Handphone"name="nomorHp" />
            <x-input-error class="mt-2" :messages="$errors->get('nomorHp')" />
            <input type="password" placeholder="Password" name="password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
            <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
            <input type="hidden" name="role" id="role" value="admin">
            <button type="submit">Daftar</button>
            @if (session('success'))
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ session('success') }}</p>
            @endif
        </form>
        {{-- </div> --}}
    </div>
</x-app-layout-auth>
