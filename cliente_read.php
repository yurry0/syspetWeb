<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);
include('conexao_crud.php');



//Conjunto de funções pra trazer o Pet do Banco de Dados usando o ID passado no GET 
include('modal/cliente/buscar_cliente.php')

?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Visualizar Cliente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="includes/stylesheet/read.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Select 2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    /* Estilo do Button - Tentando Centralizar */
    button {
      height: 45px;
      padding: 10px;
      text-align: center;
    }
  </style>

  <script>
    function keypresshandler(event) {
      var charCode = event.keyCode;
      //Non-numeric character range
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    }
  </script>


</head>

<body>

  <!-- ======= Header ======= -->


  <?php

  include('includes/navbar_template.php');

  ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Visualizar Cliente</h2>
          <ol>
            <li><a href="painel.php">Painel</a></li>
            <li><a href="cliente_index.php">Índice de Clientes</a></li>
            <li>Visualizar Cliente</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <!-- form start -->

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?php echo $nome ?></h3>
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-book"></i> 
                  <small class="float-right"></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <address>
                  <strong><?php echo "Nome: " . $nome ?></strong><br>
                  <?php echo "Cidade: " . $cidade ?> <br>
                  <?php echo "RG: " . $rg ?><br>
                  <?php echo "Estado: " . $estado ?><br>
                  <?php echo "CEP: " . $cep ?><br>
                  <?php echo "Endereco: " . $endereco ?><br>
                  <?php echo "Bairro: " . $bairro ?><br>
                  <?php echo "Email: " . $email ?><br>
                  <br>
               

                </address>
                <a href="cliente_index.php"> <img alt="Voltar" style="width: 50px; height: 50px" src="img/back-button.png"> </a>
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.card-header -->
            <!-- form start -->

          </div>




        </div>
        <!-- testanto js para introduzir campos -->

      </div>

      </div>


    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php

  include('includes/footer_template.php');

  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>



  <!-- Script para inserir os dados -->

  <script>
  </script>


</body>

</html>