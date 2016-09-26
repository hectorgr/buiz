<div class="col-md-3 left_col" style="height: 100%">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a class="site_title" href="{{ route('home') }}">
                <i style="border: none; margin: 0; padding: 0;"><img class="img-circle" src="{{ url('images/buiz-icon2.jpg') }}" alt="Buiz Logo" style="height: 80%;"></i>
                <span> &nbsp; www.buiz.me &nbsp; </span>
            </a>
        </div>

        <div class="clearfix"></div>

        <div class="profile">
            <div class="profile_pic">
                @if(Auth::user()->photoName !== null)
                    <img class="img-circle profile_img" src="{{ url('imgs/profiles/') . Auth::user()->photoName . '.' . Auth::user()->photoExt }}" alt="{{ Auth::user()->names . ' ' . Auth::user()->lastName }}">
                @else
                    <img class="img-circle profile_img" src="{{ url('images/unknown-user.png') }}" alt="{{ Auth::user()->names . ' ' . Auth::user()->lastName }}">
                @endif
            </div>
            <div class="profile_info">
                <span>
                    @if(Auth::user()->sex === 'Male')
                        Bienvenido
                    @else
                        Bienvenida
                    @endif
                </span>
                <h2 class="text-ellipsis">{{ Auth::user()->names . ' ' . Auth::user()->lastName }}</h2>
            </div>
        </div>

        <br>

        <div class="main_menu_side hidden-print main_menu" id="sidebar-menu">
            <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Principal <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('home') }}">Inicio</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                    <li><a href="javascript:void(0)"><i class="fa fa-cog"></i> Configuración <span class="label label-success pull-right">Próximamente</span></a></li>
                </ul>
            </div>
        </div>

        <div class="sidebar-footer hidden-small">
            <a title="A1" data-toggle="tooltip" data-placement="auto">
                &nbsp;
            </a>
            <a title="A2" data-toggle="tooltip" data-placement="auto">
                &nbsp;
            </a>
            <a title="A3" data-toggle="tooltip" data-placement="auto">
                &nbsp
            </a>
            <a href="{{ route('logout') }}" title="Cerrar Sesión" data-toggle="tooltip" data-placement="right">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>

    </div>
</div>
