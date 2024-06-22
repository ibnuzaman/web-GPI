<x-app-layout-auth title="Reset Password">
    <div class="container container-forget">
        <div class="form-container">
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <h1>Reset Password</h1>
                <div class="form-group">
                    <!-- Alamat Email -->
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                        value="{{ old('email', $request->email) }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password Baru -->
                    <label for="password">Masukkan Password Baru Anda</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="New Password" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Konfirmasi Password -->
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button type="submit" class="btn btn-send">Kirim</button>
            </form>
        </div>
    </div>
</x-app-layout-auth>
