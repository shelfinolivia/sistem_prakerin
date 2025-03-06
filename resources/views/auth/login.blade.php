<x-guest-layout>
    <div class="max-w-md mx-auto bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Login</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" class="text-gray-700 dark:text-gray-300" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                @error('email')
                    <x-input-error :messages="$message" class="mt-2 text-red-500" />
                @enderror
            </div>

           <!-- Password -->
            <div class="mt-4 relative">
                <x-input-label for="password" class="text-gray-700 dark:text-gray-300" :value="__('Password')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300 pr-12" type="password" name="password" required autocomplete="current-password" />
                    <span class="absolute inset-y-0 right-3 flex items-center justify-center h-full cursor-pointer" onclick="togglePassword()">
                        <i id="password-icon" class="fa fa-eye-slash text-gray-500"></i>
                    </span>
                </div>
                @error('password')
                    <x-input-error :messages="$message" class="mt-2 text-red-500" />
                @enderror
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-input-label for="role" class="text-gray-700 dark:text-gray-300" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300">
                    <option value="siswa" @selected(old('role') == 'siswa')>Siswa</option>
                    <option value="admin" @selected(old('role') == 'admin')>Admin</option>
                </select>
                @error('role')
                    <x-input-error :messages="$message" class="mt-2 text-red-500" />
                @enderror
            </div>

            <!-- Hak Akses (Hanya untuk Admin) -->
            <div id="hak-akses-container" class="mt-4 hidden">
                <x-input-label for="hak_akses" class="text-gray-700 dark:text-gray-300" :value="__('Hak Akses')" />
                <x-text-input id="hak_akses" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="text" name="hak_akses" value="{{ old('hak_akses') }}" placeholder="Masukkan hak akses admin" />
                @error('hak_akses')
                    <x-input-error :messages="$message" class="mt-2 text-red-500" />
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Register Link & Login Button -->
            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('register') }}">
                    {{ __('Don\'t have an account? Sign up') }}
                </a>

                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- JavaScript untuk Menampilkan Input Hak Akses -->
    <script>
        document.getElementById('role').addEventListener('change', function () {
            var hakAksesContainer = document.getElementById('hak-akses-container');
            if (this.value === 'admin') {
                hakAksesContainer.classList.remove('hidden');
            } else {
                hakAksesContainer.classList.add('hidden');
            }
        });

        function togglePassword() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('password-icon');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
</x-guest-layout>
