<?php 

include "conexao.php";

if(isset($_POST["cliente"])){

    $output = '';
    $query = mysqli_query($conexao, "SELECT pk_id_cliente, cli_nome from cliente WHERE cli_nome LIKE '%'");

    $output = '<ul class="listaCliente">';

    if(mysqli_num_rows($query) > 0){

        while($row = mysqli_fetch_array($query)){

            $output .='<p>'.$row["cli_nome"].' '.'</p>';

        }
    }

    else{

        $output .='<li> Cliente não Encontrado! </li>';
    }

    $output .='<ul>';
    echo $output;

}



?>