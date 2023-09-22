@props([
    'method' => "POST",
    'attr' => null,
])
<form {{ $attr ?? $attributes }} method= @if (strtoupper($method) == 'GET') "GET" @else "POST" @endif >
    @csrf
    @if (strtoupper($method) == 'PUT')
        @method('PUT')
    @elseif (strtoupper($method) == 'PATCH' )
        @method('PATCH')
    @elseif ( strtoupper($method) == "DELETE" )
        @method('DELETE')
    @endif

    {{ $slot }}


</form>
