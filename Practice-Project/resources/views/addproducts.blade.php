<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ADD PRODUCT</title>
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
    <form action="{{ route('addproduct') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div>  
        <label> Product Name</label>
          <input type="text" name="Pname" placeholder="Product Name" value="{{ old('Pname') }}">
        @error('Pname')
          <span class="error">{{$message}}</span>
        @enderror
      </div>
      <div>      
        <label> Category</label>
          <input type="text" name="Pcategory" placeholder="Category Name">
        @error('category')
          <span class="error">{{$message}}</span>        
        @enderror
      </div>
      <div>      
        <label> Price</label>
          <input type="number" name="Pprice" placeholder="Price" value="{{ old('Pprice') }}">
        @error('Pprice')
          <span class="error">{{$message}}</span>
        @enderror
      </div>

        <button type="submit" > Add Product </button> 
  </form>   
  </body>
</html>