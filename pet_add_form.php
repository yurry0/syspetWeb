<?php
session_start();
include("conexao.php");
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);



?>

<html>

<head>
    <!-- Required meta tags -->
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

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
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        /* Estilo do Header */
        h1 {

            display: flex;
            justify-content: center;
            /* align horizontal */
            align-items: center;
            /* align vertical */

            position: relative;
            background-image: linear-gradient(to right, #108dc7, #ef8e38);
            font-family: Arial, Helvetica, sans-serif;
            color: aliceblue;
            height: 100px;
            letter-spacing: 10px;
        }

        /* Estilo do Button - Tentando Centralizar */
        button {
            height: 45px;
            padding: 10px;
            text-align: center;
        }

        /* Essas são as partes da forma que só serão reveladas quando o JavaScript for executado, na parte de espécie */

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
    
    function keypresshandler(event)
    {
         var charCode = event.keyCode;
         //Non-numeric character range
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;
    }
    
    </script>

    <title>Cadastrar Pet</title>
</head>

<body>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Cadastrar um novo pet!</h1>
            </div>
        </div>
        <br>
        <br><br><br>
    </div>

    <!-- FORM -->

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title" style="font: 25px Arial;">Adicionar Pet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" name="add_pet" method="POST" action="pet_add_action.php" enctype="multipart/form-data">

            <div class="card-body">

                <!-- Campo Raça -->

                <div class="form-group">

                    <div class="row">


                        <div class="col-2">

                            <img id="imagem_syspet" src="img/pet-care_128.png" alt="">

                        </div>
                        <div class="col-1">
                            <div class="form-group">

                                <label for="id">Código</label>
                                <div class="input-group-prepend">

                                    <input type="int" disabled name="id" class="form-control" id="id" placeholder="Auto">
                                </div>

                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">

                                <label for="label-nome">Nome</label>
                                <div class="input-group-prepend">
                                    <input type="text" required name="nome" onkeypress='keypresshandler(event)' class="form-control" id="nome" placeholder="Digite o nome do pet!">
                                </div>

                            </div>
                        </div>

                        <div class="col-2">
                            <label>Espécie</label>
                            <div class="input-group-prepend">

                                <select id="especie" name="especie" required class="form-control select2" style="width: 100%;" onchange="showTextBox()">
                                    <option selected="selected" disabled>Selecione</option>
                                    <option value="Cachorro">Cão</option>
                                    <option value="Gato">Gato</option>
                                    <option value="Cavalo">Cavalo</option>

                                </select>

                            </div>

                        </div>

                        <div class="col-2">
                            <label for="raca">Raça</label>
                            <input type="text" class="form-control rounded-0" required name="raca" id="raca" placeholder="">
                        </div>


                        <div class="col-2">
                            <label for="sexo">Sexo</label>
                            <select class="custom-select form-control-border" required name="sexo" id="sexo">
                                <option selected disabled> Selecione </option>
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
                            <select class="form-control select2" id="porte" required name="porte" style="width: 100%;">
                                <option selected="selected" disabled>Selecione</option>
                                <option>Pequeno</option>
                                <option>Médio</option>
                                <option>Grande</option>
                                <option>Gigante</option>
                            </select>
                        </div>

                        <!-- Campo Idade -->
                        <div class="col-1">
                            <label for="raca">Idade</label>
                            <input type="number" required class="form-control rounded-0" min="0" max="30" name="idade" id="idade" placeholder="">
                        </div>

                        <div class="col-2">

                            <!-- Campo Altura -->
                            <label for="altura">Altura</label> <code> - Em metros;</code>
                            <input class="form-control rounded-0" required name="altura" id="altura" placeholder="" type="text" data-inputmask-clearmaskonlostfocus="false">

                        </div>


                        <!-- Campo Peso -->
                        <div class="col-2">

                            <label for="raca">Peso</label> <code> - - - - Em quilos;</code>
                            <input type="text" required class="form-control rounded-0" name="peso" id="peso" placeholder="ex: 40">
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



                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div>
                            <button type="submit" id="adicionar" class="btn btn-block bg-gradient-success btn-flat"> <i class="far fa-save"></i>Adicionar</button>
                        </div>

                    </div>
                </div>
                <!-- DIV do card-->
            </div>

        </form>



    </div>


    </div>


    <!-- FOOTER -->

    <?php include("includes/footer.php") ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>










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




</body>

</html>