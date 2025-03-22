<x-layouts.app>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:w-64 bg-gray-800 text-white p-4 h-auto">
            <x-layouts.sidebar />
        </aside>

        <!-- Konten -->
        <div class="flex flex-col flex-1">
            <x-layouts.header />

            <div class="flex-1 p-6 bg-gray-100" x-data="{ openModal: false }">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Kategori</h1>

                    <!-- Tombol Tambah Kategori -->
                    <button @click="openModal = true"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg shadow-md text-sm flex items-center gap-2">
                        <span class="material-symbols-outlined">add_circle</span>
                        <span class="font-semibold">Add Category</span>
                    </button>
                </div>

                <!-- Modal Tambah Kategori -->
                <div x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Add Category</h2>

                        <form wire:submit.prevent="create">
                            @csrf
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700">Category Name</label>
                                <input type="text" wire:model="name" required class="w-full p-2 border rounded">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex justify-between mt-4">
                                <button type="button" @click="openModal = false" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Livewire Komponen -->
                <livewire:categories-table />
            </div>

            <x-layouts.footer />
        </div>
    </div>
</x-layouts.app>