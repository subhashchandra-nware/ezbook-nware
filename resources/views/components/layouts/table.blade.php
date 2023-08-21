@props([
    'headers' => null,
    'data' => null,
    'actions' => null,
    'route' => null,
])
<!--begin::Table-->
<div class="table-responsive">

    <table {{ $attributes}} class="table table-head-custom table-head-bg table-borderless table-vertical-center">
        <thead>
            <tr class="text-left text-uppercase">
                @isset($headers)
                    @foreach ($headers as $header)
                        <th @if (strtoupper($header) == 'ACTION') style="text-align: center;width: 22rem;" @endif >{{ $header }}</th>
                        {{-- <th>{{ $header }}</th> --}}
                    @endforeach
                @endisset
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp

            @isset($data)
                @foreach ($data as $value)
                    <tr class="text-left">
                        @foreach ($headers as $key => $val)
                            @if ($key == 'sn')
                                <th> {{ $i++ }} </th>
                            @elseif (strtoupper($key) == 'ID')
                                <th><div class="d-flex float-right"><x-forms.action id="{{ $value[$key] ?? '' }}" :actions="$actions" route={{$route}} /></div></th>
                                {{-- <th><div class="d-flex"><x-forms.action id="{{ $value[$key] ?? '' }}" :actions="$actions" route={{$route}} /></div></th> --}}
                                {{-- <th><div class=""><x-forms.action id="{{ $value[$key] ?? '' }}" :actions="$actions" route={{$route}} /></div></th> --}}
                            @else
                                <th>{{ $value[$key] ?? '' }}</th>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
<!--end::Table-->
