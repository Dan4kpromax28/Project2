<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Project 2 - {{ $title }}</title>
</head>
<body>
    <nav class="navbar bg-primary mb-3" data-bs-theme="dark">
        <header class="container">
            <a class="navbar-brand" href="#">Project 2 - {{ $title }}</a>
        </header>
    </nav>
    <main class="container">
        <div class="row">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </main>
    <footer class="text-bg-dark mt-3">
        <div class="container">
            <div class="row py-5"> 
                <div class="col">
                Daniels Balika, 2024
                </div>
            </div>
        </div>
    </footer>
</body>
</html>