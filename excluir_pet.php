<?php

session_start();
include "conexao_crud.php";



try {
  $conn = conexao();
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("DELETE FROM pet WHERE pk_id_pet=:pk_id_pet");
  $stmt->bindParam(':pk_id_pet', $id);

  $id =$_GET['id'];

  $stmt->execute();

  
  $_SESSION['del'] = "Deletado com sucesso";
  } catch(PDOException $e) {
  $_SESSION['del'] = "Error: " . $e->getMessage();
}
$conn = null;


header('Location: index_pet.php');


?>