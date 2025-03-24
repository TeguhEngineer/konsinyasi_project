@extends('layouts.app')
@section('nav-content')
    <div class="mb-4 lg:flex lg:items-center lg:justify-between col-span-full xl:mb-2">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl  dark:text-white">User</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('users.index') }}"
                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Index
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Add
                            User</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="px-4">
        <div class="my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 p-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                {{-- Name --}}
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- Email --}}
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- Password --}}
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autofocus autocomplete="password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Password Confirmation --}}
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password_confirmation"
                        required autofocus autocomplete="password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- Role --}}
                <div class="mb-4">
                    <x-input-label for="role" :value="__('Role')" />
                    <x-select-input id="role" class="block mt-1 w-full" name="role" placeholder="Role User">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="manajer" {{ old('role') == 'manajer' ? 'selected' : '' }}>Manajer</option>
                        <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                {{-- Submit Button --}}
                <a href="{{ route('users.index') }}">
                    <x-secondary-button>Batal</x-secondary-button>
                </a>
                <x-primary-button type="submit">Simpan</x-primary-button>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/delete-selected.js') }}"></script>
@endpush
