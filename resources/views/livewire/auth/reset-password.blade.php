<div>
    <h2>Reset Password</h2>

    <form wire:submit.prevent="resetPassword">
        <div>
            <label>Password Baru</label>
            <input type="password" wire:model="password">
        </div>

        <div>
            <label>Konfirmasi Password</label>
            <input type="password" wire:model="confirm_password">
        </div>

        <button type="submit">Reset Password</button>
    </form>

    @if ($message)
        <p>{{ $message }}</p>
    @endif
</div>
