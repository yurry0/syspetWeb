<?php

if(!function_exists("protect")){


        function protect(){

            if(!isset($_SESSION))
                session_start();

            if(!isset($_SESSION['usuario']) || !is_string($_SESSION['usuario']))
            header("Location: index.php");

        }

}


?>