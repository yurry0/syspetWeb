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

        button {

            height: 45px;
            padding: 10px;
            text-align: center;
        }
    </style>

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

            <form role="form" name="add_pet" method="POST" action="pet_add_action.php">

                <div class="card-body">





                    <!-- Campo Raça -->

                    <div class="form-group">

                        <div class="row">


                            <div class="col-2">

                                <img src="img/pet-care_128.png" alt="">

                            </div>
                            <div class="col-1">
                                <div class="form-group">
                                    
                                    <label for="id">Código</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                                        <input type="int" disabled name="id" class="form-control" id="id" placeholder="Auto">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <label>Espécie</label>
                                <div class="input-group-prepend">
                                
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected" disabled>Selecione</option>
                                    <option>Cão</option>
                                    <option>Gato</option>
                                    <option>Cavalo</option>

                                </select>

                                </div>

                            </div>

                            <div class="col-2">
                                <label for="raca">Raça</label>
                                <input type="text" class="form-control rounded-0" name="raca" id="raca" placeholder="">
                            </div>


                            <div class="col-2">
                                <label for="sexo">Sexo</label>
                                <select class="custom-select form-control-border" name="sexo" id="sexo">
                                    <option selected disabled> Selecione </option>
                                    <option>Macho</option>
                                    <option>Fêmea</option>
                                    <option>Outro</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label>Porte</label>
                                <select class="form-control select2" id="porte" name="porte" style="width: 100%;">
                                    <option selected="selected" disabled>Selecione</option>
                                    <option>Pequeno</option>
                                    <option>Médio</option>
                                    <option>Grande</option>
                                    <option>Gigante</option>
                                </select>

                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">

                            <!-- Campo Idade -->
                            <div class="col-2">
                            </div>
                            <div class="col-2">
                                <label for="raca">Idade</label>
                                <input type="number" class="form-control rounded-0" min="0" max="30" name="idade" id="idade" placeholder="">
                            </div>
                            .
                            <div class="col-2">

                                <!-- Campo Altura -->
                                <label for="altura">Altura</label>
                                <input class="form-control rounded-0" name="altura" id="altura" placeholder="" type="text" data-inputmask-clearmaskonlostfocus="false">

                            </div>




                            <!-- Campo Peso -->
                            <div class="col-2">

                                <label for="raca">Peso</label>
                                <input type="text" class="form-control rounded-0" name="peso" id="peso" placeholder="">
                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6">

                                <label>Vacinas</label>
                                <select class="select2" multiple="multiple" data-placeholder="Selecione as vacinas" style="width: 100%;">
                                    <optgroup label="Cães e Gatos">

                                        <option>Antirrábica</option>
                                        <option>Polivalente </option>
                                        <option>Giardíase</option>
                                        <option>Gripe Canina</option>
                                        <option>Leishmaniose</option>
                                        
                                        
                                    <optgroup label="Felinas">
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>

                                </select>
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
                            <div class="">
                                <button type="submit" class="btn btn-block bg-gradient-success btn-flat"> <i class="far fa-save"></i> Adicionar</button>
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
            $("#example2").inputmask();
        });
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
    </script>
</body>

</html>