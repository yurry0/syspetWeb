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
        function keypresshandler(event) {
            var charCode = event.keyCode;
            //Non-numeric character range
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
        }
    </script>

    <title>Cadastrar Cliente</title>
</head>

<body>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Adicionar um novo cliente</h1>
            </div>
        </div>
        <br>
        <br><br><br>
    </div>

    <!-- FORM -->
    <section class="content">
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
                                    <label for="RG">Número da Carteira de Identidade (RG)</label>
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

    </section>


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