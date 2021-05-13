<?php

session_start();
include "conexao_crud.php";
$conn = conexao();

function get_file_extension($img_pet)
{

    return pathinfo($img_pet, PATHINFO_EXTENSION);
}




if ($_POST['especie'] == 'cachorro') {

    $post_vacina = $_POST['vacina_cao_gato'];

    $post_pelagem = $_POST['pelo_cao'];
}




try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $vacinas = $post_vacina;
    $pelagem = $post_pelagem;
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
    $especie = $_POST['especie'];
    $porte = $_POST['porte'];
    $adotado = $_POST['adotado'];

    // prepare sql and bind parameters

    //$stmt = $conn->prepare("INSERT INTO pet(raca, sexo, idade, vacinas, altura, peso, img_pet)
    // VALUES (:raca, :sexo, :idade,:vacinas, :altura, :peso, :img_pet )");

    $stmt = $conn->prepare("INSERT INTO pet(raca, sexo, idade, vacinas, altura, peso, img_pet, tipo, especie, pelagem, porte, adotado)
    VALUES (:raca, :sexo, :idade,:vacinas, :altura, :peso, :img_pet,  :tipo, :especie, :pelagem, :porte, :adotado )");

    $stmt->bindParam(':raca', $raca);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':vacinas', $vacinas);
    $stmt->bindParam(':altura', $altura);
    $stmt->bindParam(':peso', $peso);
    $stmt->bindParam(':img_pet', $newName);

    $stmt->bindParam(':img_pet', $img_pet);
    $stmt->bindParam(':tipo', $tipo);

    $stmt->bindParam(':especie', $especie);
    $stmt->bindParam(':especie', $tipo);




    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $vacinas = $_POST['vacinas'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $img_pet = $_FILES['img_pet'];
    $tipo = "image/" . get_file_extension($img_pet);


    $stmt->execute();




    $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
    $_SESSION['add'] = "Error: " . $e->getMessage();
}
$conn = null;


header('Location: index_pet.php');
