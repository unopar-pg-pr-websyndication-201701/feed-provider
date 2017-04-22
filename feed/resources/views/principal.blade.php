<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap Core CSS-->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                @if (Route::has('login'))
                    <ul class="nav navbar-nav ">
                        <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

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

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @yield('conteudo')
                </div>
            </div> 
        </div>

        <!-- jQuery 3.2.1 -->
        <script src="{{asset('bootstrap/js/jquery.js')}}"></script>

        <!-- ModalJS
        <script src="{{asset('bootstrap/js/modal.js')}}"></script> -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    </body>
</html>
