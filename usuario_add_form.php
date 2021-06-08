<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);
include('conexao_crud.php');

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


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Adicionar Usuário</h2>
          <ol>
            <li><a href="index.php">Index</a></li>
            <li>Adicionar Usuário</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">


      <div class="container" style="border-color:#4DA8DA; border-left-style: solid;  border-width: 11px;">


        <form action="usuario_add_action.php" method="POST">

          <!-- Validação e Alerts do Bootstrap -->

          <?php include('includes/validacao_criarUser.php'); ?>


          <!-- Campo de Nome -->
          <div class="row mb-2">
            <label for="nome" class="col-sm-2 col-form-label">Nome: </label>
            <div class="col-sm-6">
              <input name="nome" required type="text" onkeypress="return blockSpecialChar(event)" class="form-control" id="nome">
            </div>
          </div>
          <!-- Campo de Email -->
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label ">E-mail:</label>
            <div class="col-sm-6">
              <input type="email" required name="email" class="form-control" placeholder="ex: 123@123.com.br">
            </div>
          </div>
          <!-- Campo de Confirmação de Email -->
          <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Confirmar Email:</label>
            <div class="col-sm-6">
              <input type="email" required name="confirm_email" class="form-control">
            </div>
          </div>


          <!-- Campo de Senha -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Senha:</label>
            <div class="col-sm-6">
              <input type="password" required name="senha" pattern="[0-9a-fA-F]{1,8}[^' ']+" class="form-control" min="5" max="20" placeholder="Mínimo 5, máximo 20 caracteres.">
              <code>Atenção: Não é permitido preencher a senha somente com espaços.</code>
            </div>
          </div>

          <!-- Campo de Confirmação -->
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Confirmar Senha:</label>
            <div class="col-sm-6">
              <input type="password" required name="confirm_senha" class="form-control">

            </div>
          </div>
          <!-- Botão de Cadastro -->

          <div class="container">
            <div class="row">
              <div class="col text-center">
                <button type="submit" class="btn btn-outline-success">Cadastrar Usuário</button>
              </div>
            </div>
          </div>

      </div>

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