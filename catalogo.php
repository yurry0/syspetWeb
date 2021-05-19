<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de Pets!</title>


    <?php
    session_start();
    include "conexao_crud.php";

    require_once 'includes/pet_rn.php';
    ?>


    <style>
        #detalhes {
            position: relative;
            margin-top: 0px;

        }

        #adotar{

            margin-top: 25px;

        }
    </style>


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

                        echo '<td>' . '<img width="250" height="250" src="Uploads/' . $row['img_pet'] . '"/>';
                        echo "<h5 class='card-title'> Raça: " . $row['raca'] . "</h5> <br>";
                        echo "<p class='card=text'> Peso: " . $row['peso'] . "</p>";

                        echo "<button type='button' id='detalhes' class='modalButton btn btn-primary' data-toggle='modal' data-target='#detailsModal'
                                data-img='" . $row['img_pet'] . "'
                                data-pk-id-pet='" . $row['pk_id_pet'] . "'
                                data-nome='" . $row['nome'] . "'
                                data-raca='" . $row['raca'] . "'
                                data-idade='" . $row['idade'] . "'
                                data-sexo='" . $row['sexo'] . "'
                                data-vacinas='" . $row['vacinas'] . "'
                                data-peso='" . $row['peso'] . "'
                                data-altura='" . $row['altura'] . "'
                                data-especie='" . $row['especie'] . "'
                                data-pelagem='" . $row['pelagem'] . "'
                                data-porte='" . $row['porte'] . "'>
                                +Detalhes
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
<form action="adocao_add_form.php" method="post">
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


                    <div class="row">
                        <div class="col-2">
                            <label for="id" style="float:inline-end"> ID:</label>

                            <input type="text" style="float: right;" class="form-control" name="ID" id="ID" readonly>

                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-1">

                                </div>

                                <div class="col-3">
                                    <label for="especie"> Nome: </label>
                                    <input type="text" class="form-control" name="nome" id="nome" readonly>
                                </div>

                                <div class="col-3">
                                    <label for="especie"> Especie: </label>
                                    <input type="text" class="form-control" name="especie" id="especie" readonly>
                                </div>



                                <div class="col-3">
                                    <label for="raca"> Raça: </label>
                                    <input type="text" class="form-control" name="raca" id="raca" readonly>
                                </div>

                            </div>


                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">

                            <div class="col-1"></div>

                            <div class="col-3">
                                <label for="sexo"> Sexo: </label>
                                <input type="text" class="form-control" name="sexo" id="sexo" readonly>
                            </div>

                            <div class="col-3">
                                <label for="pelagem"> Porte: </label>
                                <input type="text" class="form-control" name="porte" id="porte" readonly>
                            </div>




                            <div class="col-3">
                                <label for="idade"> Idade: </label>
                                <input type="text" class="form-control" name="idade" id="idade" readonly>
                            </div>


                        </div>

                        <div class="row">


                            <div class="col-1">

                            </div>

                            <div class="col-3">
                                <label for="altura"> Altura: </label>
                                <input type="text" class="form-control" name="altura" id="altura" readonly>
                            </div>

                            <div class="col-3">
                                <label for="peso"> Peso: </label>
                                <input type="text" class="form-control" name="peso" id="peso" readonly>
                            </div>

                            <div class="col-3">
                                <label for="pelagem"> Pelagem: </label>
                                <input type="text" class="form-control" name="pelagem" id="pelagem" readonly>

                            </div>

                        </div>

                    </div>

           
                
                <div class="col-1">

                </div>

                <div class="col-8">
                    <label for="vacinas"> Vacinas: </label>
                    <input type="text" class="form-control" name="vacinas" id="vacinas" readonly>
                </div>

                <div class="row">


                </div>
                <div class="form-group">
                    <div class="col-9">
                        <button type="submit" id="adotar" type="submit" class="btn btn-primary">Adotar</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                </div>

            </div>

            </div>



        </div>
    </div>
    </div>

</form>


</div>
<!-- Script do Modal que puxa os detalhes do catálogo -->
<script>
    $(document).on('click', '.modalButton', function() {

        var id = $(this).attr('data-pk-id-pet');
        var img = $(this).attr('data-img');
        var nome = $(this).attr('data-nome');
        var raca = $(this).attr('data-raca');
        var sexo = $(this).attr('data-sexo');
        var idade = $(this).attr('data-idade');
        var vacinas = $(this).attr('data-vacinas');
        var altura = $(this).attr('data-altura');
        var peso = $(this).attr('data-peso');
        var especie = $(this).attr('data-especie');
        var pelagem = $(this).attr('data-pelagem');
        var porte = $(this).attr('data-porte');



        $('.modal').find('#modalTitle').text(raca);
        $('.modal').find('#imgPet').attr("Uploads/", img);
        $('.modal').find('#ID').val(id);
        $('.modal').find('#nome').val(nome);
        $('.modal').find('#raca').val(raca);
        $('.modal').find('#sexo').val(sexo);
        $('.modal').find('#idade').val(idade);
        $('.modal').find('#vacinas').val(vacinas);
        $('.modal').find('#altura').val(altura);
        $('.modal').find('#peso').val(peso);
        $('.modal').find('#especie').val(especie);
        $('.modal').find('#pelagem').val(pelagem);
        $('.modal').find('#porte').val(porte);





    });
</script>

</html>