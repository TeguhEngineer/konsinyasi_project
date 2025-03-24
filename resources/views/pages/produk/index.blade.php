@extends('layouts.app')
@section('nav-content')
    <div class="mb-4 lg:flex lg:items-center lg:justify-between col-span-full xl:mb-2">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl  dark:text-white">Produk</h1>
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
                {{-- <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <a href="#"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">Profile</a>
                    </div>
                </li> --}}
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="px-4">
        <div class="my-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="sm:flex mb-3 p-2">
                <div class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <div class="flex flex-row flex-wrap items-center gap-2 w-full sm:w-auto mb-2 sm:mb-0">
                        <form action="{{ route('produks.index') }}" method="GET"
                            class="flex flex-wrap items-center gap-2 w-full">
                            <div class="w-auto">
                                <select name="per_page" id="per_page" onchange="this.form.submit()"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                                </select>
                            </div>

                            <div class="flex-1 min-w-0 sm:w-64 xl:w-96">
                                <label for="search" class="sr-only">Cari</label>
                                <div class="relative">
                                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Cari...">
                                </div>
                            </div>

                            <button type="submit"
                                class="inline-flex items-center justify-center px-3 py-2.5 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                        </form>
                    </div>
                    <div class="flex justify-end pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0">
                        {{-- icon refresh --}}
                        @if (request()->has('search'))
                            <a href="{{ route('produks.index') }}"
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <ion-icon class="w-6 h-6" name="refresh-outline"></ion-icon>
                            </a>
                        @endif
                        {{-- icon trash --}}
                        <a href="#" id="delete-selected-btn"
                            class="hidden inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <ion-icon class="w-6 h-6" name="trash-outline"></ion-icon>
                        </a>
                        {{-- Icon more --}}
                        <div class="relative inline-block text-left">
                            <input type="checkbox" id="dropdownToggle" class="hidden peer">

                            {{-- Tombol More --}}
                            <label for="dropdownToggle"
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <ion-icon class="w-6 h-6" name="ellipsis-vertical-outline"></ion-icon>
                            </label>

                            {{-- Dropdown Menu --}}
                            <div
                                class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700 hidden peer-checked:block">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                    {{-- Import Data --}}
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <ion-icon class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400"
                                                name="cloud-upload-outline"></ion-icon>
                                            Import Data
                                        </a>
                                    </li>
                                    {{-- Export Data --}}
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <ion-icon class="w-5 h-5 mr-2 text-green-600 dark:text-green-400"
                                                name="cloud-download-outline"></ion-icon>
                                            Export Data
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center ml-auto  sm:space-x-3">
                    <a href="{{ route('produks.create') }}" type="button" data-modal-target="add-user-modal"
                        data-modal-toggle="add-user-modal"
                        class="inline-flex items-center ml-auto justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add produk
                    </a>
                </div>
            </div>

            <div class="flex flex-col ">
                <div class="overflow-x-auto ">
                    <div class="inline-block min-w-full align-middle ">
                        <div class="overflow-hidden shadow ">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600 ">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50">
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-gray-500 uppercase dark:text-gray-400 text-center">
                                            No.
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Nama
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Stok
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Harga Produk
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Deskripsi
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @forelse ($produks as $data)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                        class="checkbox-item w-4 h-4 border-gray-300 rounded bg-gray-50"
                                                        value="{{ $data->id }}">
                                                </div>
                                            </td>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                                <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                    <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                        {{ $data->nama_produk }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $data->stok }}</td>
                                            <td
                                                class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                    {{ $data->harga_produk }}
                                                </div>
                                            </td>
                                            <td
                                                class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                    {{ $data->deskripsi }}
                                                </div>
                                            </td>
                                            <td
                                                class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
                                                    {{ $data->status }}
                                                </div>
                                            </td>
                                            <td class="p-4 space-x-2 whitespace-nowrap flex">
                                                <button type="button" data-modal-target="edit-user-modal"
                                                    data-modal-toggle="edit-user-modal"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Edit produk
                                                </button>
                                                <form action="{{ route('produks.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" data-modal-target="delete-user-modal"
                                                        data-modal-toggle="delete-user-modal"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900 @if ($data->role == 'admin') disabled:bg-gray-400 disabled:cursor-not-allowed @endif"
                                                        @if ($data->role == 'admin') disabled @endif>
                                                        <svg class="w-4
                                                    h-4 mr-2"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Delete produk
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center p-4">Data tidak ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- fungsi bulk delete --}}
                            <form id="delete-selected-form" action="{{ route('produks.bulkDelete') }}" method="POST">
                                @csrf
                                <input type="hidden" name="ids" id="selected-ids">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <x-pagination :paginator="$produks" />

        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/delete-selected.js') }}"></script>
@endpush
