@extends('templates.app')

@section('title', 'Test Page')


@push('styles')
    <style>
        .p-4{
            font-size:18px;
        }

        .none{
            display:none;
        }
    </style>
@endpush

@section('content')

<h1 class="p-4">Testing By {{$namet}}</h1>

<span @class([
    'p-4',
    'font-bold' => $isActive,
    'none' => ! $isActive,
    'bg-red' => $hasError,])>
    Account

</span>

<br>
<input type="checkbox" name="active" value="active" @checked($isActive) /> active

<br>
<select name="version">
    @foreach ($skills as $skill)
        <option  @selected($favoriteSkill==$skill)>
            {{$skill}}
        </option>
    @endforeach
</select> 

<br>
<button type="submit" @disabled($isActive)>Submit</button>

<br>
<input type="email" name="email" value="email@laravel.com" @readonly($isActive) />

<h1>Login Form</h1>
@includeUnless(Auth::check(),'account.login', ['cartId'=>'111'])


<h1>Products</h1>
<div class='products'>
    @each('templates.product', $products, 'product')
    
</div>
@endsection

