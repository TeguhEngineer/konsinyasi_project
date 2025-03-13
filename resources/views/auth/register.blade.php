<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Create a Free Account
    </h2>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-3">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                    required>
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="font-medium text-gray-900 dark:text-white">I accept the <a href="#"
                        class="text-primary-700 hover:underline dark:text-primary-500">Terms and Conditions</a></label>
            </div>
        </div>
        <x-primary-button class="text-base">
            {{ __('Create account') }}
        </x-primary-button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Already have an account? <a href="/login"
                class="text-primary-700 hover:underline dark:text-primary-500">Login here</a>
        </div>
    </form>
</x-guest-layout>
