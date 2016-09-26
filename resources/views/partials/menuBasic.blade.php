<div class="top_nav">
    <div class="nav_menu">
        <nav role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="user-profile dropdown-toggle" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->photoName !== null)
                            <img src="{{ url('imgs/profiles/') . Auth::user()->photoName . '.' . Auth::user()->photoExt }}" alt="{{ Auth::user()->names . ' ' . Auth::user()->lastName }}">
                        @else
                            <img src="{{ url('images/unknown-user.png') }}" alt="{{ Auth::user()->names . ' ' . Auth::user()->lastName }}">
                        @endif
                            {{ Auth::user()->names }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                    </ul>
                </li>

                <li class="dropdown" role="presentation">
                    <a class="dropdown-toggle info-number" href="javascript:void(0);" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">1</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" id="menu1" role="menu">
                        <li>
                            <a>
                                <span>
                                  <span>Nuevo Examen</span>
                                  <span class="time">01/01/2016 15:34</span>
                                </span>
                                <span class="message">
                                  Hay un nuevo examen pendiente en Matemáticas
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
