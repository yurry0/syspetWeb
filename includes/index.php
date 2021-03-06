<?php
session_start();

?>

<html>

<head>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="dist/css/bootstrap.css">
  <link rel="stylesheet" href="css/login_style.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">

  <title>Página de Login</title>

  <style>
    body {

      background-image: linear-gradient(to right, #108dc7, #ef8e38);

    }
  </style>

</head>


<body>
  <!-- Main Content -->


  <div class="container-fluid">

    <div class="row main-content bg-success text-center">
      <div class="col-md-4 text-center company__info">

        <span class="company__logo">
          <h3> <img src="img/pet-care_128.png"> </h3>
        </span>
        <h4 class="company_title"></h4>
      </div>
      <div class="col-md-8 col-xs-12 col-sm-12 login_form ">

        <?php
        if (isset($_SESSION['status_cadastro'])) :
        ?>

          <div class="alert alert-success" role="alert">
            Usuário cadastrado com sucesso.
          </div>

        <?php
        endif;
        unset($_SESSION['status_cadastro']);

        ?>




        <?php
        if (isset($_SESSION['nao_autenticado'])) :
        ?>
          <div class="alert alert-danger" role="alert">
            Usuário ou Senha inválidos.
          </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>

        <div class="container-fluid">
          <div class="row">
            <h2>Entrar</h2>
          </div>
          <div class="row">
            <form role="form" name="login_index" method="POST" action="login.php" control="" class="form-group">
              <div class="row">
                <input type="text" name="usuario" id="usuario" class="form__input" placeholder="Usuário" required>
              </div>
              <div class="row">
                <!-- <span class="fa fa-lock"></span> -->
                <input type="password" name="senha" id="senha" class="form__input" placeholder="Senha" required>
              </div>
              <div class="row">
                <input type="checkbox" name="remember_me" id="remember_me" class="">
                <label for="remember_me">Lembrar</label>
              </div>
              <div class="row">
                <div class="col">
                  <input type="submit" value="Entrar" class="btn">
                </div>

              </div>
            </form>
          </div>

          <div class="row">
            <h6> Perdeu a senha? <a href="esqueceu_senha.php"> Solicite uma nova.</a></h6>
          </div>
          <p> <br> - - - - - - - - - - - </p>
          <div class="row">
            <h6> <a href="usuario_add_form.php">Novo acesso? Faça seu cadastro aqui</a></h6>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <div class="container-fluid text-center footer">
    <a href="https://github.com/yurry0/syspetWeb" target="_blank"><i class="fab fa-github"></i>GitHub</a>
    <br>

  </div>

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