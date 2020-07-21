<li class="nav-item {{count($menu->subMenu) > 0 ? 'has-treeview' : ''}}">
    <a href="{{Route::has($menu->route_name) ? route("$menu->route_name") : '#'}}" class="nav-link " >
        <x-ez-icon name="{{ $menu->icon }}" class="nav-icon" />
        <p>
            {{$menu->name}}
            @if(count($menu->subMenu) > 0)
                <x-ez-icon name="chevron-down-outline" class="right" />
            @endif
        </p>
    </a>
    @if(count($menu->subMenu) > 0)
        <ul class="nav nav-treeview">
            @foreach ($menu->subMenu as $menu)
                @include(load_view('layouts.navigator'),['menu' => $menu])
            @endforeach
        </ul>
    @endif
</li>