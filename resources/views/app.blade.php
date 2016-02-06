<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>

    <title>Curso laravel - CodeCommerce</title>
</head>

<body class="@yield('body-class', 'docs') language-php">
    <div class="row'">

        <div class="col-md-12">
            <nav id=menu class='navbar navbar-default noprint'>
                <ul class="nav navbar-nav">
                    <li class='dropdown'>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Admin
                            <span class="caret"></span>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='{{route('admin.categories.index')}}'>
                                    Categories
                                </a>
                            </li>                    <li>
                                <a href='{{route('admin.products.index')}}'>
                                    Products
                                </a>
                            </li>
                            </li>
                            <li>
                                <a href='{{route('admin.users.index')}}'>
                                    Users
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="container">
        @include('partial.flash_message')
	    @yield('content')
    </div>
<footer class="col-md-12">
    School of Net
</footer>
</body>
</html>
