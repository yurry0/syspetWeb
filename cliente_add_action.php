<?php

session_start();
include "conexao_crud.php";

$conn = conexao();

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
    $email = $_POST['email'];
    
    
    $stmt->execute();
  
    
  
  $_SESSION['add'] = "Adicionado com sucesso!";
  } catch(PDOException $e) {
  //$_SESSION['add'] = "Error: " . $e->getMessage();

  echo $e->getMessage();
  }
  $conn = null;
  
  
  


  //header('Location: index_cliente.php');
  
  
  ?>