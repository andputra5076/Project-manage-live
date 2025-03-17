<header x-data="{ open: false }" class="bg-blue-600 text-white py-4 shadow-md w-full relative">
    <div class="container mx-auto flex justify-between items-center px-6">
        <h1 class="text-lg font-semibold">My Dashboard</h1>

        <!-- Tombol Burger Menu -->
        <button @click="open = !open" class="lg:hidden text-white focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Navigasi Desktop -->
        <nav class="hidden lg:flex space-x-4">
            <a wire:navigate href="{{ route('dashboard') }}" class="px-4 py-2 rounded-md">
                Dashboard
            </a>
            <div class="px-4 py-2 rounded-md" >
                <livewire:auth.logout />
            </div>
        </nav>
    </div>

    <!-- Navigasi Mobile dengan Animasi -->
    <div x-show="open"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 -translate-y-5"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-5"
        class="lg:hidden absolute w-full bg-blue-700 text-white top-full left-0 shadow-lg">
        
        <div class="flex flex-col">
            <a wire:navigate href="{{ route('dashboard') }}" 
                class="block py-3 px-6 transition-colors duration-200 hover:bg-blue-800">
                Dashboard
            </a>
            <div class="block py-3 px-6 transition-colors duration-200 hover:bg-blue-800 cursor-pointer">
                <livewire:auth.logout />
            </div>
        </div>
    </div>
</header>
