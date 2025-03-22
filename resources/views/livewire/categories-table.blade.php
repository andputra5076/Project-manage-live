<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Kategori</h2>
        <input type="text" wire:model.debounce.300ms="search" placeholder="Cari kategori..."
            class="p-2 border rounded-md shadow-sm focus:ring focus:ring-blue-300">
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-center min-w-max">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">#</th>
                    <th class="border p-3">Nama Kategori</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index => $category)
                <tr class="hover:bg-gray-100">
                    <td class="border p-3">{{ $categories->firstItem() + $index }}</td>
                    <td class="border p-3">{{ $category->name }}</td>
                    <td class="border p-3">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600"
                            @click="$dispatch('show-edit-modal', { id: {{ $category->id }} })">
                            Edit
                        </button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600"
                            @click="$dispatch('show-delete-modal', { id: {{ $category->id }} })">
                            Remove
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center p-5 text-gray-500 font-semibold">
                        Tidak ada kategori ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-data="{ openDeleteModal: false, categoryId: null }"
        x-on:show-delete-modal.window="openDeleteModal = true; categoryId = $event.detail.id"
        x-show="openDeleteModal"
        @keydown.escape.window="openDeleteModal = false"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
        x-transition.opacity
        style="display: none;"
        wire:ignore.self>

        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Konfirmasi Hapus</h2>
            <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin menghapus kategori ini?</p>
            <div class="flex justify-end space-x-3">
                <button @click="openDeleteModal = false"
                    class="px-4 py-2 bg-gray-500 text-white rounded">
                    No
                </button>
                <button @click="$dispatch('confirm-delete', { id: categoryId }); openDeleteModal = false;"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Yes
                </button>
            </div>
        </div>
    </div>
    <div x-data="{ openEditModal: false }"
        x-on:show-edit-modal.window="openEditModal = true; Livewire.emit('edit', $event.detail.id)"
        x-show="openEditModal"
        @keydown.escape.window="openEditModal = false"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
        x-transition.opacity
        style="display: none;"
        wire:ignore.self>

        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Edit Kategori</h2>

            <form wire:submit.prevent="update">
                <input type="text" wire:model="name" required class="w-full p-2 border rounded focus:ring focus:ring-green-300 mt-1">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" @click="openEditModal = false" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
</div>