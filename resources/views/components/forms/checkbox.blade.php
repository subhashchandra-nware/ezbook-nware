@props([
    'design' => 0,
    'label' => null,
    'value' => 'ON',
    'desc' => '',
    'checked' => false,
    'name',
])

@switch($design)
    @case('2')
        <div class="form-group row">
            <div class="col-xl-3 col-lg-3 "></div>
            <div class="form-check col-lg-9 col-xl-9">
                <input @checked(old($name, $checked)) name="{{ $name }}" value="{{ $value }}" type="checkbox"
                    class="@error($name) border-danger is-invalid @enderror" {{ $attributes->merge(['id' => 'id-' . $name]) }} />
                <label for="{{ $attributes->get('id') ?? 'id-' . $name }}" class="form-check-label">{{ $label }}</label>
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
                <input @checked(old($name, $checked)) name="{{ $name }}" value="{{ $value }}" type="checkbox"
                    class="@error($name) border-danger is-invalid @enderror"
                    {{ $attributes->merge(['id' => 'id-' . $name]) }} />
                @error($name)
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <span class="form-text text-muted">{!! $desc !!} </span>
            </div>
        </div>
    @break

    @default
        <input @checked(old('active', $checked))
            {{ $attributes->merge(['type' => 'checkbox', 'name' => $name, 'value' => $value, 'id' => 'id-' . $name]) }} />
        @isset($label)
            <label for="{{ $attributes->get('id') ?? 'id-' . $name }}" class="form-check-label">{{ $label }}</label>
        @endisset
        @error($name)
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
        @if ($desc != '')
            <span class="form-text text-muted">{!! $desc !!} </span>
        @endif

@endswitch
