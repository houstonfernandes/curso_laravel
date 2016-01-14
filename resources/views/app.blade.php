<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <title>Curso laravel - CodeCommerce</title>
</head>

<body class="@yield('body-class', 'docs') language-php">
    <div class="row'">
        <div class="col-md-6">
            Menu
        </div>
        <div class="col-md-6">
            login
        </div>
    </div>

	@yield('content')
<footer class="col-md-12">
    School of Net
</footer>
</body>
</html>
