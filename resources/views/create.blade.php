<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h1>Create new products</h1>
    <form method="POST" action="/create">
        @csrf
        <label>
            Product name: 
            <input name="name">
        </label>
        
        <label>
            Image: 
            <input name="imageURL">
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