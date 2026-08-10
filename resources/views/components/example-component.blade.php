<div class="bg-red-300 m-5 p-4 ">
    {{-- @forelse ($users as $user)
        <li>{{ $user->first_name }} {{ $user->last_name }}</li>
    @empty
        <p>No users</p>
    @endforelse --}}
    <h1>Example Component</h1>
    When there is no desire, all things are at peace. - Laozi
    {{ $slot }}
</div>
