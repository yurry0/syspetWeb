<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO pet(raca, sexo, idade, vacinas, altura, peso, img_pet)
    VALUES (:raca, :sexo, :idade,:vacinas, :altura, :peso, :img_pet)");
    $stmt->bindParam(':raca', $raca);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':vacinas', $vacinas);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':img_pet', $img_pet);
    
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $vacinas = $_POST['vacinas'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $img_pet = $_POST['img_pet'];

    $stmt->execute();
  

    

 $_SESSION['add'] = "Adicionado com sucesso!";
 } catch(PDOException $e) {
 $_SESSION['add'] = "Error: " . $e->getMessage();
  }
 $conn = null;
  
 
header('Location: index_pet.php');
