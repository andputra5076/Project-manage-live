<x-layouts.app>
    <div class="flex min-h-screen">
        <!-- Sidebar (Hanya di Desktop) -->
        <aside class="hidden lg:flex lg:w-64 bg-gray-800 text-white p-4 h-auto">
            <x-layouts.sidebar />
        </aside>

        <!-- Konten & Footer -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <x-layouts.header />

            <!-- Konten Utama -->
            <div class="flex-1 p-6 bg-gray-100">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">
                    Welcome to Dashboard
                </h1>

                <!-- Grid Informasi -->
                <div class="space-y-6">
                    <!-- Statistik Utama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Total Customer -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">group</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Total Customer</p>
                                <p class="text-xl font-semibold">1,254</p>
                            </div>
                        </div>

                        <!-- Pesanan Terbaru -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">shopping_cart</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Pesanan Terbaru</p>
                                <p class="text-xl font-semibold">340</p>
                            </div>
                        </div>

                        <!-- Pesanan Diproses -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-orange-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">hourglass_top</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Pesanan Diproses</p>
                                <p class="text-xl font-semibold">120</p>
                            </div>
                        </div>

                        <!-- Pesanan Selesai -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-teal-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">check_circle</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Pesanan Selesai</p>
                                <p class="text-xl font-semibold">220</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Pendapatan -->
                    <div class="flex items-center justify-between w-full mb-4">
                        <h2 class="text-lg font-semibold text-gray-800 flex-grow">Filter Pendapatan</h2>
                        <input type="date" class="p-2 border rounded-md shadow-sm focus:ring focus:ring-blue-300 w-auto min-w-32">
                    </div>

                    <!-- Pendapatan Mingguan & Bulanan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Pendapatan Mingguan -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-purple-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">calendar_view_week</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Pendapatan Mingguan</p>
                                <p class="text-xl font-semibold">Rp 5.000.000</p>
                            </div>
                        </div>

                        <!-- Pendapatan Bulanan -->
                        <div class="bg-white p-4 rounded-lg shadow-md flex items-center transition duration-300 hover:shadow-lg hover:scale-105">
                            <div class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                                <span class="material-symbols-outlined text-2xl">calendar_month</span>
                            </div>
                            <div class="ml-4">
                                <p class="text-gray-500 text-sm">Pendapatan Bulanan</p>
                                <p class="text-xl font-semibold">Rp 20.000.000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Grafik Penjualan</h2>
                    <livewire:dashboard-cart />
                </div>
            </div>

            <!-- Footer -->
            <x-layouts.footer />
        </div>
    </div>
</x-layouts.app>