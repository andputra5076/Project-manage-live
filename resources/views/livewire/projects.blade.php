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
            <div class="flex-1 p-6 bg-gray-100" x-data="{ openModal: false }">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Projects</h1>

                    <!-- Tombol Tambah Proyek -->
                    <button @click="openModal = true"
                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg shadow-md text-sm flex items-center justify-center gap-2 transition duration-300 ease-in-out transform hover:scale-105">
                        <span class="material-symbols-outlined">add_circle</span>
                        <span class="font-semibold">Tambah Proyek</span>
                    </button>
                </div>

                <!-- Modal -->
                <div x-show="openModal"
                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
                    x-transition.opacity
                    wire:ignore.self>

                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg max-h-[90vh] mt-20 mb-20 overflow-hidden">
                        <div class="p-6 overflow-y-auto max-h-[75vh] scrollbar-hide">
                            <h2 class="text-xl font-semibold text-gray-700 mb-4">
                                {{ $isEdit ? 'Edit Proyek' : 'Tambah Proyek' }}
                            </h2>

                            <form wire:submit.prevent="create">
                                @csrf

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Nama Proyek</label>
                                    <input type="text" wire:model="name" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select wire:model="category" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Biaya</label>
                                    <input type="number" wire:model="fee" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                                    @error('fee') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3" wire:ignore>
                                    <label class="block text-sm font-medium text-gray-700">Pelanggan</label>
                                    <select wire:model="customer_id" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                                        <option value="">Pilih Pelanggan</option>
                                        @forelse ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                                        @empty
                                        <option disabled>Tidak ada pelanggan tersedia</option>
                                        @endforelse
                                    </select>
                                    @error('customer_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Deadline</label>
                                    <input type="date" wire:model="deadline" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                                    @error('deadline') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700">Catatan</label>
                                    <textarea wire:model="note" required
                                        class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1"></textarea>
                                    @error('note') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <div class="flex justify-between mt-4">
                                    <button type="button" @click="openModal = false"
                                        class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition duration-300">
                                        {{ $isEdit ? 'Update' : 'Simpan' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Komponen Livewire -->
                <livewire:project-table />
            </div>

            <!-- Footer -->
            <x-layouts.footer />
        </div>
    </div>
</x-layouts.app>