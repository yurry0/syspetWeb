<?php

include 'conexao_crud.php';
$query = $pdo->prepare("SELECT `img_pet, tipo` FROM `pet` WHERE `id` = :id" );
$query->execute(array(':id'=>$_GET['id']));
$query->bindParam(':tipo', $tipo);
$query->bindParam(':img_pet', $img_pet);


$tipo = 
$data = $query->fetch();


if(empty($data)){
    header("HTTP/1.0 404 Not Found");
}
else {
    header('Content-type:');
    echo $data['content'];
}

?>