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
        <a href="{{ route('addproductform') }}">Add Product</a>
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
                <td>{{$product->Pcategory}}</td>
                <td>{{$product->Pname}}</td>
                <td>{{$product->Pprice}}</td>
                <td><a href="{{ route('delete-product', ['id'=>$product->id]) }}">Delete</a> | <a href="{{ route('update-product-form', ['id'=>$product->id]) }}">Update</a></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>