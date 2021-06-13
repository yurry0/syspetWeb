<?php 


class petData{
function buscaTotal(){

    $conn = new mysqli("sql311.epizy.com", "epiz_28840085", "OYWcl4gPAM4T2", "epiz_28840085_sys_admin");
    $query = "SELECT * from epiz_28840085_sys_admin.pet WHERE adotado = 0";
    $result = $conn->query($query);
    return $result;

}

}

?>