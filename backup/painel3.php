<?php
session_start();
$logado = $_SESSION['usuario'];
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('location:index2.php');
  }


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            background-color: #eee;
        }

        .container-box {
            margin: 20px auto;
            width: 400px;
            height: 400px;
            background-color: #fff;
            display: grid;
            grid-template-columns: 200px 200px;
            grid-row: auto auto;
            grid-column-gap: 20px;
            grid-row-gap: 20px;
        }

        .box {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            font-family: sans-serif;
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Principal</title>


    <?php include "conexao_crud.php";
    ?>



    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php 
        
        include('includes/navbar.php');

        ?>
    
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Página Inicial - Bem vindo <?php echo $_SESSION['usuario']; ?> </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">

                        <!-- /.col-md-6 -->
                        <div class="col-lg-12">
                            <div class="container-box">

                                <div class="box"><a href="index_cliente.php">Clientes</a></div>
                                <div class="box"><a href="index_pet.php">Pets</a></div>
                                <div class="box"> <a href="index_adocao.php"> Adoções</a></div>
                                <div class="box">Catálogo</div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php

                include("includes/footer.php");

                ?>
                <!-- SweetAlert2 -->
                <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
                <!-- jQuery -->
                <script src="plugins/jquery/jquery.min.js"></script>
                <!-- Bootstrap 4 -->
                <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- AdminLTE App -->
                <script src="dist/js/adminlte.min.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="dist/js/demo.js"></script>



                <script>
                    $('#confirm-delete').on('show.bs.modal', function(e) {
                        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                    });
                </script>




                <!-- DataTables -->
                <script src="plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="plugins/toastr/toastr.min.js"></script>
               
</body>

</html>