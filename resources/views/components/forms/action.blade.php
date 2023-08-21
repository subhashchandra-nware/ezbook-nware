@props([
    'actions' => null,
    'route' => null,
    'id'
])
{{-- @dd($id) --}}
@isset($actions)
    @foreach ($actions as $key => $action)
        @switch(strtoupper($key) )
            @case('SHOW')
            @case('VIEW')
                <x-forms.button class="flaticon-visible ml-3" value="View" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
                @break

                @case('EDIT')
                <x-forms.button class="flaticon-edit ml-3" value="Edit" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
                @break

                @case('DELETE')
                <x-forms.form method="delete" action="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" >
                <x-forms.button design="2" type="submit" value="Delete" class="btn-danger flaticon-delete font-size-sm ml-3" />
                </x-forms.form>
                @break
            @default

        @endswitch
    @endforeach
@endisset
