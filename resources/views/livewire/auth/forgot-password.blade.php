<div class="min-h-screen flex flex-col justify-center items-center bg-gray-50 px-6">
    <div class="w-full max-w-md">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Reset Password</h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan username untuk mendapatkan token reset.</p>
        </div>

        <div class="relative backdrop-blur-xl bg-white/20 border border-white/30 shadow-lg rounded-2xl p-6 mt-6">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent rounded-2xl"></div>

            <div class="relative z-10">
                <label for="username" class="block text-sm font-medium text-gray-900">Username</label>
                <input id="username" type="text" wire:model="username" placeholder="Masukkan Username"
                    class="appearance-none block w-full px-4 py-2 bg-white/30 border border-gray-300 rounded-lg shadow-md placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-500 backdrop-blur-lg text-black transition duration-300 ease-in-out sm:text-sm mt-2"
                    required>

                <button wire:click="sendResetLink"
                    class="w-full mt-4 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition-all duration-300 ease-in-out shadow-lg">
                    Kirim Token
                </button>

                <p class="mt-3 text-sm text-red-500">{{ $message }}</p>
            </div>
        </div>
    </div>
</div>