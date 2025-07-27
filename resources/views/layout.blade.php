<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List App</title>
</head>
<body>
    <nav>
        <a href="{{route('contacts.index')}}">Home</a>
        <a href="{{route('contacts.create')}}">Add Contact</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>