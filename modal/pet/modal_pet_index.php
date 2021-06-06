<?php 

// Busca e alimentação automatica de tabela



$conexao = conexao();

try {
  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conexao->prepare("SELECT * FROM pet");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach ($stmt->fetchAll() as $k => $v) {

    $valid_date = date('d/m/y g:i A', strtotime($v['data_cadastro']));



    echo '<tr>';
    echo '<td>' . '<img width="100" src="Uploads/' . $v['img_pet'] . '" />';

    echo '<td>' . $v['pk_id_pet'] . '</td>';
    echo '<td>' . $v['nome'] . '</td>';
    echo '<td>' . $v['especie'] . '</td>';
    echo '<td>' . $v['raca'] . '</td>';
    echo '<td>' . $v['sexo'] . '</td>';
    echo '<td>' . $v['idade'] . '</td>';
    echo '<td>' . $v['vacinas'] . '</td>';

    if (!$v['adotado'] == 1) {
      echo '<td> Não' . '</td>';
    } else {
      echo '<td> Sim </td>';
    }

    echo '<td>' .   $valid_date . '</td>';



    echo '<td style="text-align:center"> 

  <a id="ler" class="btn btn-primary btn-sm"  href="pet_read.php?id=' . $v['pk_id_pet'] . '">
  
 
  <i class="fa fa-search" title="Visualizar mais detalhes sobre o pet." aria-hidden="true">
  </i>
  </a>


  <a id="editar" class="btn btn-info btn-sm" href="pet_edit_form.php?id=' . $v['pk_id_pet'] . '">
     <i title="Editar as informações do pet."  class="fas fa-pencil-alt">
      </i>
  </a>
  
   
  <a class="btn btn-danger btn-sm" href="pet_delete.php?id=' . $v['pk_id_pet'] . '"data-href="pet_delete.php?id=' . $v['pk_id_pet'] . '" data-toggle="modal" data-target="#confirm-delete"">
  <i title="Excluir pet." class="fas fa-trash-alt"></i>
  </a>';
    echo '</tr>';
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
//echo "</table>";



?>