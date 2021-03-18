<?php
session_start();
include("conexao.php");

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


        if  (mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)) {
            include("includes/send_email.php");
            $sql_code = "UPDATE usuario SET senha = '$nscripto' WHERE usuario = '$email'";
            $sql_query = mysqli_query($conexao, $sql_code) or die($mysqli->error);

            if ($sql_query)
                $erro[] = "Senha Alterada com Sucesso!";
        }
    }
}

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

    <title>Recuperar Senha</title>
</head>

<body>
    <?php if (count($erro) > 0)
        foreach ($erro as $msg) {

            echo "<p>$msg</p>";
        }
    ?>
    <br>

    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Recuperar a senha</h1>
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