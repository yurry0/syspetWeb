<?php
session_start();
include("conexao.php");
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);



?>

<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
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

    <title>Cadastrar Cliente</title>
</head>

<body>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Cadastrar um novo cliente</h1>
            </div>
        </div>
        <br>
        <br><br><br>
    </div>
    <!-- FORM -->

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Adicionar Pet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="add_pet" method="POST" action="cad_pet.php">
            <div class="card-body">
                <!-- <div class="form-group">
                    <label for="id">Código</label>
                    <input type="int" disabled name = "id" class="form-control" id="id" placeholder="Auto">
                  </div>
                  <-->

                
                <div class="form-group">
                    <label for="tituloInput">Raca</label>
                    <input type="text" name="raca" required class="form-control" id="raca" placeholder="Digite o nome do cliente.">
                </div>
                <div class="form-group">
                    <label for="autorInput">Sexo</label>
                    <input type="text" name="cidade" required class="form-control" id="cidade" placeholder="Digite o nome da cidade.">
                </div>

                <div class="form-group">
                    <label for="autorInput">RG</label>
                    <input type="text" name="rg" required class="form-control" id="rg" placeholder="Digite o número do RG.">
                </div>

                <div class="form-group">
                    <label for="autorInput">Estado</label>
                    <input type="text" name="estado" required class="form-control" id="estado" placeholder="Digite nome do estado.">
                </div>

                <div class="form-group">
                    <label for="autorInput">CEP</label>
                    <input type="text" name="cep" required class="form-control" min="1" max="2020" id="cep" placeholder="Digite o CEP.">
                </div>
                <div class="form-group">
                    <label for="autorInput">Endereço</label>
                    <input type="text" name="endereco" required class="form-control" min="1" max="2020" id="endereco" placeholder="Digite o endereço.">
                </div>

                <div class="form-group">
                    <label for="autorInput">Bairro</label>
                    <input type="text" name="bairro" required class="form-control" min="1" max="2020" id="bairro" placeholder="Digite o bairro.">
                </div>
                <div class="form-group">
                    <label for="autorInput">E-Mail</label>
                    <input type="email" name="email" required class="form-control" min="1" max="2020" id="bairro" placeholder="Digite o e-mail para contato.">
                </div>
                <div class="">
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </div>






    </div>




    </div>






    <!-- /.card-body -->


    </form>
    </div>

    <!-- FOOTER -->

    <?php


    include("includes/footer.php");

    ?>


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