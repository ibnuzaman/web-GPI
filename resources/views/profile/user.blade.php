<x-app-layout title="Profile">
    <x-navbar />
    {{-- {{ dd(Auth::user()->role) }} --}}

    {{-- Update Informasi Profile --}}
    <section id="profile">
        <div class="profile-container justify-content-center container">
            <div class="header-profile">
                <h2>Profile Saya</h2>
                <h5>Kelola Informasi Profile Anda</h5>
                <div class="profile-account fs-2 mb-3 container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                    <p>{{ Auth::user()->name }}</p>
                </div>
            </div>

            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')
                <div class="info-profile">
                    <!-- Username -->
                    <div class="item row">
                        <div class="col-auto username-label">
                            <label for="username">Username</label>
                        </div>
                        <div class="col-sm-10">
                            <input id="username" name="name" type="text" class="form-control"
                                value="{{ Auth::user()->name }}" required>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email -->
                    <div class="item row pt-3">
                        <div class="col-auto email-label">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-sm-10">
                            <input id="email" name="email" type="email" class="form-control"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Address -->
                    <div class="item row pt-3">
                        <div class="col-auto address-label">
                            <label for="address">Address</label>
                        </div>
                        <div class="col-sm-10 ">
                            <input id="address" name="alamat" type="text" class="form-control"
                                value="{{ Auth::user()->alamat ?? 'Alamat belum diisi' }}">
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                    </div>
                </div>

                <div class="text-center mt-5 pb-3">
                    <button type="submit" class="btn btn-simpan">
                        Simpan
                    </button>
                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Tersimpan') }}</p>
                    @endif
                </div>
            </form>

        </div>

        {{-- Update Password --}}
        <div class="upd-pw container profile-container mt-5 pt-5">
            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')

                <h2 class="text-center pb-4" style="font-weight: 600;">Update Password</h2>

                <div class="item row pt-3 justify-content-center ms-1">
                    <div class="col-auto password-label">
                        <label for="current-password">Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="current_password" placeholder="Password" id="current-password"
                            class="password ps-2 form-control @error('current_password', 'updatePassword') is-invalid @enderror">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="item row pt-3 m-auto justify-content-center me-4">
                    <div class="col-auto password-label">
                        <label for="new-password">New Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password" placeholder="Password Baru" id="new-password"
                            class="password ps-2 form-control @error('password', 'updatePassword') is-invalid @enderror">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="item row pt-3 m-auto justify-content-center me-5">
                    <div class="col-auto password-label">
                        <label for="confirm-password">Confirm Password</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                            id="confirm-password"
                            class="password ps-2 form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror">
                        @error('password_confirmation', 'updatePassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="justify-content-center text-center mt-5 pb-4">
                    <button type="submit" class="btn btn-simpan">
                        Simpan
                    </button>
                    @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-gray-600 dark:text-gray-400">{{ __('Tersimpan') }}</p>
                    @endif
                </div>

            </form>
        </div>
    </section>


    <x-button-whatsapp />

    <x-footer />
</x-app-layout>
