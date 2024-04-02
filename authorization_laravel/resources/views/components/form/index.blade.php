@props(['action' => '#'])

<form action={{ $action }} {{ $attributes }} >

    @csrf
    {{ $slot }}

</form>
