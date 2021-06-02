<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

function get_file_extension($img_pet)
{
    return pathinfo($img_pet, PATHINFO_EXTENSION);
}


try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters

    if (!$_POST['vacina_cao_gato'] == NULL) {
        $result =  implode(" , ", $_POST['vacina_cao_gato']);
    } else {

        $result2 = implode(",", $_POST['vacina_cavalo']);
    }


    if ($result2 == NULL) {
        $vacinas = $result;
    } else {
        $vacinas = $result2;
    }


    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $img_pet = $_FILES['img_pet'];
    //verificação para ver se existe um arquivo enviado junto com o novo chamado 
    if (!empty($img_pet['name'])) {
        $anexo = $img_pet['name'];

        $extensao = pathinfo($anexo, PATHINFO_EXTENSION);
        $name = pathinfo($anexo, PATHINFO_FILENAME);

        $newName = $name . uniqid() . '.' . $extensao; //criando o h
        $folder = "Uploads/";
        $pathFolder = $folder . $newName;
        if (!file_exists($folder)) {
            mkdir($folder);
        }
        move_uploaded_file($_FILES['img_pet']['tmp_name'], $pathFolder);
    }






    $stmt = $conn->prepare("INSERT INTO pet(nome, raca, sexo, idade, vacinas, altura, peso, img_pet, tipo, especie, pelagem, porte, adotado)
    VALUES (:nome, :raca, :sexo, :idade, :vacinas , :altura, :peso, :img_pet, :tipo, :especie, :pelagem, :porte, :adotado)");

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':raca', $raca);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':vacinas', $vacinas);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':especie', $especie);
    $stmt->bindParam(':pelagem', $pelagem);
    $stmt->bindParam(':porte', $porte);
    $stmt->bindParam(':img_pet', $newName);
    $stmt->bindParam(':adotado', $adotado);

    $nome = $_POST['nome'];
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $adotado = 0;
    $especie = $_POST['especie'];
    $porte = $_POST['porte'];

    if (!empty($_POST['pelo_cao'])) {

        $pelagem = $_POST['pelo_cao'];
    
      } else if (!empty($_POST['pelo_gato'])) {
        $pelagem = $_POST['pelo_gato'];
      } else if (!empty($_POST['pelo_cavalo'])) {

        $pelagem = $_POST['pelo_cavalo'];
      }

 
    $tipo = "image/" . get_file_extension($img_pet);

    $stmt->execute();
    $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
    $_SESSION['add'] = "Error: " . $e->getMessage();
}

$conn = null;

header('Location: index_pet.php');
