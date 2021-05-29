<?php

session_start();
include "conexao_crud.php";
$conn = conexao();


try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $id_cliente = substr($_POST['cliente'], 0, 1);
  $id_pet =  $_POST['ID'];
  $nome = $_POST['nome'];

  $adotado = true;

  $stmt = $conn->prepare("UPDATE adocao SET id_cliente = :id_cliente , id_pet = :id_pet WHERE  ");

  $stmt->bindParam(':id_cliente', $id_cliente);
  $stmt->bindParam(':id_pet', $id_pet);


  $stmt->execute(); 
  



$_SESSION['edit'] = "Dados editados com sucesso! ";
} catch(PDOException $e) {
$_SESSION['edit'] = "Error: " . $e->getMessage();
}
$conn = null;


header('Location: index_adocao.php');


?>