<?php

session_start();
include "conexao_crud.php";
$conn = conexao();



try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters


  //$id_cliente = $_POST['cliente'];

  $id_cliente = substr($_POST['cliente'], 0, 1);
  $id_pet =  $_POST['ID'];
  $nome = $_POST['nome'];

  $adotado = true;

  $stmt = $conn->prepare("INSERT INTO adocao(id_cliente, id_pet) VALUES (:id_cliente , :id_pet)");

  $stmt->bindParam(':id_cliente', $id_cliente);
  $stmt->bindParam(':id_pet', $id_pet);


  $stmt->execute();

  $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
  $_SESSION['error'] = "Error: " . $e->getMessage();
}

try {
  $stmt = $conn->prepare("UPDATE pet SET adotado = true WHERE pk_id_pet = :pk_id_pet");
  $stmt->bindParam(':pk_id_pet', $id_pet);
  $stmt->execute();
} catch (PDOException $e) {
  $_SESSION['error'] = "Error: " . $e->getMessage();
}



$conn = null;



header('Location: index_adocao.php');
