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


  $stmt = $conn->prepare("INSERT INTO adocao(id_cliente, id_pet) VALUES (:id_cliente , :id_pet)");

  $stmt->bindParam(':id_cliente', $id_cliente);
  $stmt->bindParam(':id_pet', $id_pet);


  $stmt->execute();

  $stmt = $conn->prepare("INSERT INTO pet(adotado) VALUES(TRUE) WHERE nome = :nome");
  $stmt->bindParam(':nome', $nome);
  $stmt->execute();





  $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
  $_SESSION['error'] = "Error: " . $e->getMessage();
}
$conn = null;

echo 'Id do PET: ' . $id_pet;
echo '<br>';
echo '<br>';
echo 'ID do cliente: ' . $id_cliente;
echo '<br>';


  
//header('Location: index_adocao.php');
