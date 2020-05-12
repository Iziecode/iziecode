<li class="nav-item {{count($menu->subMenu) > 0 ? 'has-treeview' : ''}}">
    <a href="{{Route::has($menu->route_name) ? route("$menu->route_name") : '#'}}" class="nav-link " >
        <i class="{{ $menu->icon }}"></i>
        <p>
            {{$menu->name}}
            @if(count($menu->subMenu) > 0)
                <i class="fas fa-angle-left right"></i>
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