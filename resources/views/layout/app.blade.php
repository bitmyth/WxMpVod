<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VOD</title>

    @yield('css')
</head>
<body>
<div class="container">
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>

        @else
            @role('admin')
            <li><a href="{{ url('/admin') }}">
                    <p>admin</p>
                </a>
            </li>

            @endrole
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

            <ul class="dropdown-menu" role="menu">
                <form class="navbar-form navbar-left" action="{{route('logout')}}" method="post">
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
            </ul>
            </li>
        @endif
    </ul>

    @yield('content')
</div>
@yield('script')
</body>
</html>
