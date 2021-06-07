<?php

session_start();
include("conexao.php");
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);


$erro = array();
if (isset($_POST['ok'])) {

    $email = mysqli_real_escape_string($conexao, $_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro[] = "E-mail inválido";
    }


    $sql_code = "SELECT senha FROM usuario WHERE usuario = '$email'";
    $sql_query = mysqli_query($conexao, $sql_code) or die($mysqli->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;


    if ($total == 0)
        $erro[] = "O e-mail informado não existe no banco de dados";

    if (count($erro) == 0 && $total > 0) {

        $novasenha = substr(md5(time()), 0, 6);
        $nscripto = md5(md5($novasenha));


        if ($total > 0) {
            isset($_SESSION['email_success']);
            $sql_code = "UPDATE usuario SET senha = '$nscripto' WHERE usuario = '$email'";
            $sql_query = mysqli_query($conexao, $sql_code) or die($mysqli->error);


            include("includes/send_email.php");
            if ($sql_query)
                $_SESSION['senha_feita'] = true;
            $erro[] = "Senha Alterada com Sucesso!";
            header('Location: esqueceu_senha.php');
        }
    }
}
?>

<html>

<head>
    <!-- Required meta tags -->
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

    <title>Recuperar Senha</title>
</head>

<body>

    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Solicitar uma nova senha</h1>
            </div>
        </div>
        <br>
        <br><br><br>
        <!-- FORM -->
        <div class="container" style="border-color:#4DA8DA; border-left-style: solid;  border-width: 11px;">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail de acesso</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Digite aqui o seu e-mail de acesso">
                    <small id="emailHelp" class="form-text text-muted">Este e-mail já deve ter sido cadastrado anteriormente.</small>
                </div>
                <div class="container">
                    <button type="submit" name="ok" class="btn btn-primary btn-sm">Solicitar uma nova senha</button>
                </div>
            </form>

        </div>
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