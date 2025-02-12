@props([
    'design' => 0,
    'size' => '',
    'value' => '',
    'removeclass' => null,
])
@php
    $default = ['btn', 'btn-primary', 'font-weight-bolder', 'text-uppercase', 'btn' . $size];
    if (is_array($removeclass)) {
        $default = array_diff($default, $removeclass);
    } elseif (is_string($removeclass) && $removeclass != 'true') {
        $default = array_diff($default, [$removeclass]);
    } elseif ($removeclass == 'true' || $removeclass === true) {
        $default = [];
    } else {
        $default = $default;
    }
@endphp
@switch($design)
    @case('3')
        <a {{ $attributes->class($default)->merge(['title' => $value, 'href' => '#']) }}> {{ $value }}</a>
    @break

    @case('2')
        <button {{ $attributes->class($default)->merge(['type' => 'button']) }}> {{ $value }}</button>
    @break

    @case('1')
        <button
            {{ $attributes->merge(['title' => $value, 'type' => 'button', 'class' => 'btn font-weight-bolder px-9 py-4 text-uppercase']) }}>{{ $value }}</button>
    @break

    @default
        <a
            {{ $attributes->merge(['title' => $value, 'href' => '#', 'class' => 'btn btn-primary font-weight-bolder font-size-sm text-uppercase']) }}>{{ $value }}</a>
@endswitch
