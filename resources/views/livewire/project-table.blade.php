<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Proyek</h2>
        <input type="text" wire:model.debounce.300ms="search" placeholder="Cari proyek..."
            class="p-2 border rounded-md shadow-sm focus:ring focus:ring-blue-300">
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 text-center min-w-max">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-3">#</th>
                    <th class="border p-3">Nama</th>
                    <th class="border p-3">Kategori</th>
                    <th class="border p-3">Biaya</th>
                    <th class="border p-3">Deadline</th>
                    <th class="border p-3">Customer</th>
                    <th class="border p-3">Status</th>
                    <th class="border p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $index => $project)
                <tr class="hover:bg-gray-100">
                    <td class="border p-3">{{ $projects->firstItem() + $index }}</td>
                    <td class="border p-3">{{ $project->name }}</td>
                    <td class="border p-3">{{ $project->category }}</td>
                    <td class="border p-3">Rp{{ number_format($project->fee, 2, ',', '.') }}</td>
                    <td class="border p-3">{{ $project->deadline }}</td>
                    <td class="border p-3">
                        {{ $project->customer ? $project->customer->fullname : 'Tidak Diketahui' }}
                    </td>
                    <td class="border p-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            @if($project->status == 'pending') bg-yellow-500 text-white
                            @elseif($project->status == 'in_progress') bg-blue-500 text-white
                            @elseif($project->status == 'completed') bg-green-500 text-white
                            @else bg-red-500 text-white @endif">
                            {{ ucfirst($project->status) }}
                        </span>
                    </td>
                    <td class="border p-3">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Edit</button>
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600"
                            @click="$dispatch('show-delete-modal', { id: {{ $project->id }} })">
                            Canceled
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center p-5 text-gray-500 font-semibold">
                        Tidak ada proyek ditemukan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div x-data="{ openDeleteModal: false, projectId: null }"
        x-on:show-delete-modal.window="openDeleteModal = true; projectId = $event.detail.id"
        x-show="openDeleteModal"
        @keydown.escape.window="openDeleteModal = false"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
        x-transition.opacity
        style="display: none;"
        wire:ignore.self>

        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Konfirmasi Pembatalan</h2>
            <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin ingin membatalkan proyek ini?</p>
            <div class="flex justify-end space-x-3">
                <button @click="openDeleteModal = false"
                    class="px-4 py-2 bg-gray-500 text-white rounded">
                    No
                </button>
                <button @click="$dispatch('confirm-delete', { id: projectId }); openDeleteModal = false;"
                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Yes
                </button>
            </div>
        </div>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>