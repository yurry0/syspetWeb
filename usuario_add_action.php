<?php


session_start();

include("conexao.php");

//Obtenção de campos do form:

if (empty(trim(($_POST['nome'])))) {

    $_SESSION['nome_vazio'] = true;
    header('Location: usuario_add_form.php');
}

if (empty(trim(($_POST['senha'])))) {

    $_SESSION['senha_vazia'] = true;
    header('Location: usuario_add_form.php');
}




$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));

$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$confirm_email = mysqli_real_escape_string($conexao, trim($_POST['confirm_email']));

$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$confirm_senha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirm_senha'])));


//Algoritmo pra confirmar se email e senha são iguais:

if ($confirm_email !== $email) {

    $_SESSION['invalid_email'] = true;
    header('Location: usuario_add_form.php');
    exit;
} else {
}

if ($confirm_senha !== $senha) {

    $_SESSION['invalid_senha'] = true;
    header('Location: usuario_add_form.php');
    exit;
} else {
}

$sql = "select count(*) as total from usuario where usuario = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {

    $_SESSION['usuario_existe'] = true;

    header('Location: usuario_add_form.php');

    exit;
}

$sql = "INSERT INTO usuario (usuario, senha, nome, data_cadastro) VALUES ('$email', '$senha', '$nome', NOW())";

if ($conexao->query($sql) === TRUE) {

    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: index2.php');
exit;
