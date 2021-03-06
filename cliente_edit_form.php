<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
include('includes/protect.php');
include('conexao_crud.php');
include "verifica_login.php";



//Conjunto de funções pra trazer o Pet do Banco de Dados usando o ID passado no GET 
include('modal/cliente/buscar_cliente.php')

?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar Cliente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- icon -->
  <link href="img/syspet sem fundo.png" rel="icon">
  <link href="img/syspet sem fundo.png" rel="apple-touch-icon">
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

  include('includes/navbar_template.php');

  ?>


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Editar Cliente</h2>
          <ol>
            <li><a href="painel.php">Home</a></li>
            <li><a href="cliente_index.php">Índice de Clientes</a></li>
            <li>Editar Cliente</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">
        <div class="card card-primary">

          <!-- /.card-header -->
          <!-- form start -->

          <form role="form" name="edit_cliente" id="edit_cliente" onsubmit="return validateForm()" method="POST" action="cliente_edit_action.php">

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

                        <input type="int" readonly name="pk_id_cliente" value="<?php echo  $id ?>" class="form-control" id="pk_id_cliente" placeholder="Auto">
                      </div>

                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">

                      <label for="label-nome">Nome</label>
                      <div class="input-group-prepend">
                        <input type="text" required name="nome" id="nome" value="<?php echo $v['cli_nome'] ?>" class="form-control" placeholder="">
                      </div>

                    </div>
                  </div>

                  <div class="col-2">
                    <label for="RG">Carteira de Identidade (RG)</label>
                    <input type="text" class="form-control rounded-0" required name="rg" value="<?php echo $v['cli_rg']; ?>" id="rg" placeholder="" data-inputmask-clearmaskonlostfocus="false">
                  </div>


                  <div class="col-2">
                    <label>Cidade</label>
                    <div class="input-group-prepend">

                      <input type="text" required name="cidade" id="cidade" value="<?php echo $v['cidade'] ?>" onkeypress='keypresshandler(event)' class="form-control" placeholder="">


                    </div>

                  </div>




                  <div class="col-2">
                    <label for="estado">Estado</label>
                    <input type="text" required name="estado" class="form-control" value="<?php echo $v['cli_estado'] ?>" id="estado" placeholder="EX: Ceará">
                  </div>


                </div>
              </div>

              <div class="form-group">

                <div class="row">
                  <div class="col-2">

                  </div>

                  <div class="col-2">
                    <label for="estado">CEP</label>
                    <input type="text" required name="cep" onkeypress='keypresshandler(event)' value="<?php echo $v['cli_cep'] ?>" class="form-control" id="cep" placeholder="EX: Ceará" data-inputmask-clearmaskonlostfocus="false">
                  </div>

                  <!-- Campo Idade -->
                  <div class="col-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" required class="form-control rounded-0" name="endereco" onkeypress='keypresshandler(event)' value="<?php echo $v['cli_endereco'] ?>" id="endereco" placeholder="">
                  </div>

                  <div class="col-2">

                    <!-- Campo Bairro -->
                    <label for="Bairro">Bairro</label>
                    <input class="form-control rounded-0" required name="bairro" id="bairro" value="<?php echo $v['cli_bairro'] ?>" placeholder="" type="text">

                  </div>

                  <div class="col-2">
                    <label for="Email">E-mail</label>
                    <input class="form-control rounded-0" type="email" required name="email" value="<?php echo $v['cli_email'] ?>" id="email" placeholder="">
                  </div>


                </div>

              </div>




              <div class="row">
                <div class="col-3">
                </div>
                <div class="col-2">
                </div>

                <div class="col-2">
                  <button type="submit" class="btn btn-outline-success">Editar Cliente</button>
                </div>

              </div>
              <!-- DIV do card-->
            </div>

          </form>

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
      var pattern = new RegExp(/[a-zåäöãá ]/i);
      return pattern.test(value);
    }

    $('#nome').bind('keypress', testInput);
    $('#estado').bind('keypress', testInput);
    $('#cidade').bind('keypress', testInput);
  </script>

 <!-- Script que impede que campos sejam preenchidos só com espaços-->
 <script>
    $('#edit_cliente').submit(function() {
      if ($.trim($("#nome").val()) === "" || $.trim($("#rg").val()) === "" || $.trim($("#cidade").val()) === "" || $.trim($("#estado").val()) === "" || $.trim($("#cep").val()) === "" || $.trim($("#endereco").val()) === "" || $.trim($("#bairro").val()) === "") {
           {
          alert('Existem campos em branco ou inseridos somente com espaços!');
        };
        return false;
      }
    });
  </script>


</body>

</html>