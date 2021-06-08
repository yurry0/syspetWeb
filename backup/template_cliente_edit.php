<!DOCTYPE html>
<html lang="pt">
<?php
session_start();
$_SESSION['usuario'];
include "conexao_crud.php";
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Indíce Adoções</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Amoeba - v4.1.1
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <?php

  include('modal/cliente/buscar_cliente.php')

  ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">SysPet</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php include('includes/navbar_template.php') ?>

    </div>
  </header><!-- End #header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Índice de Adoções</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="font: 25px Arial;">Adicionar Cliente</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form role="form" name="add_cliente" method="POST" action="cliente_add_action.php">

            <div class="card-body">

              <!-- Campo Raça -->

              <div class="form-group">

                <div class="row">


                  <div class="col-2">

                    <img id="imagem_syspet" src="img/syspet logo.png" style="width: 170px; height: 170px;" alt="">

                  </div>
                  <div class="col-1">
                    <div class="form-group">

                      <label for="id">Código</label>
                      <div class="input-group-prepend">

                        <input type="int" disabled name="pk_id_cliente" class="form-control" id="pk_id_cliente" placeholder="Auto">
                      </div>

                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">

                      <label for="label-nome">Nome</label>
                      <div class="input-group-prepend">
                        <input type="text" required name="nome" id="nome" class="form-control" placeholder="Digite o nome do cliente!">
                      </div>

                    </div>
                  </div>

                  <div class="col-2">
                    <label for="RG">Carteira de Identidade (RG)</label>
                    <input type="text" class="form-control rounded-0" required name="rg" id="rg" placeholder="" data-inputmask-clearmaskonlostfocus="false">
                  </div>


                  <div class="col-2">
                    <label>Cidade</label>
                    <div class="input-group-prepend">

                      <input type="text" required name="cidade" id="cidade" onkeypress='keypresshandler(event)' class="form-control" placeholder="EX: Juazeiro do Norte">


                    </div>

                  </div>




                  <div class="col-2">
                    <label for="estado">Estado</label>
                    <input type="text" required name="estado" class="form-control" id="estado" placeholder="EX: Ceará">
                  </div>


                </div>
              </div>

              <div class="form-group">

                <div class="row">
                  <div class="col-2">

                  </div>

                  <div class="col-2">
                    <label for="estado">CEP</label>
                    <input type="text" required name="cep" onkeypress='keypresshandler(event)' class="form-control" id="cep" placeholder="EX: Ceará" data-inputmask-clearmaskonlostfocus="false">
                  </div>

                  <!-- Campo Idade -->
                  <div class="col-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" required class="form-control rounded-0" name="endereco" id="endereco" placeholder="">
                  </div>

                  <div class="col-2">

                    <!-- Campo Bairro -->
                    <label for="Bairro">Bairro</label>
                    <input class="form-control rounded-0" required name="bairro" id="bairro" placeholder="" type="text">

                  </div>

                  <div class="col-2">
                    <label for="Email">E-mail</label>
                    <input class="form-control rounded-0" type="email" required name="email" id="email" placeholder="">
                  </div>


                </div>



              </div>
            <br>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-6">
                </div>
                <div class="col-5">
                  <button type="button" class="btn btn-success">Editar</button>
                </div>

              </div>
            </div>
            <!-- DIV do card-->
        </div>

        </form>
      </div>
      </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php

  include('includes/footer_template.php');

  ?>


  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>



  <script>
    $(document).ready(function() {
      $("#rg").inputmask("99.999.999-9");
      $("#cep").inputmask("99999-999")
    });

    $(document).ready(function() {

    });

    function myFunction() {
      var e = event || window.event; // get event object
      var key = e.keyCode || e.which; // get key cross-browser

      if (key < 48 || key > 57) { //if it is not a number ascii code
        //Prevent default action, which is inserting character
        if (e.preventDefault) e.preventDefault(); //normal browsers
        e.returnValue = false; //IE
      }
    }
  </script>



  <!-- Regras relacionadas a prevenir que campos de texto tenham números -->
  <script>
    function testInput(event) {
      var value = String.fromCharCode(event.which);
      var pattern = new RegExp(/[a-zåäöã ]/i);
      return pattern.test(value);
    }

    $('#nome').bind('keypress', testInput);
    $('#estado').bind('keypress', testInput);
    $('#cidade').bind('keypress', testInput);
  </script>



</body>

</html>