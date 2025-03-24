@extends('layouts.app')
@section('nav-content')
    <div class="mb-4 lg:flex lg:items-center lg:justify-between col-span-full xl:mb-2">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl  dark:text-white">Konsinyasi</h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="{{ route('konsinyasis.index') }}"
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
                            Konsinyasi</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="px-4">
        <div class="my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800 p-6">
            <form action="{{ route('konsinyasis.store') }}" method="POST">
                @csrf
                {{-- Nama Distributor --}}
                <div class="mb-4">
                    <x-input-label for="distributor" :value="__('Distributor')" />
                    <x-select-input id="distributor" class="block mt-1 w-full" name="distributor_id"
                        placeholder="Distributor">
                        @foreach ($distributor as $d)
                            <option value="{{ $d->id }}" {{ old('distributor_id') == $d->id ? 'selected' : '' }}>
                                {{ $d->nama_toko }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error :messages="$errors->get('distributor')" class="mt-2" />
                </div>

                {{-- Nama Karyawan --}}
                <div class="mb-4">
                    <x-input-label for="users" :value="__('Karyawan')" />
                    <x-select-input id="users" class="block mt-1 w-full" name="users_id" placeholder="Karyawan">
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}" {{ old('users_id') == $u->id ? 'selected' : '' }}>
                                {{ $u->name }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error :messages="$errors->get('users')" class="mt-2" />
                </div>

                {{-- Tgl Konsinyasi --}}
                <div class="mb-4">
                    <x-input-label for="tgl_konsinyasi" :value="__('Tgl. Konsinyasi Produk')" />
                    <x-text-input id="tgl_konsinyasi" class="block mt-1 w-full" type="date" name="tgl_konsinyasi"
                        :value="old('tgl_konsinyasi')" required autofocus autocomplete="tgl_konsinyasi" />
                    <x-input-error :messages="$errors->get('tgl_konsinyasi')" class="mt-2" />
                </div>
                {{-- Tgl Estimasi penarikan --}}
                <div class="mb-4">
                    <x-input-label for="tgl_estimasi_penarikan" :value="__('Tgl. Estimasi Penarikan Produk')" />
                    <x-text-input id="tgl_estimasi_penarikan" class="block mt-1 w-full" type="date"
                        name="tgl_estimasi_penarikan" :value="old('tgl_estimasi_penarikan')" required autofocus
                        autocomplete="tgl_estimasi_penarikan" />
                    <x-input-error :messages="$errors->get('tgl_estimasi_penarikan')" class="mt-2" />
                </div>

                {{-- Total pembayaran --}}
                <div class="mb-4">
                    <x-input-label for="total_pembayaran" :value="__('Total Pembayaran Produk')" />
                    <x-text-input id="total_pembayaran" class="block mt-1 w-full" type="text" name="total_pembayaran"
                        required autofocus autocomplete="total_pembayaran" />
                    <x-input-error :messages="$errors->get('total_pembayaran')" class="mt-2" />
                </div>


                {{-- Status --}}
                <div class="mb-4">
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select-input id="status" class="block mt-1 w-full" name="status" placeholder="Status Konsinyasi">
                        <option value="berjalan" {{ old('status') == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai
                        </option>
                        <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan
                        </option>
                        <option value="retur" {{ old('status') == 'retur' ? 'selected' : '' }}>Retur</option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                {{-- Submit Button --}}
                <a href="{{ route('konsinyasis.index') }}">
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
