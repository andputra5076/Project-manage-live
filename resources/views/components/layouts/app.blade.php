<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Vite Integration -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    @livewireStyles
</head>

<body class="font-sans bg-gray-100">

    <div class="font-sans bg-gray-100 min-h-screen">
        <!-- Notifikasi Global -->
        <div x-data="{
    show: false, message: '', type: 'success', 
    timer: null, progress: 100,
    startTimer() {
        let interval = 100;
        this.timer = setInterval(() => {
            if (this.progress > 0) {
                this.progress -= (1000 / (interval * 5));
            } else {
                this.close();
            }
        }, interval);
    },
    stopTimer() {
        clearInterval(this.timer);
    },
    close() {
        this.show = false; 
        this.stopTimer();
    }
}"
            x-init="
@if(session()->has('message'))
    message = '{{ session('message') }}';
    type = '{{ session('status') ?? 'success' }}';
    show = true;
    startTimer();
@endif
"
            x-show="show"
            x-transition
            @mouseenter="stopTimer()"
            @mouseleave="startTimer()"
            class="fixed top-3 right-3 z-50 flex items-center gap-3 px-4 py-3 rounded-lg shadow-lg text-white text-sm min-w-[220px] max-w-md overflow-hidden"
            x-bind:class="{
    'bg-green-500': type === 'success', 
    'bg-red-500': type === 'error', 
    'bg-yellow-500': type === 'warning',
    'opacity-100': show
}"
            x-cloak>

            <!-- Ikon Notifikasi -->
            <svg x-show="type === 'success'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
            </svg>

            <svg x-show="type === 'error'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
            </svg>

            <svg x-show="type === 'warning'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"></path>
            </svg>

            <!-- Pesan Notifikasi -->
            <p x-text="message" class="font-semibold"></p>

            <!-- Progress Bar -->
            <div class="absolute bottom-0 left-0 h-1 bg-white opacity-50" :style="'width: ' + progress + '%'"></div>
        </div>

        {{ $slot }}
    </div>

    @livewireScripts

</body>

</html>