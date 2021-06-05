<?php

session_start();
include "conexao_crud.php";
$conn = conexao();


try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("UPDATE cliente SET pk_id_cliente=:pk_id_cliente, cli_nome=:cli_nome, cidade=:cidade, cli_rg=:cli_rg, cli_estado=:cli_estado, cli_cep=:cli_cep, cli_endereco=:cli_endereco, cli_bairro=:cli_bairro, cli_email=:cli_email WHERE pk_id_cliente=:pk_id_cliente");
  $stmt->bindParam(':pk_id_cliente', $id);
  $stmt->bindParam(':cli_nome', $nome);
  $stmt->bindParam(':cidade', $cidade);
  $stmt->bindParam(':cli_rg', $rg);
  $stmt->bindParam(':cli_estado', $estado);
  $stmt->bindParam(':cli_cep', $cep);
  $stmt->bindParam(':cli_endereco', $endereco);
  $stmt->bindParam(':cli_bairro', $bairro);
  $stmt->bindParam(':cli_email', $email);
  

  $id = $_POST['pk_id_cliente'];
  $nome = $_POST['nome'];
  $cidade = $_POST['cidade'];
  $rg = $_POST['rg'];
  $estado = $_POST['estado'];
  $cep = $_POST['cep'];
  $endereco = $_POST['endereco'];
  $bairro = $_POST['bairro'];
  $email = $_POST['email'];

  
  $stmt->execute();



$_SESSION['edit'] = "Dados editados com sucesso!";
} catch(PDOException $e) {
$_SESSION['edit'] = "Error: " . $e->getMessage();
}
$conn = null;


header('Location: cliente_index.php');





?>