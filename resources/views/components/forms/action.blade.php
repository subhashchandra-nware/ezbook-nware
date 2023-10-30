@props([
    'actions' => null,
    'route' => null,
    'id'
])
{{-- @dd($id) --}}
@isset($actions)
    @foreach ($actions as $key => $action)
        @switch(strtoupper($key) )
            @case('SHOW-JS')
            @case('VIEW-JS')
            <x-forms.button onclick="return false;" id="{{$key}}-{{$route}}-{{$id}}" class="{{$key}}-{{$route}} btn btn-light-success flaticon-visible font-weight-bolder font-size-sm" value="{{strstr($key, '-', true)}}" href="{{ isset($route) ? route($action, $id ) : url($action.'/'.$id) }}" />
            @break

            @case('EDIT-JS')
            <x-forms.button onclick="return false;" id="{{$key}}-{{$route}}-{{$id}}" class="{{$key}}-{{$route}} btn btn-light-info flaticon-edit font-weight-bolder font-size-sm" value="{{strstr($key, '-', true)}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
            @break

            @case('DELETE-JS')
            @case('ALERT-DELETE')
            <x-forms.button onclick="return false;" id="{{$key}}-{{$route}}-{{$id}}" class="{{$key}}-{{$route}} btn btn-light-warning flaticon-delete font-weight-bolder font-size-sm" value="{{strstr($key, '-', true)}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
            @break

            @case('SHOW')
            @case('VIEW')
                <x-forms.button class="flaticon-visible btn btn-light-success font-weight-bolder font-size-sm" value="{{$key}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
                {{-- <x-forms.button class="flaticon-visible ml-3" value="{{$key}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" /> --}}
                @break

                @case('ACCEPT')
                @case('EDIT')
                <x-forms.button class="flaticon-edit btn btn-light-info font-weight-bolder font-size-sm" value="{{$key}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" />
                {{-- <x-forms.button class="flaticon-edit ml-3" value="{{$key}}" href="{{ isset($route) ? route($action, [$route=>$id] ) : url($action.'/'.$id) }}" /> --}}
                @break


                @case('REJECT')
                @case('DELETE')
                <x-forms.form method="delete" action="{{ isset($route) ? route($action, $id ) : url($action.'/'.$id) }}" >
                <x-forms.button design="2" type="submit" id="{{$key}}-{{$route}}-{{$id}}" value="{{$key}}" class="{{$key}}-{{$route}} flaticon-delete btn btn-light-warning font-weight-bolder font-size-sm" />
                {{-- <x-forms.button design="2" type="submit" value="{{$key}}" class="btn-danger flaticon-delete font-size-sm ml-3" /> --}}
                </x-forms.form>
                @break
            @default

        @endswitch
    @endforeach
@endisset
