<?php 

include "conexao.php";

if(isset($_POST["query"])){

    $output = '';
    $query = "SELECT pk_id_pet, raca from pet WHERE raca LIKE '%".
    $_POST["query"]."%'";
    $result = mysqli_query($conexao, $query);
    $output = '<ul class="list-unstyled">';

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){

            $output .='<li>'.$row["raca"].' , '.$row["pk_id_pet"].' '.'</li>';

        }
    }

    else{

        $output .='<li> Animal não encontrado! </li>';
    }

    $output .='<ul>';
    echo $output;

}
?>