<aside id="sidebar"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0 hidden w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width "
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto scrollbar-custom">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700 ">
                <ul class="pb-2 space-y-2 ">
                    {{-- <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <ion-icon class="w-5 h-5 text-gray-500 dark:text-gray-400" name="search"></ion-icon>
                                </div>
                                <input type="text" name="email" id="mobile-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </li> --}}
                    <li>
                        <a href="/dashboard"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ Request::is('dashboard*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            <ion-icon class="w-6 h-6 text-gray-500" name="speedometer"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <ion-icon class="w-6 h-6 text-gray-500" name="list"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <ion-icon class="w-6 h-6 text-gray-500" name="storefront-outline"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Distributor</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <ion-icon class="w-6 h-6 text-gray-500" name="bookmarks-outline"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Konsinyasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700">
                            <ion-icon class="w-6 h-6 text-gray-500" name="receipt-outline"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Realisasi</span>
                        </a>
                    </li>

                    {{-- <li>
                        <button type="button"
                            class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-700"
                            aria-controls="dropdown-crud" data-collapse-toggle="dropdown-crud">
                            <ion-icon class="w-6 h-6 text-gray-500" name="server"></ion-icon>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Master Data</span>
                            <ion-icon class="w-6 h-6 text-gray-500" name="chevron-down"></ion-icon>
                        </button>
                        <ul id="dropdown-crud" class="space-y-2 py-2 {{ Request::is('users*') ? '' : 'hidden' }}">
                            <li>
                                <a href="/users"
                                    class="text-base text-gray-900 rounded-lg flex items-center p-2 group hover:bg-gray-100 transition duration-75 pl-11 dark:text-gray-200 dark:hover:bg-gray-700">
                                    <ion-icon class="text-gray-500" name="people"></ion-icon>
                                    <span class="ml-3" sidebar-toggle-item>Users</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="/users"
                            class=" flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-100 group dark:text-gray-200 dark:hover:bg-gray-700 {{ Request::is('users*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
                            <ion-icon class="w-6 h-6 text-gray-500" name="people-outline"></ion-icon>
                            <span class="ml-3" sidebar-toggle-item>Manajemen User</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Menu Bottom Sidebar --}}
        <div class="absolute bottom-0 left-0 justify-center hidden w-full p-4 space-x-4 bg-white lg:flex dark:bg-gray-800"
            sidebar-bottom-menu>
            <a href="#"
                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <ion-icon class="w-6 h-6" name="options"></ion-icon>
            </a>
            <a href="/profile" data-tooltip-target="tooltip-settings"
                class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <ion-icon class="w-6 h-6" name="settings"></ion-icon>
            </a>
            <div id="tooltip-settings" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Settings page
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</aside>
