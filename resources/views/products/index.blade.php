<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    <main>
      @foreach($products as $product)
      <article>
        <h2><a href="/product/{{$product->id}}"> {{$product->name}} </a></h2>
        <img style="width: 400px" class="product-image" src={{$product -> imageURL}} alt={{$product->name}}>
        <p>{{$product -> description}}</p>
        <p>{{$product -> price}}</p>
      </article>
      @endforeach
    </main>
</body>
</html>