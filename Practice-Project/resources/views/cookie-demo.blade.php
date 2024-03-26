<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie Demo</title>
</head>
<body>
    @if($city)
        <h1>City : {{ $city }}</h1>
        <a href="/delete-cookie/{{ $city }}">Reset</a>
    @else 
    <form action="{{ route('add-cookie') }}" method="POST">
        @csrf
        <div>  
          <label> City Name</label>
            <input type="text" name="city" placeholder="City Name" >
        </div>   

          <button type="submit" > Add Cookie </button>
    </form>
    @endif      
</body>
</html>