<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        .teste {


   
        }

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
        <div class="container" style="border-color:#4DA8DA; border-left-style: solid;  border-width: 11px;">
            <form>
                <div class="row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Confirmar Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>

                

                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirmar Senha</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-default">Cadastrar</button>
                        </div>
                    </div>
                </div>

        </div>

    </div>

    </form>
    </div>



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