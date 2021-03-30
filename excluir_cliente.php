<?php

session_start();
include "conexao_crud.php";



try {
  $conn = conexao();
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("DELETE FROM cliente WHERE pk_id_cliente=:pk_id_cliente");
  $stmt->bindParam(':pk_id_cliente', $id);

  $id =$_GET['id'];

  $stmt->execute();

  
  $_SESSION['del'] = "Deletado com sucesso";
  } catch(PDOException $e) {
  $_SESSION['del'] = "Error: " . $e->getMessage();
}
$conn = null;


header('Location: index_cliente.php');


?>