<?php 


class petData{
function buscaTotal(){

    $conn = new mysqli("localhost", "root", "", "syspet");
    $query = "SELECT * from syspet.pet WHERE adotado = 0";


    $result = $conn->query($query);
    return $result;

}

}

?>