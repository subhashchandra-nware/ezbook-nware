@props([
    'design' => 0,
    'size' => '-lg',
    'label' => null,
    'value' => null,
    'desc' => '',
    'name',
])
@php
// dd( $attributes, $label->attributes->merge(['class' => 'dddd']) );
@endphp
@switch($design)
    @case('4')
        <label for="{{ $attributes->get('id') ?? 'id-' . $name }}"
            {!! $label->attributes ?? "class='mr-5 col-form-label{$size}'" !!} >{{  $label }}</label>
        <input {{ $attributes->class(['border-danger' => $errors->has($name), 'is-invalid' => $errors->has($name), 'form-control form-control'.$size])->merge(['type' => 'text', 'name' => $name, 'value' => old($name, $value), 'id' => 'id-' . $name]) }} />
        @error($name)
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
        <span class="form-text text-muted">{!! $desc !!} </span>
    @break
    @case('3')
        <label for="{{ $attributes->get('id') ?? 'id-' . $name }}"
            class="col-xl-3 col-lg-3 col-form-label">{{ $label }}</label>
        <input class="@error($name) border-danger is-invalid @enderror form-control form-control-lg form-control-solid"
            {{ $attributes->merge(['type' => 'text', 'name' => $name, 'value' => old($name, $value), 'id' => 'id-' . $name]) }} />
        @error($name)
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
        <span class="form-text text-muted">{!! $desc !!} </span>
    @break

    @case('2')
        <div class="form-group row">
            <label for="{{ $attributes->get('id') ?? 'id-' . $name }}"
                class="col-xl-3 col-lg-3 col-form-label">{{ $label }}</label>
            <div class="col-lg-9 col-xl-9">
                <input class="@error($name) border-danger is-invalid @enderror form-control form-control-lg form-control-solid"
                    {{ $attributes->merge(['type' => 'text', 'name' => $name, 'value' => old($name, $value), 'id' => 'id-' . $name]) }} />
                @error($name)
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <span class="form-text text-muted">{!! $desc !!} </span>
            </div>
        </div>
    @break

    @case('1')
        <div class="form-group row">
            <label for="{{ $attributes->get('id') ?? 'id-' . $name }}"
                class="col-xl-3 col-lg-3 col-form-label">{{ $label }}</label>
            <div class="col-lg-9 col-xl-9">
                <input name="{{ $name }}" value="{{ old($name, $value) }}"
                    class="@error($name) border-danger is-invalid @enderror form-control form-control-lg form-control-solid"
                    {{ $attributes->merge(['type' => 'text', 'id' => 'id-' . $name]) }} />
                @error($name)
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <span class="form-text text-muted">{!! $desc !!} </span>
            </div>
        </div>
    @break

    @default
        <input
            {{ $attributes->merge(['type' => 'text', 'id' => 'id-' . $name, 'name' => $name, 'value' => old($name, $value)]) }} />
@endswitch
