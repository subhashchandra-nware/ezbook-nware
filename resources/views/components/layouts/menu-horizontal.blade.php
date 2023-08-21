@props([
    'items' => [],
])

<ul class="nav nav-pills" id="myTab1" role="tablist">
    @foreach ($items as $link => $label)
    <li class="nav-item">
        <a class="nav-link @if ($link == '#general') active @endif" href="{{ $link }}">
            <span class="nav-text">{{ $label }}</span>
        </a>
    </li>
    @endforeach
    {{-- <li class="nav-item">
        <a class="nav-link" href="#booking-rights">
            <span class="nav-text">Booking Rights</span>
        </a>
    </li> --}}
</ul>
