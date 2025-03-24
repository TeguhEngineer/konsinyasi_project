@extends('layouts.app')
@section('nav-content')
    <div class="mb-4 lg:flex lg:items-center lg:justify-between col-span-full xl:mb-2">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl  dark:text-white">Distributor</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('produks.index') }}"
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
                            Distributor</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="px-4">
        <div class="my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 p-6">
            <form action="{{ route('distributors.store') }}" method="POST">
                @csrf
                {{-- Nama Toko --}}
                <div class="mb-4">
                    <x-input-label for="nama_toko" :value="__('Nama Toko')" />
                    <x-text-input id="nama_toko" class="block mt-1 w-full" type="text" name="nama_toko" :value="old('nama_toko')"
                        required autofocus autocomplete="nama_toko" />
                    <x-input-error :messages="$errors->get('nama_toko')" class="mt-2" />
                </div>
                {{-- Telepon --}}
                <div class="mb-4">
                    <x-input-label for="telepon" :value="__('Telepon')" />
                    <x-text-input id="telepon" class="block mt-1 w-full" type="number" name="telepon" :value="old('telepon')"
                        required autofocus autocomplete="telepon" />
                    <x-input-error :messages="$errors->get('telepon')" class="mt-2" />
                </div>
                {{-- Alamat --}}
                <div class="mb-4">
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" required autofocus
                        autocomplete="alamat" />
                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                </div>

                {{-- Maps --}}
                <div class="mb-4">
                    <x-input-label for="maps" :value="__('Maps')" />
                    <x-text-input id="maps" class="block mt-1 w-full" type="text" name="maps" required autofocus
                        autocomplete="maps" />
                    <x-input-error :messages="$errors->get('maps')" class="mt-2" />
                </div>

                {{-- Persen bagi hasil --}}
                <div class="mb-4">
                    <x-input-label for="persen_bagi_hasil" :value="__('Persen bagi hasil')" />
                    <x-text-input id="persen_bagi_hasil" class="block mt-1 w-full" type="integer" name="persen_bagi_hasil"
                        required autofocus autocomplete="persen_bagi_hasil" />
                    <x-input-error :messages="$errors->get('persen_bagi_hasil')" class="mt-2" />
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select-input id="status" class="block mt-1 w-full" name="status" placeholder="Status Produk">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>Non-aktif</option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                {{-- Submit Button --}}
                <a href="{{ route('produks.index') }}">
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
