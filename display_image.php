<?php

$hostname = "localhost";
$dbname = "syspet";
$username = "root";
$password = "";


$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = "select * from pet";
$result = mysqli_query($conn, $sql);

if(isset($GET_['pk_id_pet'])){

    $id = mysqli_real_escape_string($_GET['pk_id_pet'], $conn);
    $query = mysqli_query("SELECT 'img_pet' FROM pet WHERE 'pk_id_pet' = '$id'", $conn);

    while($row = mysqli_fetch_assoc($query)){
        $imageData = $row["img_pet"];

    }
    header("content-type: image/jpg");
}

else
{echo "Error!";}

?>