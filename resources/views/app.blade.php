<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery-2.1.3.min.js') }}"></script>

    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>

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
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

	@yield('content')
<footer class="col-md-12">
    School of Net
</footer>
</body>
</html>
