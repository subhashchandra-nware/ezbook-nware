@props([
    'design' => 0,
    'label' => null,
    'desc' => null,
    'options' => [],
    'selected' => null,
    'name',
])

@switch($design)
    @case('1')
        <div class="form-group row">
            <label for="{{ $attributes->get('id') ?? 'id-' . $name }}"
                class="col-xl-3 col-lg-3 col-form-label">{{ $label }}</label>
            <div class="col-lg-9 col-xl-9">
                <select name="{{ $name }}"
                    {{ $attributes->class(['border-danger' =>  $errors->has($name), 'is-invalid' =>  $errors->has($name), "form-control" ])->merge(['id' => 'id-' . $name, ]) }}>
                   @php
                       $i=0;
                   @endphp
                    @foreach ($options as $value => $option)
                    @if ($attributes->has('multiple'))
                    <option value="{{ $value }}" @selected(old($name, (isset($selected) && in_array($value, $selected)) ? $value : '' ) == $value)>
                        {{ $option }}
                    </option>
                    @else

                    <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
                        {{ $option }}
                    </option>
                    @endif
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </select>

                @error($name)
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                <span class="form-text text-muted">{{ $desc }} </span>
            </div>
        </div>
    @break

    @default
        <select {{ $attributes->merge(['name' => $name]) }}>
            @php
                $i=0;
            @endphp
            @foreach ($options as $value => $option)
            @if ($attributes->has('multiple'))
                    <option value="{{ $value }}" @selected(old($name, isset($selected[$i]) ? $selected[$i] : '' ) == $value)>
                        {{ $option }}
                    </option>
                    @else
                <option value="{{ $value }}" @selected(old($name, $selected) == $value)>
                    {{ $option }}
                </option>
                @endif
                @php
                    $i++;
                @endphp
            @endforeach
        </select>
@endswitch
