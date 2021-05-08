<?php 

include "conexao.php";

if(isset($_POST["cliente"])){

    $output = '';
    $query = "SELECT pk_id_cliente, cli_nome from cliente WHERE cli_nome LIKE '%".
    $_POST["cliente"]."%'";
    $result = mysqli_query($conexao, $query);
    $output = '<ul class="list-unstyled">';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='<p>'.$row["cli_nome"].' '.'</p>';

        }
    }

    else{

        $output.='<p> Cliente não Encontrado! </p>';
    }

    $output.='<ul>';
    echo $output;

}



?>