<?php 

$conn = conexao();
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM adocao WHERE pk_id_adocao=:pk_id_adocao;");
    $stmt2 = $conn->prepare("SELECT * FROM adocao INNER JOIN cliente ON adocao.id_cliente = cliente.pk_id_cliente INNER JOIN pet ON adocao.id_pet = pet.pk_id_pet");
    $stmt->bindParam(':pk_id_adocao', $id);
    $id = $_GET['id'];
    $stmt->execute();
    $stmt2->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($stmt->fetchAll() as $k => $v) {

        $id = $v['pk_id_adocao'];
        $id_cliente = $v['id_cliente'];
        $id_pet = $v['id_pet'];
        $data_adocao = $v['data_adocao'];
    }
    foreach ($stmt2->fetchAll() as $k => $v){

        $nome_cliente = $v['cli_nome'];
        $raca_pet = $v['raca'];
        $idade_pet = $v['idade'];
        $vacinas = $v['vacinas'];
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
//echo "</table>";

?>

