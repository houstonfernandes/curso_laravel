<!DOCTYPE html>
<html>
<head>
    <title>Code Commerce</title>
</head>
<body>
    <h1>Categories</h1>
    <div class="container">
        <ul>
        @foreach($categories as $category)
            <li>{{$category->name}}</li>
        @endforeach
        </ul>
    </div>
</body>
</html>
