<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    @if($login)
    <h1>Hello {{$name}}</h1>
        <h2>My Skills</h2>

        <ul>
        @for($i=0;$i<count($skills);$i++)
            <li>{{$skills[$i]}}</li>
        @endfor
        </ul>

        <ul>
        @foreach($skills as $skill)
            <li>{{$skill}}</li>
        @endforeach
        </ul>

        <ul>
            @forelse($skills as $skill)
                <li>{{$skill}}</li>
            @empty
                <li>No Record Found</li>
            @endforelse
        </ul>

        <h1>{{$favoriteSkills}}</h1>
        @auth
        <h1>Execute only if the user is logged in.</h1>
        @endauth


        @guest 
        <h1>Execute only if the user is guest.</h1>
        @endguest 

        @php 
         $amount=1000;
        @endphp
    
        <h1>Amount {{$amount}}</h1>
    @else 
        <h1>Hello Guest
    @endif
</body>
</html>