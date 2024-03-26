<!-- resources/views/layouts/app.blade.php -->
 
<html>
    <head>
        <title>App Name - @yield('title')</title>
        @stack('styles')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        @stack('scripts')
    </body>
</html>