<aside class="main-sidebar sidebar-light-success elevation-4">
    <a href="/" class="brand-link navbar-white text-center">
        
        <span class="brand-text font-weight-light"><b>{{app_name()}}</b></span>
    </a>
    <div class="sidebar"> 
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach (\Iziedev\Iziecode\Helpers\AppHelper::renderMenu() as $menu)
                    @include(load_view('layouts.navigator'),['menu' => $menu])
                @endforeach

            </ul>
           
            {{-- @include('panel.layouts.navigator') --}}
        </nav>
    </div>
</aside>
