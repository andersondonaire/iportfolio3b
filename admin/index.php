<?php

session_start();

if(isset($_POST['logar'])){

    $form_usuario = $_POST['usuario'] ?? "";
    $form_senha = $_POST['senha'] ?? "";

    include "./connect.php";

    $db = connect::select("SELECT *, COUNT(id) AS  qt FROM usuario WHERE login = '{$form_usuario}' GROUP BY id");

    if($db['qt'] == 0){
        echo "Usuário não existe<br>";
        echo "<button onclick=\"history.back()\">Voltar</button>";
        exit();
    }

    if($db['senha'] != $form_senha){
        echo "A senha está incorreta";
        echo "<button onclick=\"history.back()\">Voltar</button>";
        exit();     
    }

    $_SESSION['usuario'] = $db['login'];

    header("Location:home.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Login</h1>
    <div class="container">
        <form class="form-group" action="" method="post">

            <div class="col-md-4 offset-md-4">

                <div class="row">
                    <label class="label" for="usuario">Login</label>
                    <input class="form-control" type="text" id="usuario" name="usuario">
                </div>

                <div class="row">
                    <label for="senha" class="label">Senha</label>
                    <input class="form-control" type="password" id="senha" name="senha">
                </div>
                <div class="row">
                    <input class="form-control btn btn-success" type="submit" id="logar" name="logar" value="Logar">
                </div>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>