<!DOCTYPE html>
<html lang="pt">

<?php
session_start();
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);
include('conexao_crud.php');
include 'verifica_login.php';



//Conjunto de funções pra trazer o Pet do Banco de Dados usando o ID passado no GET 
include('modal/pet/busca_pet.php')

?>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Editar Pet</title>
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

    #pelagem_cao {

      display: none;

    }


    #pelagem_gato {

      display: none;

    }

    #pelagem_cavalo {

      display: none;

    }

    #cao_gato_vacina {

      display: none;

    }

    #cavalo_vacina {

      display: none;

    }

    /* */
    #imagem_syspet {

      margin-left: 40px;

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
          <h2>Editar Pet</h2>
          <ol>
            <li><a href="painel.php">Home</a></li>
            <li><a href="pet_index.php">Índice de Pet</a></li>
            <li>Editar Pet</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="font: 25px Arial;">Editar Pet</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->

          <form role="form" name="edit_pet" id="pet_edit" onsubmit="return validateForm()" method="POST" action="pet_edit_action.php" enctype="multipart/form-data">

            <div class="card-body">

              <!-- Campo Raça -->

              <div class="form-group">

                <div class="row">
                  <div class="col-2">

                    <img id="imagem_syspet" src="img/syspet sem fundo.png" style="width: 128px; height: 128px;" alt="">

                  </div>
                  <div class="col-1">
                    <div class="form-group">

                      <label for="id">Código</label>
                      <div class="input-group-prepend">
                        <input type="int" readonly name="id" value="<?php echo $id; ?>" class="form-control" id="id">
                      </div>

                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">

                      <label for="label-nome">Nome</label>
                      <div class="input-group-prepend">
                        <input type="text" value="<?php echo $nome; ?>" required name="nome" onkeypress='keypresshandler(event)' class="form-control" id="nome" placeholder="Digite o nome do pet!">
                      </div>

                    </div>
                  </div>

                  <div class="col-2">
                    <label>Espécie</label>
                    <div class="input-group-prepend">

                      <select id="especie" value="<?php echo $especie; ?>" name="especie" required class="form-control select2" style="width: 100%;" onchange="showTextBox()">
                        <option selected="selected" value="<?php null ?>"  disabled>Selecione</option>
                        <option value="Cachorro">Cão</option>
                        <option value="Gato">Gato</option>
                        <option value="Cavalo">Cavalo</option>

                      </select>

                    </div>

                  </div>

                  <div class="col-2">
                    <label for="raca">Raça</label>
                    <input type="text" class="form-control rounded-0" required name="raca" id="raca" placeholder="" value="<?php echo $raca; ?>">
                  </div>


                  <div class="col-2">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select form-control-border" required name="sexo" id="sexo">
                      <option selected="selected" value="<?php null ?>" disabled>Selecione</option>
                      <option value="Macho">Macho</option>
                      <option value="Fêmea">Fêmea</option>
                      <option value="Outro">Outro</option>
                    </select>
                  </div>


                </div>
              </div>



              <div class="form-group">

                <div class="row">
                  <div class="col-2">

                  </div>

                  <div class="col-2">
                    <label>Porte</label>
                    <select class="form-control select2" id="porte" name="porte" style="width: 100%; " required>
                      <option selected="selected" value="<?php null ?>" disabled>Selecione</option>
                      <option>Pequeno</option>
                      <option>Médio</option>
                      <option>Grande</option>
                      <option>Gigante</option>
                    </select>
                  </div>

                  <!-- Campo Idade -->
                  <div class="col-1">
                    <label for="raca">Idade</label>
                    <input type="number" required class="form-control rounded-0" min="1" max="30" value="<?php echo $v['idade'] ?>" name="idade" id="idade" placeholder="">
                  </div>

                  <div class="col-2">

                    <!-- Campo Altura -->
                    <label for="altura">Altura</label> <code> - Em metros;</code>
                    <input class="form-control rounded-0" required name="altura" id="altura" value="<?php echo $v['altura'] ?>" placeholder="" type="text" data-inputmask-clearmaskonlostfocus="false">

                  </div>


                  <!-- Campo Peso -->
                  <div class="col-2">

                    <label for="raca">Peso</label> <code> - - - - Em quilos;</code>
                    <input type="text" value="<?php echo $v['peso'] ?>" required class="form-control rounded-0" name="peso" id="peso" placeholder="ex: 40">
                  </div>


                  <div id="pelagem_cao" class="col-2">

                    <label for="raca">Pelagem</label>
                    <select class="form-control select2" id="pelo_cao" name="pelo_cao" style="width: 100%;">
                      <option selected="selected" disabled>Selecione</option>
                      <option>Longa</option>
                      <option>Curta</option>
                      <option>Ondulado e Longo</option>
                      <option>Dupla</option>
                      <option>Textura Dura</option>
                      <option>Textura Lisa</option>
                      <option>Peculiares</option>

                    </select>
                  </div>


                  <div id="pelagem_gato" class="col-2">

                    <label for="">Pelagem</label>
                    <select class="form-control select2" id="pelo_gato" name="pelo_gato" style="width: 100%;">


                      <option selected="selected" disabled>Selecione</option>
                      <option value="Solida">Sólida</option>
                      <option value="Branco">Branco</option>
                      <option value="Particolor">Particolor</option>
                      <option value="Tabby">Tabby</option>
                      <option value="Classic">Classic</option>
                      <option value="Mackerel">Mackerel</option>
                      <option value="Spotted">Spotted</option>
                      <option value="Ticked">Ticked</option>
                      <option value="Escaminhas">Escaminhas</option>
                      <option value="Red Point">Red Point</option>
                      <option value="Seal Points">Seal Points</option>
                      <option value="Shaded">Shaded</option>
                      <option value="Golden">Golden</option>



                    </select>
                  </div>


                  <div id="pelagem_cavalo" class="col-2">

                    <label for="">Pelagem</label>
                    <select class="form-control select2" id="pelo_cavalo" name="pelo_cavalo" style="width: 100%;">
                      <option selected="selected" disabled>Selecione</option>
                      <option value="Alazão">Alazão</option>
                      <option value="Gateado">Gateado</option>
                      <option value="Baio">Baio</option>
                      <option value="Rosilho">Rosilho</option>
                      <option value="Tobiano">Tobiano</option>
                      <option value="Tordilho">Tordilho</option>
                      <option value="Mouro">Mouro</option>
                      <option value="Zaino">Zaino</option>


                    </select>
                  </div>


                </div>

              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-6">


                    <div id="cao_gato_vacina">

                      <label>Vacinas</label>
                      <select class="select" id='vacina_cao_gato[]' name='vacina_cao_gato[]' multiple="multiple" data-placeholder="Selecione as vacinas" style="width: 100%;">
                        <optgroup label="Cães e Gatos">

                          <option value="Antirrabica">Antirrábica</option>
                          <option value="Polivalente">Polivalente </option>
                          <option value="Giardiase">Giardíase</option>
                          <option value="Gripe Canina">Gripe Canina</option>
                          <option value="PolivalenteV3">Vacina Polivalente V3</option>
                          <option value="PolivalenteV4">Vacina Polivalente V4</option>
                          <option value="PolivalenteV5">Vacina Polivalente V5</option>


                      </select>


                    </div>


                    <div id='cavalo_vacina'>
                      <select class="select2" multiple="multiple" id='vacina_cavalo[]' name='vacina_cavalo[]' data-placeholder="Selecione as vacinas" style="width: 100%;">

                        <optgroup label="Equinos">
                          <option>Tétano</option>
                          <option>Influenza</option>
                          <option>Encefalomielite</option>
                          <option>Raiva</option>
                          <option>Rinopneumonite</option>


                      </select>
                    </div>


                  </div>
                  <div class="col-1"></div>
                </div>
              </div>


              <div class="form-group">
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-6">
                    <label for="img_pet">Adicionar Foto</label>
                    <div><input name="img_pet" id="img_pet" type="file" /></div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-3">
                </div>
                <div class="col-2">
                </div>

                <div class="col-2">
                  <button type="submit" class="btn btn-outline-success">Editar Pet</button>
                </div>

              </div>
              <!-- DIV do card-->
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
  <!-- Select2 -->
  <script src="plugins/select2/js/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
  <script src="includes/validate.js"></script>

  <!--  Script de Regras da Form de Pet. Um bocado hein!!!!-->

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

  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })

    $(function() {
      //Initialize Select2 Elements
      $('.select').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>

  <script>
    function showTextBox() {
      var especie_status = $('#especie').val();
      if (especie_status == 'Cachorro') {

        $('#pelagem_cao').fadeIn(700);
        $('#cao_gato_vacina').fadeIn(800);

        $('#pelagem_gato').fadeOut(500);
        $('#cavalo_vacina').fadeOut(500);
        $('#pelagem_cavalo').fadeOut(500);



      }

      if (especie_status == 'Gato') {
        $('#pelagem_gato').fadeIn(700);
        $('#cao_gato_vacina').fadeIn(800);

        $('#pelagem_cao').fadeOut(700);
        $('#pelagem_cavalo').fadeOut(500);
        $('#cavalo_vacina').fadeOut(500);

      }


      if (especie_status == 'Cavalo') {
        $('#pelagem_cavalo').fadeIn(700);
        $('#cavalo_vacina').fadeIn(800);

        $('#cao_gato_vacina').fadeOut(800);
        $('#pelagem_cao').fadeOut(700);
        $('#pelagem_gato').fadeOut(700);


      }

    }
  </script>

  <!-- Script para prevenir que campos somente com espaço sejam inseridos no banco de dados -->

  <script>
    $('#pet_edit').submit(function() {
      if ($.trim($("#nome").val()) === "" || $.trim($("#raca").val()) === "" || $.trim($("#idade").val()) === "" || $.trim($("#peso").val()) === "" || $.trim($("#especie").val()) === "" ||$.trim($("#altura").val())==="") {
        {
          alert('Existem campos em branco ou inseridos somente com espaços!');
        };
        return false;
      }
    });
  </script>


  <script>
    function testInput(event) {
      var value = String.fromCharCode(event.which);
      var pattern = new RegExp(/[a-zåäöãá ]/i);
      return pattern.test(value);
    }

    $('#raca').bind('keypress', testInput);
    $('#nome').bind('keypress', testInput);
  </script>

</body>

</html>