<?php
session_start();
//include "includes/protect.php";
//include('verifica_login.php');


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}
html{
  background-color:#eee;
}
.container-box{
  margin: 20px auto;
  width:400px;
  height:400px;
  background-color:#fff;
  display:grid;
  grid-template-columns: 200px 200px;
  grid-row: auto auto;
  grid-column-gap: 20px;
  grid-row-gap: 20px;
  }.box{
    background-color:#333;
    padding:20px;
    border-radius:10px;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:40px;
    font-family:sans-serif;
  }






</style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Principal</title>


    <?php    include "conexao_crud.php";
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
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="../../index3.html" class="navbar-brand">
                    <img src="img/pet-care.png" alt="PET" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Syspet</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Suporte</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">CRUD</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="index_cliente.php" class="dropdown-item">Clientes</a></li>
                                <li><a href="index_pet.php" class="dropdown-item">Pets</a></li>
                                <li><a href="index_adocao.php" class="dropdown-item">Adoções</a></li>
                                

                                <li class="dropdown-divider"></li>

                                <!-- Level two dropdown-->
                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>

                                        <!-- Level three dropdown-->
                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Level three -->

                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li>
                                <!-- End Level two -->
                            </ul>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->

                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->



                </ul>
            </div>
        </nav>
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
                        <div class="box" > <a href="index_adocao.php"> Adoções</a></div> 
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
                        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
                        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
                        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
                        <script>
                            $(function() {
                                $("#example1").DataTable({
                                    "responsive": true,
                                    "autoWidth": false,
                                });
                            });
                        </script>


</body>

</html>