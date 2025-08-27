<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg p-4">
        <a href="{{route('contacts.index')}}" class="navbar-brand" >Home</a>
        <a href="{{route('contacts.create')}}" class="btn btn-outline-secondary">Add Contact</a>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html>