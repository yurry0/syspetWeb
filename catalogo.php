<!DOCTYPE html>
<html lang="pt">
<?php
session_start();
include "conexao_crud.php";
require_once 'includes/pet_rn.php';
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Catálogo de Pets</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <style>
    #detalhes {
      position: relative;
      margin-top: 0px;

    }

    #adotar {
      margin-top: 25px;
    }

    .modal-header {
      padding: 9px 15px;
      border-bottom: 1px solid #eee;
      background-color: #0480be;
      -webkit-border-top-left-radius: 5px;
      -webkit-border-top-right-radius: 5px;
      -moz-border-radius-topleft: 5px;
      -moz-border-radius-topright: 5px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      color: white;
    }
  </style>

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
</head>

<body>
  <!-- ======= Header ======= -->
  <?php

  include('includes/navbar_template.php')

  ?>
  <main id="main">
  <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Catálogo de Pets</h2>
          <ol>
            <li><a href="painel.php">Home</a></li>
            <li>Catálogo de Pets</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
    <div class="content">
      <div class="wrapper">
        <div class="row">
          <?php
          include('modal/catalogo/alimentar_catalogo.php');
          ?>
        </div>
      </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php
  //include('includes/footer_template.php');
  ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
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
    
</body>

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

            <div class="col-5">

            </div>

            <div class="col-2">
              <label for="id"> ID:</label>
              <input type="text" style="float: right;" class="form-control" name="ID" id="ID" readonly>

            </div>

            <div class="form-group">
              <div class="row">

                <div class="col-1">

                </div>

                <div class="col-3">
                  <label for="especie">Nome:</label>
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

          <div class="col-10">
            <label for="vacinas"> Vacinas: </label>
            <input type="text" class="form-control" name="vacinas" id="vacinas" readonly>
          </div>

          <div class="row">


          </div>
          <div class="form-group">
            <div class="col-9" style="padding-top: 15px;">
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