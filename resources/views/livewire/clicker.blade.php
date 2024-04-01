<div>
    @if (session('success'))
     <p class="alert">   {{ session('success') }}</p>
    @endif
    <form wire:submit.prevent='createNewUser' action="">
        <input wire:model="name" type="text" placeholder="Name">
        @error('name')
        <p>{{ $message }}</p>
        @enderror
        <input wire:model="email" type="email" placeholder="Email">
        @error('email')
        <p>{{ $message }}</p>
        @enderror
        <input wire:model="password" type="password" placeholder="Password">
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        <button type="submit">Create</button>
    </form>
    <hr>
    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
</div>
