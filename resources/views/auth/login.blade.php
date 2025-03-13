<x-guest-layout>
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Sign in to platform
    </h2>
    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-3">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" name="remember" type="checkbox"
                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
                    required>
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="font-medium text-gray-900 dark:text-white">Remember me</label>
            </div>
            <a href="#" class="ml-auto text-sm text-primary-700 hover:underline dark:text-primary-500">Forgot
                Password?</a>
        </div>
        <x-primary-button class="text-base">
            {{ __('Login to your account') }}
        </x-primary-button>
        <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
            Not registered? <a href="/register" class="text-primary-700 hover:underline dark:text-primary-500">Create
                account</a>
        </div>
    </form>
</x-guest-layout>
