<x-layouts.app>
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Sidebar (Hanya muncul di desktop) -->
        <aside class="hidden lg:block lg:w-64 bg-gray-800 text-white p-4">
            <x-layouts.sidebar />
        </aside>

        <!-- Area Konten -->
        <div class="flex-1">
            <!-- Header (Dengan Menu di Mobile) -->
            <x-layouts.header />

            <!-- Konten Utama -->
            <div class="p-6 bg-gray-100">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">
                    Selamat datang di Dashboard
                </h1>
                <livewire:auth.logout />
            </div>
        </div>
    </div>

    <x-layouts.footer />
</x-layouts.app>
