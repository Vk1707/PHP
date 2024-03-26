<html>
    <head>
        <style>
            table{
                width: 100%;
                border: 1px solid gray;
                border-collapse: collapse;
            }

            td{
                border: 1px solid gray;
            }
        </style>
    </head>
    <body>
        <h1>Products</h1>
        <a href="{{ route('add-product-form') }}">Add Product</a>
        <table>
            <tr>
                <td>Id</td>
                <td>Category</td>
                <td>Name</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    @foreach ($product->images as $image)
                        <img src="{{ asset('/storage/' . $image->url)}}" width="100px" height="100px">                        
                    @endforeach
                </td>
                <td><a href="{{ route('delete-product', ['id'=>$product->id]) }}">Delete</a> | <a href="{{ route('update-product-form', ['id'=>$product->id]) }}">Update</a></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>