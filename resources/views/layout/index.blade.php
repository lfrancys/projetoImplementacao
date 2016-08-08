<!DOCTYPE html>
<html>
<head>
    <title>Loja</title>
    @include('layout.css')
</head>
<body>

    <div class="jumbotron">
        <div class="container text-center">
            <h1>Online Store</h1>
        </div>
    </div>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('meu-carrinho.index')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Meu Carrinho</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    @if(Auth::guest())
                            <a href="{{route('autenticacao.login.index')}}"><span class="glyphicon glyphicon-user"></span> Login</a>
                    @else
                            <a href="{{route('autenticacao.logout')}}">Logout</a>
                    @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="content">
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success">
                {!! Session::get('success') !!}
            </div>
        @endif

        @yield('content')
    </div>
    <br><br>

    <footer class="container-fluid text-center">
        <p>Online Store Copyright</p>
    </footer>

</body>
</html>