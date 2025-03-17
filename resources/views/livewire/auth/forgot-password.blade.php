<div>
    <h2>Reset Password</h2>
    <input type="text" wire:model="username" placeholder="Masukkan Username">
    <button wire:click="sendResetLink">Kirim Token</button> 
    <p>{{ $message }}</p>
</div>
