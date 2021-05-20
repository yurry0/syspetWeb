<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters


  $id_pet = $_POST['id'];
  $nome = $_POST['nome'];
  $cliente = $_POST['cliente'];

  $stmt = $conn->prepare("INSERT INTO adocao (fk_id_cliente) SELECT pk_id_cliente from cliente where cli_nome = :cli_nome");
  $stmt->bindParam(':cli_nome', $cliente);

  $stmt2 = $conn->prepare("INSERT INTO adocao (fk_id_pet) SELECT pk_id_pet from pet where nome = :nome");
  $stmt2->bindParam(':nome', $nome);

  $stmt->execute();
  $stmt2->execute();



  $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
  $_SESSION['add'] = "Error: " . $e->getMessage();
}
$conn = null;


echo $id_pet;
echo '<br>';
echo $nome;
echo '<br>';
echo $cliente;

  
//header('Location: index_adocao.php');
