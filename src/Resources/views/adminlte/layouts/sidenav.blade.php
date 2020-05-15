<aside class="main-sidebar sidebar-light-success elevation-4">
    <a href="/" class="brand-link navbar-success">
        <span class="brand-text font-weight-light" style="color:white"><b>{{app_name()}}</b></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{Auth::user()->user->photo ?? '/images/ksl.jpeg'}}" class="img-circle elevation-2"
                    alt="Oka">
            </div> --}}
            <div class="info">
                <a href="#" class="d-block">Oka</a>
                <span class="badge badge-success">Admin</span>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach (\Iziedev\Iziecode\Helpers\AppHelper::renderMenu() as $menu)
                    @include(load_view('layouts.navigator'),['menu' => $menu])
                @endforeach
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('frmLogout').submit()">
                        <x-ez-icon name="power-outline"/>
                        <p>Logout</p>
                    </a>
                    <form id="frmLogout" method="POST" action="/logout">
                        @csrf
                    </form>
                </li>
            </ul>
            {{-- @include('panel.layouts.navigator') --}}
        </nav>
    </div>
</aside>
