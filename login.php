<?php

    session_start();
include('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {

    header('Location: index2.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, md5($_POST['senha']));

$query = "SELECT usuario_id, usuario FROM usuario WHERE usuario = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
 
    $_SESSION['usuario'] = $usuario;
    $logged = true;
    header('Location: painel.php');
    exit();

}
else{
    $_SESSION['nao_autenticado'] = true;
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('Location: index.php');

}



