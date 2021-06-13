<?php

if(!function_exists("protect")){

        function protect(){

            if(!isset($_SESSION))

            if($_SESSION['usuario'] == null){
            header("Location: index.php");
        }
        }

}


?>