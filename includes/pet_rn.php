<?php 


class pet_rn{


function buscaTotal(){

    require_once "includes/pet_data.php";

    $petData = new petData();

    $dados = $petData->buscaTotal();

    

    if ($dados){

        return $dados;

    }
    else{

         $_SESSION['MensagemErro'] = "Não foi possível encontrar nenhum dado.";
         return false;
    }

}


}




?>