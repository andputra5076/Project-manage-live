<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8 px-6">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="mx-auto h-16 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Register Icon">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            Create a new account
        </h2>
        <p class="mt-2 text-center text-sm text-blue-500">
            Or
            <a wire:navigate href="{{ route('login') }}"
                class="font-medium text-blue-500 hover:underline transition duration-150 ease-in-out">
                sign in to your existing account
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="relative backdrop-blur-xl bg-white/20 border border-white/30 shadow-lg rounded-2xl p-8 sm:px-10 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent rounded-2xl"></div>
            <form wire:submit.prevent="register" class="relative z-10 space-y-4">
                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-900">Username</label>
                    <div class="mt-1">
                        <input type="text" wire:model="username" id="username" placeholder="Enter your username"
                            class="appearance-none block w-full px-3 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg text-black transition duration-300 ease-in-out sm:text-sm"
                            required aria-required="true">
                    </div>
                </div>

                <!-- Full Name -->
                <div>
                    <label for="fullname" class="block text-sm font-medium text-gray-900">Full Name</label>
                    <div class="mt-1">
                        <input type="text" wire:model="fullname" id="fullname" placeholder="Enter your full name"
                            class="appearance-none block w-full px-3 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg text-black transition duration-300 ease-in-out sm:text-sm"
                            required aria-required="true">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
                    <div class="mt-1">
                        <input type="password" wire:model="password" id="password" placeholder="Enter your password"
                            class="appearance-none block w-full px-3 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg text-black transition duration-300 ease-in-out sm:text-sm"
                            required>
                        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-900">Confirm Password</label>
                    <div class="mt-1">
                        <input type="password" wire:model="confirm_password" id="confirm_password" placeholder="Confirm your password"
                            class="appearance-none block w-full px-3 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg text-black transition duration-300 ease-in-out sm:text-sm"
                            required>
                        @error('confirm_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-900">Role</label>
                    <div class="mt-1">
                        <select wire:model="role" id="role"
                            class="block w-full px-3 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md text-black focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg transition duration-300 ease-in-out sm:text-sm"
                            required aria-required="true">
                            <option value="">-- Pilih Role --</option>
                            <option value="1">Customer</option>
                            <option value="2">Programmer</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition-all duration-300 ease-in-out shadow-lg">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>