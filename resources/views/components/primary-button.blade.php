<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800']) }}>
    {{ $slot }}
</button>
