<aside class="hidden lg:block w-64 bg-gray-800 text-white p-4">
    <nav>
        <ul>
            <!-- Dashboard -->
            <li class="py-2">
                <a href="{{ route('dashboard') }}" wire:navigate class="hover:text-blue-400">Dashboard</a>
            </li>

            <!-- Datas with Animated Dropdown -->
            <li class="py-2" x-data="{ open: false }">
                <button @click="open = !open" class="w-full text-left hover:text-blue-400 flex items-center justify-between">
                    Datas
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform"
                        :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mt-2 pl-4 space-y-2 origin-top-left">
                    <li>
                        <a href="{{ route('projects') }}" wire:navigate class="hover:text-blue-400">Projects</a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}" wire:navigate class="hover:text-blue-400">Categories</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>