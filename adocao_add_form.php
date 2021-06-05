<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);
include('conexao_crud.php');



//Conjunto de funções pra trazer o Pet do Banco de Dados usando o ID passado no GET 
include('modal/adocao/add_adocao.php')

?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Realizar Adoção</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
          <h2>Realizar Adoção</h2>
          <ol>
            <li><a href="painel.php">Home</a></li>
            <li>Realizar Adoção</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <!-- form start -->

        <form role="form" name="add_adocao" method="POST" action="adocao_add_action.php">

          <div class="card-body">

            <!-- Campo Raça -->

            <div class="card card-info">
              <div class="card-body">
              

                  <div class="row">

                    <div class="col-1">
                      <label for="id">ID do Pet:</label>
                      <input type="text" id="ID" name="ID" readonly class="form-control" value="<?php echo $id; ?>" placeholder="">
                    </div>

                    <div class="col-2">
                      <label for="nome">Nome:</label>
                      <input type="text" id="nome" name="nome" readonly class="form-control" value="<?php echo $nome; ?>" placeholder="">
                    </div>

                    <div class="col-3">
                      <label for="especie">Especie:</label>
                      <input type="text" name="especie" readonly class="form-control" value="<?php echo $especie; ?>" placeholder="">
                    </div>

                    <div class="col-2">
                      <label for="raca">Raça:</label>
                      <input type="text" id="raca" name="raca" value="<?php echo $raca; ?>" readonly class="form-control" placeholder="">
                    </div>

                  </div>

                  <div class="row">


                  </div>


                  <div class="row">
                    <br>
                    <div class="col-2">
                      <label for="sexo">Sexo:</label>
                      <input type="text" id="sexo" name="sexo" value="<?php echo $sexo; ?>" readonly class="form-control" placeholder="">
                    </div>

                    <div class="col-2">
                      <label for="idade">Idade:</label>
                      <input type="text" id="idade" name="idade" readonly class="form-control" value="<?php echo $idade; ?>" placeholder="">
                    </div>



                    <div class="col-1">
                      <label for="altura">Altura:</label>
                      <input type="text" id="altura" name="altura" readonly class="form-control" value="<?php echo $altura; ?>" placeholder="">
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-5">
                      <label for="vacinas">Vacinas:</label>
                      <input type="text" id="vacinas" name="vacinas" readonly class="form-control" value="<?php echo $vacinas; ?>" placeholder="">
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-4">

                      <!-- <label for="animal_raca"> Pet <code> - - Selecione um dos pets já cadastrados</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" id="raca" name="raca" placeholder="">
                    <div id="listaRaca"></div> -->

                      <label for="cliente"> Cliente <code> - - Escreva algo, e a lista de clientes irá aparecer</code></label>
                      <input type="text" required class="form-control form-control-border border-width-2" id="cliente" name="cliente" placeholder="Selecione um novo cliente">
                      <div id="listaCliente" class="listaCliente"></div>
                    </div>

                    <div class="col-1"></div>


                  </div>

                  <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-2">
                    </div>

                    <div class="col-2">
                    <button type="submit" class="btn btn-outline-success">Adicionar Adoção</button>
                    </div>

                  </div>

              </div>
        </form>
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
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>



  <script>
    $(document).ready(function() {
      $("#altura").inputmask("9.99");
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


  <!-- Script para inserir os dados -->

  <script>
    /** 
    $(document).ready(function() {

        $('#raca').keyup(function() {

            var query = $(this).val();
            if (query != '') {

                $.ajax({

                    url: "search.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {

                        $('#listaRaca').fadeIn();
                        $('#listaRaca').html(data);

                    }
                })

            }

        })

    });
*/

    $(document).on("keyup", "#cliente", function() {

        var cliente = $(this).val().trim();
        if (cliente == "") {

            $("#listaCliente").fadeOut();
        } else {

            $.ajax({

                url: "search2.php",
                method: "POST",
                data: {
                    cliente: cliente
                },
                success: function(data) {

                    $("#listaCliente").fadeIn();
                    $("#listaCliente").html(data);
                }
            });
        }
    });

    $(document).on("click", ".listaCliente", function() {

        $("#cliente").val($(this).text());
        $("#listaCliente").fadeOut();
    })

    /** 
        $(document).on('click', 'li', function() {

            $('#raca').val($(this).text());
            $('#listaRaca').fadeOut();

        });
        */
</script>
<!-- Script para carregar novas formas baseada na opção que o usuário escolher -->

<script>
    $("#seeAnotherField").change(function() {
        if ($(this).val() == "yes") {
            $('#otherFieldDiv').show();
            $('#otherField').attr('required', '');
            $('#otherField').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldDiv').hide();
            $('#otherField').removeAttr('required');
            $('#otherField').removeAttr('data-error');
        }
    });
    $("#seeAnotherField").trigger("change");

    $("#seeAnotherFieldGroup").change(function() {
        if ($(this).val() == "yes") {
            $('#otherFieldGroupDiv').show();
            $('#otherField1').attr('required', '');
            $('#otherField1').attr('data-error', 'This field is required.');
            $('#otherField2').attr('required', '');
            $('#otherField2').attr('data-error', 'This field is required.');
        } else {
            $('#otherFieldGroupDiv').hide();
            $('#otherField1').removeAttr('required');
            $('#otherField1').removeAttr('data-error');
            $('#otherField2').removeAttr('required');
            $('#otherField2').removeAttr('data-error');
        }
    });
    $("#seeAnotherFieldGroup").trigger("change");
</script>





</body>

</html>