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

    <title>Clientes</title>

</head>


<body>
<?php
          include "conexao_crud.php";
          ?>


<div class="card">
         
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
                      
                      echo '<td style="text-align:center"> 
                      
                      <a class="btn btn-primary btn-sm" href="visu_livro.php?id=' . $v['pk_id_cliente'] . '">
                              <i class="fas fa-folder">
                              </i>
                      </a>
                      
                      <a class="btn btn-info btn-sm" href="edit_livro.php?id=' . $v['pk_id_cliente'] . '">
                          <i class="fas fa-pencil-alt">
                          </i>
                      </a>
                       
                      <a class="btn btn-danger btn-sm" href="delete_livro.php?id=' . $v['pk_id_cliente'] . '" data-href="delete_livro.php?id=' . $v['pk_id_cliente'] . '" data-toggle="modal" data-target="#confirm-delete">
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