<!doctype html>
<html lang="lv">
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous"
    >
    <link href="{{ asset('css/main.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/style.css">
    </head>
 <body class="d-flex flex-column min-vh-100">
 <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">{{ $title }}</span>
      </a>
      <nav class="nav justify-content-center">
        <a class="nav-link active" aria-current="page" href="/">Home</a>
        <a class="nav-link active" aria-current="page" href="#">Game</a>
        </nav>
    </header>
    <div class="center">
        <div class="wrapper">
        <h1>Guess the F1 Team</h1>
        <div class="content">
            <input type="text" class="typing-input" maxlength="1">
            <div class="inputs"></div>
            <div class="details">
            <p class="hint">Hint: <span></span></p>
            <p class="guess-left">Remaining guesses: <span></span></p>
            <p class="wrong-letter">Wrong letters: <span></span></p>
            </div>
            <button class="reset-btn">Reset Game</button>
        </div>
        </div>
    </div>
    
    
    
    <footer class="text-bg-dark mt-3 mt-auto">
        <div class="container">
            <div class="row py-5"> 
                <div class="col">
                Daniels Balika,<br>
                <?php
                
                echo "Today is " . date("Y.m.d") ." ". date("l"). "<br>";
                
                ?>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/words.js"></script>
    <script src="js/script.js"></script>
 </body>
</html>