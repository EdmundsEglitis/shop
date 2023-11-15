<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    @if ($errors->any())

    <ul class="alert alert-danger">
        @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </ul>
    @endif
    <h1>Create new products</h1>
    <form method="POST" action="/products" enctype="multipart/form-data">
        @csrf
        <label>
            Product name: 
            <input name="name">
        </label>
        
        <label>
            Image: 
            <input name="imageURL" type="file" accept="image/*">
        </label>

        <label>
            Description:  
            <textarea name="description"> </textarea>
        </label>

        <label>
            Price 
            <input name="price" type="number" step="0.01" max="10000">
        </label>
    
        <button>Add</button>

    </form>
</body>
</html>