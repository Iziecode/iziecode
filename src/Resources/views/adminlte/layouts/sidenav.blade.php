<aside class="main-sidebar sidebar-light-success elevation-4">
    <a href="/" class="brand-link navbar-success">
        <img src="/dist/img/AdminLTELogo.png" alt="Company Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light" style="color:white"><b>PTSP</b></span>
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
                @foreach (\Iziedev\Iziecode\App\Helpers\AppHelper::renderMenu() as $menu)
                    @include(load_view('layouts.navigator'),['menu' => $menu])
                @endforeach
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('frmLogout').submit()">
                    <i class="nav-icon fas fa-door-closed"></i>
                    Logout</a>
                    <form id="frmLogout" method="POST" action="/logout">
                        @csrf
                    </form>
                </li>
            </ul>
            {{-- @include('panel.layouts.navigator') --}}
        </nav>
    </div>
</aside>
