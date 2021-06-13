<?php

session_start();
include "conexao_crud.php";

$conn = conexao();
$email = trim($_POST['email']);
$deu_ruim = "";
try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("SELECT cli_email FROM cliente WHERE cli_email = :cli_email");
  $stmt->bindParam(':cli_email', $email);
  $stmt->execute();

  $result = $stmt->rowCount();
  if ($result > 0) {
    $deu_ruim = '1';
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

if ($deu_ruim == '1') {
  $_SESSION['email_error'] = 'Já existe um usuário cadastrado com este email.';
  header('Location: cliente_add_form.php');
} else {



  try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO cliente (cli_nome, cidade, cli_rg, cli_estado, cli_cep, cli_endereco, cli_bairro, cli_email)
    VALUES (:cli_nome, :cidade, :cli_rg, :cli_estado, :cli_cep, :cli_endereco, :cli_bairro, :cli_email)");
    $stmt->bindParam(':cli_nome', $nome);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':cli_rg', $rg);
    $stmt->bindParam(':cli_estado', $estado);
    $stmt->bindParam(':cli_cep', $cep);
    $stmt->bindParam(':cli_endereco', $endereco);
    $stmt->bindParam(':cli_bairro', $bairro);
    $stmt->bindParam(':cli_email', $email);


    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $rg = $_POST['rg'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];



    $stmt->execute();



    $_SESSION['add_cliente'] = "Adicionado com sucesso!";
  } catch (PDOException $e) {
    $_SESSION['add_cliente'] = "Error: " . $e->getMessage();

    echo $e->getMessage();
  }
  $conn = null;


  var_dump($result);
  echo "";
  echo ($deu_ruim);



  header('Location: cliente_index.php');
}
