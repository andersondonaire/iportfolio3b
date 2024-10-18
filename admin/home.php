<?php
include "./verifica.php";
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adminstração do Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <header class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Plínio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=experiencia">Experiência</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=portfolio">Portifólio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=servicos">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=contato">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php?pg=footer">Rodapé</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
    <?php
    $pg = $_GET['pg']?? null;
     
    if(isset($pg)){
        include "./pg/{$pg}.php";
    }else{
        include "./pg/inicio.php";
    }
    ?>
    </div>

    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>