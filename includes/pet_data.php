<?php 


class petData{
function buscaTotal(){

    $conn = new mysqli("localhost", "root", "", "syspet");
    $query = "SELECT * from syspet.pet";

    $result = $conn->query($query);
    return $result;

}

}

?>