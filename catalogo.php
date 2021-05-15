<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>


    <?php
    session_start();
    include "conexao_crud.php";

    require_once 'includes/pet_rn.php';
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
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Some action </a></li>
                                <li><a href="#" class="dropdown-item">Some other action</a></li>

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
                            <h1 class="m-0"> Catalogo - Adoção </h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">

                <div class="container">
                    <!--   <div class="row">   -->
                    <?php


                    $adocao = new pet_rn();
                    $dados = $adocao->buscaTotal();
                    $contador = 0;
                    $novaLinha = true;

                    while ($row = $dados->fetch_assoc()) {


                        if ($novaLinha) {



                            echo "<div class='card-deck'>";
                            $novaLinha = false;
                        }



                        echo "<div class='card text-center'>";
                        echo "<img class='mx-auto' scr='img/pet-care.png'";
                        echo "<div class='card-body'>";

                        echo "<h5 class='card-title'>" . $row['raca'] . "</h5> <br>";
                        echo "<p class='card=text'>" . $row['peso'] . "</p>";

                        echo "<button type='button' class='modalButton btn btn-primary' data-toggle='modal' data-target='#detailsModal'
                            
                                data-id='" . $row['pk_id_pet'] . "'
                                data-img=Uploads/" . $row['img_pet'] . $row['tipo']."'
                                data-raca='" . $row['raca'] . "'
                                data-idade='" . $row['idade'] . "'
                                data-sexo='" . $row['sexo'] . "'
                                data-vacinas='" . $row['vacinas'] . "'
                                data-altura='" . $row['altura'] . "'
                                data-peso='" . $row['peso'] . "'>
                                Detalhes
                                </button>";
                        echo "</div>";
                        echo "";

                        $contador++;


                        if ($contador == 3) {

                            echo "";
                            $novaLinha = true;
                            $contador = 0;
                        }
                    }
                    ?>
                </div>
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

</body>


<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do Pet!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="adocao_add_form" method="POST">


                    <img id="imgPet" height="240" width="400">

                    <div class="row">
                        <div class="form-group">

                            <label for="raca"> Raça: </label>
                            <input type="text" class="form-control" id="raca" readonly>

                        </div>

                        <div class="form-group">
                            <label for="sexo"> Sexo: </label>
                            <input type="text" class="form-control" id="sexo" readonly>

                        </div>
                        <div class="form-group">

                            <label for="idade"> Idade: </label>
                            <input type="text" class="form-control" id="idade" readonly>

                        </div>

                    </div>
                    <div class="form-group">

                        <label for="vacinas"> Vacinas: </label>
                        <input type="text" class="form-control" id="vacinas" readonly>

                    </div>
                    <div class="form-group">

                        <label for="altura"> Altura: </label>
                        <input type="text" class="form-control" id="altura" readonly>

                    </div>
                    <div class="form-group">

                        <label for="peso"> Peso: </label>
                        <input type="text" class="form-control" id="peso" readonly>

                    </div>







                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" type="submit">Adotar</button>
            </div>
        </div>
    </div>
</div>



</div>
<!-- Script do Modal que puxa os detalhes do catálogo -->
<script>
    $(document).on('click', '.modalButton', function() {

        var id = $(this).attr('data-id');
        var img = $(this).attr('data-img');
        var raca = $(this).attr('data-raca');
        var sexo = $(this).attr('data-sexo');
        var idade = $(this).attr('data-idade');
        var vacinas = $(this).attr('data-vacinas');
        var altura = $(this).attr('data-altura');
        var peso = $(this).attr('data-peso');

        $('.modal').find('#modalTitle').text(raca);
        $('.modal').find('#imgPet').attr("src", img);
        $('.modal').find('#raca').val(raca);
        $('.modal').find('#sexo').val(sexo);
        $('.modal').find('#idade').val(idade);
        $('.modal').find('#vacinas').val(vacinas);
        $('.modal').find('#altura').val(altura);
        $('.modal').find('#peso').val(peso);

    });
</script>

</html>