@props(['menus', 'name' => null, 'childkey' => 'child'])
{{-- {{ Request::is('book') ? 'active-Request' : '' }}
{{ Route::is('book.index') ? 'active-Route' : '' }} --}}

{{-- @dd($menus, request()->segment(5), array_search(request()->segment(4), array_column($menus[0][$childkey], 'ID')), array_column($menus[0][$childkey], 'ID')) --}}
<ul id="kt_calendar_external_events" class="menu-nav pt-0">
    @isset($name)
        <li class="menu-section">
            <h4 class="menu-text">{{ $name }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
    @endisset
    @foreach ($menus as $key => $menu)
        {{-- <li class="menu-item menu-item-submenu menu-item-open menu-item-here" aria-haspopup="true" data-menu-toggle="hover"> --}}
        <li class="menu-item menu-item-submenu @if (array_search(request()->segment(5), array_column($menu[$childkey], 'ID')) !== false) menu-item-open menu-item-here @endif"
            aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle" title="{{ $menu['Description'] }}">
                <span class="menu-text"> {{ $menu['Name'] }}</span>
                @if (count($menu[$childkey]) > 0)
                    <i class="menu-arrow"></i>
                @endif
            </a>
            @if (count($menu[$childkey]) > 0)
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        @foreach ($menu[$childkey] as $k => $submenu)
                            <li class="menu-item @if (request()->segment(5) == $submenu['ID']) menu-item-active @endif"
                                aria-haspopup="true">
                                {{-- <a href="{{route('book.location.resource', ['location' => $submenu['resourceLocation'],'resource'=>  $submenu['ID']])}}"  class="ajaxa menu-link menu-toggle" title="{{ $submenu['Description'] }}"> --}}
                                <a href="{{ route('book.location.resource', ['location' => request()->segment(3) ?? 0, 'resource' => $submenu['ID']]) }}"
                                    class="ajaxa menu-link menu-toggle" title="{{ $submenu['Description'] }}">
                                    <span class="menu-text"> <i class="far fa-circle"></i>
                                        {{ $submenu['Name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul>




{{--
<ul id="kt_calendar_external_events" class="menu-nav pt-0">
    @isset($name)
        <li class="menu-section">
            <h4 class="menu-text">{{ $name }}</h4>
            <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
        </li>
    @endisset
    @foreach ($menus as $key => $menu)
        <li class="menu-item menu-item-submenu " aria-haspopup="true" data-menu-toggle="hover">
            <a href="javascript:;" class="menu-link menu-toggle" title="{{ $menu['Description'] }}">
                <span class="menu-text"> {{ $menu['Name'] }}</span>
                @if (count($menu[$childkey[0]]) > 0)
                    <i class="menu-arrow"></i>
                @endif
            </a>
            @if (count($menu[$childkey[0]]) > 0)
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        @foreach ($menu[$childkey[0]] as $k => $submenu)
                            <li class="menu-item " aria-haspopup="true">
                                <a href="javascript:;" class="menu-link menu-toggle fc-draggable-handle menu-link"
                                    data-event='{"id": "{{ $k }}", "title": "{{ $submenu['Name'] }}", "description": "{{ $submenu['Description'] }}", "classNames": "fc-event-primary", "stick": true}''
                                    title="{{ $submenu['Description'] }}">
                                    <span class="menu-text"> <i class="far fa-circle"></i>
                                        {{ $submenu['Name'] }}</span>
                                    @if (count($submenu[$childkey[1]]) > 0)
                                        <i class="menu-arrow"></i>
                                    @endif
                                </a>

                                @if (count($submenu[$childkey[1]]) > 0)
                                    <div class="menu-submenu">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            @foreach ($submenu[$childkey[1]] as $k => $submenu)
                                                <li class="menu-item " aria-haspopup="true">
                                                    <span
                                                        data-event='{"id": "{{ $k }}", "title": "{{ $submenu['Name'] }}", "description": "{{ $submenu['Name'] }}", "classNames": "fc-event-primary", "stick": true}''
                                                        class="fc-draggable-handle menu-link"
                                                        title="{{ $submenu['Name'] }}">
                                                        <span class="menu-text"> <i class="far fa-circle"></i>
                                                            {{ $submenu['Name'] }}</span>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul> --}}
