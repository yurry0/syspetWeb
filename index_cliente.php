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

  <title>Clientes</title>

</head>


<body>
  <?php
  include "conexao_crud.php";
  ?>


  <div class="container-sm">
    <div class="teste">
      <div align='center' class="page-header">
        <h1 id="cabeca">Índice de Clientes</h1>
      </div>
    </div>
  </div>




  <div class="container-fluid">



    <?php
    if (isset($_SESSION['add'])) :
    ?>

      <div class="alert alert-success" role="alert">
        Cliente cadastrado com sucesso!
      </div>

    <?php
    endif;
    unset($_SESSION['add']);

    ?>


    <div class="card">
      <div class="container-sm">
      <div class="row">
      <div class="col-sm">
  
    </div>
    <div class="col-sm">
    <?php
        echo '<td style="text-align:center"> 
                      
                 <a class="btn btn-primary btn-sm" href="add_cliente.php?id=">
                         <i class="fas fa-plus"> </i>
                        
                 </a>'

        ?>
    </div>
    <div class="col-sm">
     
    </div>
    </div>
      </div>
       
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Cidade</th>
              <th>RG</th>
              <th>Estado</th>
              <th>CEP</th>
              <th>Endereço</th>
              <th>Bairro</th>
              <th>E-Mail</th>




            </tr>
          </thead>
          <tbody>

            <?php

            $conexao = conexao();

            try {
              $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conexao->prepare("SELECT * FROM cliente");
              $stmt->execute();

              // set the resulting array to associative
              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
              foreach ($stmt->fetchAll() as $k => $v) {
                echo '<tr>';
                echo '<td>' . $v['pk_id_cliente'] . '</td>';
                echo '<td>' . $v['cli_nome'] . '</td>';
                echo '<td>' . $v['cidade'] . '</td>';
                echo '<td>' . $v['cli_rg'] . '</td>';
                echo '<td>' . $v['cli_estado'] . '</td>';
                echo '<td>' . $v['cli_cep'] . '</td>';
                echo '<td>' . $v['cli_endereco'] . '</td>';
                echo '<td>' . $v['cli_bairro'] . '</td>';
                echo '<td>' . $v['cli_email'] . '</td>';


                echo '<td style="text-align:center"> 
                      
                      <a class="btn btn-primary btn-sm" href="visu_livro.php?id=' . $v['pk_id_cliente'] . '">
                              <i class="fas fa-folder">
                              </i>
                      </a>
                      
                      <a class="btn btn-info btn-sm" href="c_.php?id=' . $v['pk_id_cliente'] . '">
                          <i class="fas fa-pencil-alt">
                          </i>
                      </a>
                       
                      <a class="btn btn-danger btn-sm" href="delete_cliente.php?id=' . $v['pk_id_cliente'] . '" data-href="excluir_cliente.php?id=' . $v['pk_id_cliente'] . '" data-toggle="modal" data-target="#confirm-delete">
                      <i class="fas fa-trash-alt">
                      </i>
                      </a>';
                echo '</tr>';
              }
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            $conn = null;
            //echo "</table>";
            ?>


          </tbody>


        </table>
      </div>


      <!-- /.card-body -->

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