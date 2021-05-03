<?php
session_start();

?>

<html>

<head>
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

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

    <title>Visualizar Cliente</title>

</head>


<body>
    <?php
    include "conexao_crud.php";
    ?>


    <div class="container-sm">
        <div class="teste">
            <div align='center' class="page-header">
                <h1 id="cabeca">Visualizar Adoção</h1>
            </div>
        </div>
    </div>




    <div class="container-fluid">


        <?php
        $conn = conexao();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM adocao WHERE pk_id_adocao=:pk_id_adocao;");
            $stmt2 = $conn->prepare("SELECT * FROM adocao INNER JOIN cliente ON adocao.id_cliente = cliente.pk_id_cliente INNER JOIN pet ON adocao.id_pet = pet.pk_id_pet");
            $stmt->bindParam(':pk_id_adocao', $id);
            $id = $_GET['id'];
            $stmt->execute();
            $stmt2->execute();
            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach ($stmt->fetchAll() as $k => $v) {

                $id = $v['pk_id_adocao'];
                $id_cliente = $v['id_cliente'];
                $id_pet = $v['id_pet'];
                $data_adocao = $v['data_adocao'];
            }
            foreach ($stmt2->fetchAll() as $k => $v){

                $nome_cliente = $v['cli_nome'];
                $raca_pet = $v['raca'];
                $idade_pet = $v['idade'];
                $vacinas = $v['vacinas'];
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        //echo "</table>";

        ?>

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Visualizar</h3>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-book"></i> <?php echo "Adoção com numeração ID:".$id ?>
                            <small class="float-right"></small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong><?php echo "ID Adoção: " . $id ?></strong><br>
                            <?php echo "ID do Cliente: " . $id_cliente ?> <br>
                            <?php echo "Nome do Cliente: " . $nome_cliente ?>
                            <br>
                            <?php echo "ID do Pet: " . $id_pet ?><br>
                            <?php echo "Raça: " . $raca_pet ?> <br>
                            <?php echo "Idade do Pet: " . $idade_pet ?> <br>
                            <?php echo "Vacinas: " . $vacinas ?> <br>
                            <?php echo "Data da Adoção: " . $data_adocao ?><br>
                            <br>
                            <a href="index_adocao.php"> <img width="100" src="img/back-button.png"> </a>

                        </address>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- /.card-header -->
                <!-- form start -->

            </div>




        </div>

        <?php

        include("includes/footer.php");

        ?>
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