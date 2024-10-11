<?php

if($_POST['logar']){

    $form_usuario = $_POST['usuario'];
    $form_senha = $_POST['senha'];



    
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
                    <label class="label" for="usuario">Usuário</label>
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