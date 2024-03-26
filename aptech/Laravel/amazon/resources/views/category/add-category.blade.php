<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Category</title>
    <style>
      .error{
        color: red;
      }
    </style>
</head>
<body>
    <form method="POST" action="add-category" enctype="multipart/form-data" >
        @csrf
      <div>  
        <label> Category Name</label>
        <input type="text" name="name" placeholder="Category name" value="{{ old('name') }}">
          @error('name')
            <span class="error">{{$message}}</span>
          @enderror
      </div>
      <div>      
        <label>Category Description</label>
        <input type="textarea" name="description" placeholder="Category Description" value="{{ old('description') }}">
          @error('description')
            <span class="error">{{$message}}</span>
          @enderror
      </div>
      <div>      
        <label>Category Image</label>
        <input type="text" name="image" placeholder="Image">
          @error('image')
            <span class="error">{{$message}}</span>
          @enderror
      </div>
 
      <button type="submit" > Add Category </button>
      

    </form>    
    
</body>
</html>