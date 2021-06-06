<?php
$conn = conexao();


try {
  $id = $_GET['id'];
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
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}


$conn = null;
//echo "</table>";

?>