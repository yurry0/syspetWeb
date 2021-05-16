<?php
session_start();
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);
include('conexao_crud.php');


$_POST['id']

?>

<html>

<head>





    <!-- Required meta tags -->
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
        
        label{
            padding: 2px;

        }
         
        button {
            margin-top: 10px;
            height: 45px;
            padding: 15px;
            text-align: center;
        }
    </style>

    <title>Cadastrar Adoção</title>
</head>

<body>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Realizar uma nova adoção</h1>
            </div>
        </div>
        <br>
        <br><br><br>
    </div>

    <!-- FORM -->
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Realizar uma nova adoção</h3>
        </div>
        <div class="card-body">
            <form action="adocao_add_action.php" method="POST">

                <div class="form-group col-4">

                    <label for="animal_raca"> Pet <code> - - Selecione um dos pets já cadastrados</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" id="raca" name="raca" placeholder="">
                    <div id="listaRaca"></div>                  
                    

                    <label for="cliente"> Cliente <code> - - Escreva algo, e a lista de clientes irá aparecer</code></label>
                    <input type="text" class="form-control form-control-border border-width-2" id="cliente" name="cliente" placeholder="">
                    <div id="listaCliente" class="listaCliente"></div>

                    <button type="submit" class="btn btn-block bg-gradient-success btn-flat">Adicionar Nova Adoção</button>
                </div>
            </form>
            <!-- testanto js para introduzir campos -->


            <!-- apaga daqui pra cima -->
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
</body>

</html>

<!-- Script para inserir os dados -->
<script>
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


    $(document).on('click', 'li', function() {

        $('#raca').val($(this).text());
        $('#listaRaca').fadeOut();

    });
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