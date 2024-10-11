<?php

session_start();

$session_usuario = $_SESSION['usuario'];
include "./connect.php";
$db = connect::select("SELECT COUNT(id) as qt FROM usuario WHERE login = '{$session_usuario}'");

if($db['qt'] == 0){
    session_destroy();
    header("Location:index.php");
}

?>