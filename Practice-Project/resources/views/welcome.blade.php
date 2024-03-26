<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
  <body>
      <h1>{{ trans('labels.welcome', ['name'=>'Vivek']) }}</h1>
      @yield('content')
  </body>
</html>
