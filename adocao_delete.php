<?php

session_start();
include "conexao_crud.php";


try {
  $conn = conexao();
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("UPDATE adocao SET deletado = true WHERE pk_id_adocao = :pk_id_adocao");
  $stmt->bindParam(':pk_id_adocao', $id);
  $id = $_GET['id'];
  $stmt->execute();
} catch (PDOException $e) {
  $_SESSION['error'] = "Error: " . $e->getMessage();
}
$conn = null;


//header('Location: index_adocao.php');

echo $id;
