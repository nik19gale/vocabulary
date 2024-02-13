<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{route('parts.index')}}">Parts</a> | 
            <a href="{{route('tags.index')}}">Tags</a> | 
            <a href="{{route('words.index')}}">Words</a>
        </nav>
    </header>
    <hr>
    <h1>@yield('title')</h1>

    @yield('main')
</body>
</html>