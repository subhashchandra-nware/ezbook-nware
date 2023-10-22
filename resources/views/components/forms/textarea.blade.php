@props([
    'design' => 0,
    'label' => null,
    'value' => null,
    'desc' => '',
    'name',
])

@switch($design)
    @case('1')
        <div class="form-group row">
            <label for="{{ $attributes->get('id') ?? 'id-' . $name }}" class="col-xl-3 col-lg-3 col-form-label">{{ $label }}</label>
            <div class="col-lg-9 col-xl-9">
                <textarea name="{{ $name }}"
                    class="@error($name) border-danger is-invalid @enderror form-control form-control-lg form-control-solid"
                    {{ $attributes->merge(['id' => 'id-' . $name]) }}>{{ old($name, $value) }}</textarea>
                @error($name)
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <span class="form-text text-muted">{!! $desc !!} </span>
            </div>
        </div>
    @break

    @default
        <textarea {{ $attributes->merge(['name' => $name,]) }}>{{ old($name, $value) }}</textarea>
@endswitch
