<?php

session_start();
?>

<html>

<head>
    <script type="text/javascript">
        function blockSpecialChar(e) {
            var k;
            document.all ? k = e.keyCode : k = e.which;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
        }
    </script>
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
    </style>

    <title>Cadastro de Usuário</title>
</head>

<body>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Cadastro de Usuário</h1>
            </div>
        </div>
        <br>
        <br><br><br>
        <!-- FORM -->
        <div class="container" style="border-color:#4DA8DA; border-left-style: solid;  border-width: 11px;">


            <form action="usuario_add_action.php" method="POST">

                <!-- Validação e Alerts do Bootstrap -->

                <?php
                if (isset($_SESSION['usuario_existe'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Email de acesso já existe no banco de dados.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['usuario_existe']);

                ?>



                <?php
                if (isset($_SESSION['invalid_email'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campos de e-mail não coincidem.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['invalid_email']);

                ?>



                <?php
                if (isset($_SESSION['nome_vazio'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campo de nome está vazio ou inserido com somente espaços!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['nome_vazio']);

                ?>


                <?php
                if (isset($_SESSION['senha_vazia'])) :
                ?>

                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Campo de senha está vazio ou inserido com somente espaços!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['senha_vazia']);

                ?>


                <?php
                if (isset($_SESSION['invalid_senha'])) :
                ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Campos de senha não coincidem.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                endif;
                unset($_SESSION['invalid_senha']);

                ?>




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
                        <input type="password" required name="senha" pattern="[0-9a-fA-F]{1,8}[^' ']+" class="form-control" min="1" max="8" placeholder="Mínimo 1, máximo 8 caracteres.">
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
                            <button type="submit" title="Cadastrar Usuário" class="btn btn-default">Cadastrar Usuário</button>
                        </div>
                    </div>
                </div>

        </div>

    </div>

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