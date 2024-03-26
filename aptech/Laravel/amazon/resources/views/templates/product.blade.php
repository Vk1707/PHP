@once
    @push('styles')
        <style>
            .product{
                background: #ddd;
                padding:20px;
                display:inline-block;
            }
        </style>    
    @endpush
@endonce

<div class="product">
    <img src="{{$product['img']}}">
    <h2>{{$product['name']}}</h2>
    <p>Price : INR {{$product['price']}}
</div>