<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/poststyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    

</head>
<body>
    <header class="main_header">
        <nav>
        @yield("nav")
        </nav>
    </header>
    <main>
        @yield("content")
    </main>
    <footer>
        <p>© 2024 Website Design</p>
    </footer>
</body>
</html>
