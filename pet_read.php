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
        <h1 id="cabeca">Visualizar Pet</h1>
      </div>
    </div>
  </div>




  <div class="container-fluid">


  <?php
                  $conn=conexao();
                  try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM pet WHERE pk_id_pet=:pk_id_pet");
                    $stmt->bindParam(':pk_id_pet', $id);
                    $id = $_GET['id'];
                    $stmt->execute();
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $k=>$v) {


                        $id = $v['pk_id_pet'];
                        $raca = $v['raca'];
                        $sexo = $v['sexo'];
                        $idade = $v['idade'];
                        $vacinas = $v['vacinas'];
                        $altura = $v['altura'];
                        $peso = $v['peso'];
                        $img_pet = $v['img_pet'];
                      
                                            
                    }
                  } catch(PDOException $e) {
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
                    <i class="fas fa-book"></i> <?php echo $raca?>
                    <small class="float-right"></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                     <?php echo "Foto: ".$img_pet?><br>
                    <strong><?php echo "Raça: ".$raca?></strong><br>
                    <?php echo "Sexo: ".$sexo?> <br>
                    <?php echo "Idade: ".$idade?><br>
                    <?php echo "Vacinas: ".$vacinas?><br>
                    <?php echo "Altura: ".$altura?><br>
                    <?php echo "Peso: ".$peso?><br>
                    <br>
                    <a href="index_pet.php"> <img width="100"  src="img/back-button.png"> </a>
                    
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