<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cadastrar Usuário</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/pet-care_128.png" rel="icon">
  <link href="img/pet-care_128.png" rel="apple-touch-icon">

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
      margin-top: 50px;
      margin-bottom: 45px;
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

  include('includes/navbar_cadastro_user.php');

  ?>


  <?php
  include('modal/forgot_pass/forgot_pass.php')
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Recuperar Senha</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Recuperar Senha</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">



      <div class="container-sm">
        <div class="teste">
          <div align='center' class="page-header">
            <h1 id="cabeca">Solicitar uma nova senha</h1>
          </div>
        </div>
        <br>
        <br><br><br>
        <!-- FORM -->
        <div class="container" style="border-color:#4DA8DA; border-left-style: solid;  border-width: 11px;">
          <form method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">E-mail de acesso</label>
              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite aqui o seu e-mail de acesso">
              <small id="emailHelp" class="form-text text-muted">Este e-mail já deve ter sido cadastrado anteriormente.</small>
            </div>
            <div class="container">
              <button type="submit" name="ok" class="btn btn-primary btn-sm">Solicitar uma nova senha</button>
            </div>
          </form>

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
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>


  <script>
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
      var pattern = new RegExp(/[a-zåäöãá ]/i);
      return pattern.test(value);
    }

    $('#nome').bind('keypress', testInput);
    $('#estado').bind('keypress', testInput);
    $('#cidade').bind('keypress', testInput);
  </script>





</body>

</html>