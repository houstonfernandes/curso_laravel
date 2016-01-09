<!DOCTYPE html>
<html>
<head>
    <title>Code Commerce</title>
    <style>
        table{
            width:80%;
        }
        table th{
            color:white;
            background-color:darkblue;
        }
    <</style>
</head>
<body>
    <h1>Products</h1>
    <div class="container">
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
            </tr>
        @endforeach
        </table>
    </div>
</body>
</html>
