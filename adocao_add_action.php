<?php

session_start();
include "conexao_crud.php";

$conn = conexao();

try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // prepare sql and bind parameters
    $cliente = $_POST['cliente'];
    $stmt = $conn->prepare("INSERT INTO adocao(fk_id_cliente) SET id_cliente = (SELECT pk_id_cliente FROM cliente WHERE cli_nome = $cliente)");
    $stmt->execute();
    $raca = $_POST['raca'];
    $stmt2 = $conn->prepare("INSERT INTO adocao(fk_id_pet) VALUES(SELECT pk_id_pet from pet where raca = $raca)");
   
    
    $stmt2->execute();

    
  
  $_SESSION['add'] = "Adicionado com sucesso!";
  } catch(PDOException $e) {
  $_SESSION['add'] = "Error: " . $e->getMessage();
  }
  $conn = null;
  
  
  header('Location: index_adocao.php');
  
  
  ?>