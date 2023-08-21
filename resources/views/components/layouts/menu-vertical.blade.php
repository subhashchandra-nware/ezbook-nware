@props([
    'menus',
    'name' => null,
    'childkey' => 'child',
])
{{-- {{ Request::is('book') ? 'active-Request' : '' }}
{{ Route::is('book.index') ? 'active-Route' : '' }} --}}
<ul class="menu-nav">
    @isset($name)
    <li class="menu-section">
        <h4 class="menu-text">{{ $name }}</h4>
        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
    </li>
    @endisset
    @foreach ($menus as $key => $menu )
    <li class="menu-item menu-item-submenu " aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:;" class="menu-link menu-toggle" title="{{ $menu['Description'] }}">
            <span class="menu-text"> {{ $menu['Name'] }}</span>
            @if ( count($menu[$childkey]) > 0)
            <i class="menu-arrow"></i>
            @endif
        </a>
        @if ( count($menu[$childkey]) > 0)
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                @foreach ($menu[$childkey] as $k => $submenu )
                <li class="menu-item " aria-haspopup="true">
                    <span class="menu-link" title="{{ $submenu['Description'] }}">
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
