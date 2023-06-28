<html>
    <head>
        @if ($title)
                <title>{{ $title }}</title>
        @else
                <title>School App</title>
        @endif
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
