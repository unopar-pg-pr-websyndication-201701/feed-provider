<nav class="navbar navbar-inverse">
    <div class="container">
        @if (Route::has('login'))
            <ul class="nav navbar-nav ">
                <li><a href="{{ url('/') }}" class="navbar-brand">Início</a></li>
            </ul>
    
            <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('atom')}}" class="">
                            <img src="/images/feed/atom-icon.png" alt="Gerar Atom" style="height:45px;width:45px;">
                        </a>
                    </li>                    
                    <li><a href="{{route('rss')}}" class="">
                            <img src="/images/feed/rss-icon.png" alt="Gerar RSS" style="height:40px;width:40px;">
                        </a>
                    </li>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Acessar</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Noticias <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('cadastrarNoticia') }}">Nova</a>
                            </li>
                            <li>
                                <a href="{{ route('listarNoticias') }}">Listar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categorias <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{url('adicionar/categoria')}}">Nova</a>
                            </li>
                            <li>
                                <a href="{{url('categorias')}}">Listar</a>
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        @endif
    </div>
</nav>