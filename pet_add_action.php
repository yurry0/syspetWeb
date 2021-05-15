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


    $result =  implode(" , ", $_POST['vacina_cao_gato']);




    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $vacinas = $result;
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


    $stmt = $conn->prepare("INSERT INTO pet(raca, sexo, idade, vacinas, altura, peso, img_pet, tipo, especie, pelagem, porte)
    VALUES (:raca, :sexo, :idade, :vacinas , :altura, :peso, :img_pet, :tipo, :especie, :pelagem, :porte)");

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

    $especie = $_POST['especie'];
    $pelagem = $_POST['pelo_cao'];
    $porte = $_POST['porte'];
    $tipo = "image/" . get_file_extension($img_pet);

    $stmt->execute();
    $_SESSION['add'] = "Adicionado com sucesso!";
} catch (PDOException $e) {
    $_SESSION['add'] = "Error: " . $e->getMessage();
}

$conn = null;


echo "Raça: ";
echo $raca;
echo '<br>';
echo "Sexo: ";
echo $sexo;
echo '<br>';
echo "Idade: ";
echo $idade;
echo '<br>';
echo "Peso: ";
echo $peso;
echo '<br>';
echo $altura;
echo '<br>';
echo 'Imagem:';
echo (implode(' ', $img_pet));
echo '<br>';
echo 'Vacinas:';
echo $vacinas;
echo '<br>';
echo "Tipo: ";
echo $tipo;
echo '<br>';
echo "Especie: ";
echo $especie;
echo '<br>';
echo "Porte: ";
echo $porte;
echo '<br>';
echo '<br>';



//header('Location: index_pet.php');