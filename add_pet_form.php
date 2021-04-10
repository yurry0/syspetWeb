<?php
session_start();
include("conexao.php");
isset($_SESSION['senha_feita']);
isset($_SESSION['email_feito']);



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
            <h3 class="card-title">Adicionar Pet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="add_pet" method="POST" action="add_pet_action.php">
            <div class="card-body">

                <!-- <div class="form-group">
                    <label for="id">Código</label>
                    <input type="int" disabled name = "id" class="form-control" id="id" placeholder="Auto">
                  </div>
                  <-->


                <!-- Campo Raça -->

                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <label for="raca">Raça</label>
                            <input type="text" class="form-control rounded-0" name="raca" id="raca" placeholder=".rounded-0">
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
                    </div>
                </div>



                <div class="form-group">
                    <div class="row">

                        <!-- Campo Idade -->

                        <div class="col-2">
                            <label for="raca">Idade</label>
                            <input type="number" class="form-control rounded-0" name="idade" id="idade" placeholder="">
                        </div>
                        <div class="col-2">

                            <!-- Campo Altura -->
                            <label for="raca">Altura</label>
                            <input type="text" class="form-control rounded-0" name="altura" id="altura" placeholder="">
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
                        <div class="col-6">
                            <label for="raca">Vacinas</label>
                            <input type="text" class="form-control form-control-lg rounded-0" name="vacinas" id="vacinas" placeholder="">
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
              
                
                <div class="form-group">
                    <div class="row">
                    <div class="col-6">
                    <label for="img_pet">Adicionar Foto</label>
                    <div><input name="img_pet" id="img_pet" type="file"/></div>
                    </div>
                    </div>
                </div>
    

                <div class="">
                    <button type="submit" class="btn btn-block bg-gradient-success btn-flat">Adicionar</button>
                </div>
            </div>
    </form>



    </div>


    </div>


    <!-- FOOTER -->

    <footer class="text-center text-white" style="background-color: #f1f1f1;">

        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/yurry0/syspetWeb" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
            © 2021:
            CreativeCode
        </div>
        <!-- Copyright -->
    </footer>


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