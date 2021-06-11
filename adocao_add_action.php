<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

$deu_ruim;
try {
  $nome_cliente = $_POST['cliente'];
  $id_cliente = substr($_POST['cliente'], 0, 1);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM cliente WHERE pk_id_cliente=:pk_id_cliente");
  $stmt->bindParam(':pk_id_cliente', $id_cliente);
  $stmt->execute();
  // set the resulting array to associative
  $result = $stmt->rowCount();
  if (!$result > 0 ) {
   
    $deu_ruim = '1';

  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}


if ($deu_ruim == '1') {
  $_SESSION['null'] = 'Não há registros do cliente selecionado no banco de dados. Tente novamente.';
  header('Location: catalogo.php');
} else {

  //Coletar dados do banco de dados para criação do recibo - Parte do Pet

  try {
    $id = $_POST['ID'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM pet WHERE pk_id_pet=:pk_id_pet");
    $stmt->bindParam(':pk_id_pet', $id);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
      $nome = $v['nome'];
      $especie = $v['especie'];
      $raca = $v['raca'];
      $sexo = $v['sexo'];
      $idade = $v['idade'];
      $vacinas = $v['vacinas'];
      $altura = $v['altura'];
      $peso = $v['peso'];
      $img_pet = $v['img_pet'];
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  //Coletar dados do banco de dados para criação do recibo - Parte do Cliente

  try {
    $id_cli = $_POST['cliente'];
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM cliente WHERE pk_id_cliente=:pk_id_cliente");
    $stmt->bindParam(':pk_id_cliente', $id_cli);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
      $cli_nome = $v['cli_nome'];
      $cli_estado = $v['cli_estado'];
      $cli_email = $v['cli_email'];
      $cli_endereco = $v['cli_endereco'];
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }



  try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters

    //$id_cliente = $_POST['cliente'];
    $nome_cliente = $_POST['cliente'];
    $id_cliente = substr($_POST['cliente'], 0, 1);
    $id_pet =  $_POST['ID'];
    $nome = $_POST['nome'];

    $adotado = true;

    $stmt = $conn->prepare("INSERT INTO adocao(id_cliente, id_pet) VALUES (:id_cliente , :id_pet)");

    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_pet', $id_pet);


    $stmt->execute();

    $_SESSION['add_adocao'] = "Adicionado com sucesso!";
  } catch (PDOException $e) {
    $_SESSION['error_adocao'] = "Error: " . $e->getMessage();
  }

  try {
    $stmt = $conn->prepare("UPDATE pet SET adotado = true WHERE pk_id_pet = :pk_id_pet");
    $stmt->bindParam(':pk_id_pet', $id_pet);
    $stmt->execute();
  } catch (PDOException $e) {
    $_SESSION['error_adocao'] = "Error: " . $e->getMessage();
  }


  try {
    $stmt = $conn->prepare("SELECT * from adocao WHERE id_pet = :id_pet");
    $stmt->bindParam(':id_pet', $id_pet);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
      $data = $v['data_adocao'];
      $valid_date = date('d/m/y g:i A', strtotime($data));
    }
  } catch (PDOException $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
  }



  //Preencher variáveis usando SESSION, para que o POST persista por mais de uma tela.

  $_SESSION['nome'] = $nome;
  $_SESSION['raca'] = $raca;
  $_SESSION['sexo'] = $sexo;
  $_SESSION['idade'] = $idade;
  $_SESSION['vacinas'] = $vacinas;
  $_SESSION['altura'] = $altura;
  $_SESSION['peso'] = $peso;
  $_SESSION['nome_cliente'] =  $cli_nome;
  $_SESSION['valid_date'] = $valid_date;
  $_SESSION['foto_pet'] = $img_pet;

  echo $valid_date;

  echo $_POST['cliente'];


  $conn = null;


  header('Location: recibo.php');
}
