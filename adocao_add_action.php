<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

$id_pet = $_POST['id'];
$nome = $_POST['nome'];
$cliente = $_POST['cliente'];

try {
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $teste = $conn->prepare("SELECT pk_id_cliente FROM cliente WHERE cliente.cli_nome = ':cli_nome'");

  $teste->bindParam(':cli_nome', $cliente);

  


  //$stmt = $conn->prepare("INSERT into adocao(id_cliente) VALUES (7);");
  //$stmt->bindParam(':cli_nome', $cliente);
  //$stmt->execute();


  //SELECT pk_id_pet FROM pet WHERE nome = ':nome'

  $stmt2 = $conn->prepare("INSERT INTO `adocao` (`id_cliente`, `id_pet`) VALUES ('7', :nome);");
  $stmt2->bindParam(':nome', $nome);
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
