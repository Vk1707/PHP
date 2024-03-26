<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Product</title>
    <style>
      .error{
        color: red;
      }

      form div{
        margin-bottom: 10px;
      }

      form label{
        width: 150px;
        display: inline-block;
      }
    
      form input,
      form select{
        width: 300px;
        border-radius: 4px;        
      }
    </style>
</head>
<body>
    <form method="POST" action="add-product" enctype="multipart/form-data" >
      @csrf

      <div>  
        <label> Product Name</label>
        <input type="text" name="name" placeholder="Product name">
        @error('name')
          <span class="error">{{$message}}</span>
        @enderror
      </div>
      <div>      
        <label> Category</label>
        <select name="category_id">
          <option value="">Select Category</option>
        @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        @error('category')
          <span class="error">{{$message}}</span>        
        @enderror
      </div>
      <div>      
        <label> Price</label>
        <input type="number" name="price" placeholder="Price" value="{{ old('price') }}">
        @error('price')
          <span class="error">{{$message}}</span>
        @enderror
      </div>
      <div>      
        <label>Product Image</label>
        <input type="file" name="images[]"   multiple>
      </div>
 
      <button type="submit" > Add Product </button>    
    </form>        
</body>
</html>