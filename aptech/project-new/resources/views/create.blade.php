<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create User</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            <br>
            <label for="mobile">Mobile:</label>
            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}">
            <br>
            <label>Interests:</label><br>
            <input type="checkbox" id="interest1" name="interests[]" value="Sports"> Sports<br>
            <input type="checkbox" id="interest2" name="interests[]" value="Music"> Music<br>
            <input type="checkbox" id="interest3" name="interests[]" value="Movies"> Movies<br>
            <br>
            <label for="country">Country:</label>
            <select id="country" name="country">
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Canada">Canada</option>
            </select>
            <br>
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="Male"> Male<br>
            <input type="radio" id="female" name="gender" value="Female"> Female<br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
