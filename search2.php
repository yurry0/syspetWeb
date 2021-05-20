<?php 

include "conexao.php";

if(isset($_POST["cliente"])){

    $output = '';
    $query = "SELECT pk_id_cliente, cli_nome from cliente WHERE cli_nome LIKE '%".
    $_POST["cliente"]."%' LIMIT 1";
    $result = mysqli_query($conexao, $query);
    $output = '<ul class="list-unstyled">';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='<li>'.$row["cli_nome"].''.'</li>';

        }
    }

    else{

        $output.='<li> Cliente não Encontrado! </li>';
    }

    $output.='<ul>';
    echo $output;

}



?>