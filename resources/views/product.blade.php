<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body>
    <h2>Products</h2>
    @foreach ($products as $product)
        <div class="product">
            <img src="product-image.jpg" alt="Product Image">
            <h2>{{$product->name}}</h2>
            <span class="price">${{number_format($product->price,2)}}</span>
            <span class="description">{{$product->description}}</span>
            <a href="{{route('scan',$product->product_code)}}">scan</a>
        </div>
    @endforeach
    <span>Total Price : ${{number_format($total_price,2)}}</span>


</body>
</html>
