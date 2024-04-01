<div>
    <h2>{{ $username }}</h2>
    {{ $title }}
    <p>{{ count($users) }}</p>
    <button wire:click='createNewUser'>
        Create new user
    </button>
</div>
