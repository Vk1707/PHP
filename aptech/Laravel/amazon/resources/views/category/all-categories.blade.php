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
        <h1>Categories</h1>
        <a href="{{ route('add-category-form') }}">Add Category</a>
        <table>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>#Products</td>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{count($category->products)}}</td>
                <td><a href="{{ route('delete-category', ['id'=>$category->id]) }}">Delete</a> | <a href="{{ route('update-category-form', ['id'=>$category->id]) }}">Update</a></td>
            </tr>
            <tr>
                <td colspan="4">
                    <table>
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                        </tr>
                        @foreach($category->products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>