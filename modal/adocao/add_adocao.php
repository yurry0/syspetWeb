<?php 

$id = $_POST['ID'];
$nome = $_POST['nome'];
$raca = $_POST['raca'];
$sexo = $_POST['sexo'];
$idade = $_POST['idade'];
$altura = $_POST['altura'];
$peso = $_POST['peso'];
$porte = $_POST['porte'];
$vacinas = $_POST['vacinas'];
$especie = $_POST['especie'];

$conn = conexao();
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM pet WHERE pk_id_pet=:pk_id_pet");
    $stmt->bindParam(':pk_id_pet', $id);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
//echo "</table>";



?>