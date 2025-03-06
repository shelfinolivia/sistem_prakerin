<x-guest-layout>
    <div class="max-w-md mx-auto bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" class="text-gray-700 dark:text-gray-300" :value="__('Full Name')" />
                <x-text-input id="name" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" class="text-gray-700 dark:text-gray-300" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <x-input-label for="password" class="text-gray-700 dark:text-gray-300" :value="__('Password')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full pr-12 border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="password" name="password" required autocomplete="new-password" />
                    <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password', 'password-icon')">
                        <i id="password-icon" class="fa fa-eye-slash text-gray-500"></i>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 relative">
                <x-input-label for="password_confirmation" class="text-gray-700 dark:text-gray-300" :value="__('Confirm Password')" />
                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full pr-12 border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer" onclick="togglePassword('password_confirmation', 'password-confirm-icon')">
                        <i id="password-confirm-icon" class="fa fa-eye-slash text-gray-500"></i>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
            </div>

            <!-- Role Selection -->
            <div class="mt-4">
                <x-input-label for="role" class="text-gray-700 dark:text-gray-300" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300">
                    <option value="siswa" class="text-gray-900 dark:text-gray-300">Siswa</option>
                    <option value="admin" class="text-gray-900 dark:text-gray-300">Admin</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500" />
            </div>

            <!-- Hak Akses (Hanya untuk Admin) -->
            <div id="hak-akses-container" class="mt-4 hidden">
                <x-input-label for="hak_akses" class="text-gray-700 dark:text-gray-300" :value="__('Hak Akses')" />
                <x-text-input id="hak_akses" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 text-gray-900 dark:text-gray-200 rounded-lg shadow-sm focus:ring focus:ring-indigo-300" type="text" name="hak_akses" placeholder="Masukkan hak akses admin" />
                <x-input-error :messages="$errors->get('hak_akses')" class="mt-2 text-red-500" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <!-- JavaScript untuk Menampilkan Input Hak Akses & Toggle Password -->
    <script>
        document.getElementById('role').addEventListener('change', function () {
            var hakAksesContainer = document.getElementById('hak-akses-container');
            if (this.value === 'admin') {
                hakAksesContainer.classList.remove('hidden');
            } else {
                hakAksesContainer.classList.add('hidden');
            }
        });

        function togglePassword(inputId, iconId) {
            var passwordInput = document.getElementById(inputId);
            var icon = document.getElementById(iconId);

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
