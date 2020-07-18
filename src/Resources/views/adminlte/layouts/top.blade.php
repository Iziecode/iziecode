<nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <x-ez-icon name="menu-outline" />
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <x-ez-icon name="notifications-outline" />
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{ url('/vendor/iziecode/dist/img/avatar.png') }}" class="avatar-image" alt="">
                {{-- <div class="avatar avatar-sm">O</div> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">I Komang Oka Nuantara</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <x-ez-icon name="person-outline" class="mr-2 icon-center"/> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" onclick="document.getElementById('frmLogout').submit()" class="dropdown-item">
                    <x-ez-icon name="power-outline" class="mr-2 icon-center"/> Keluar
                </a>
                <form id="frmLogout" method="POST" action="/logout">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
