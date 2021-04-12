

<html>

<head>

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
      margin-left: 2px;
      height: 45px;
      padding: 10px;
      text-align: center;
      position: center;
    }
  </style>

  <title>Clientes</title>

</head>


<body>


  <?php
  session_start();
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

    if (isset($_SESSION['del'])) {

      $mensagem = $_SESSION['del'];
      echo "
                <script>
                
                   window.onload = function(){
                      toastr.info('$mensagem');
                    };
                
                </script>
                ";
    } else if (isset($_SESSION['add'])) {

      $mensagem2 = $_SESSION['add'];
      echo "
              <script>
                 window.onload = function(){
                    toastr.success('$mensagem2');
                  };
              
              </script>
              ";
    } else if (isset($_SESSION['edit'])) {

      $mensagem3 = $_SESSION['edit'];
      echo "
            <script>
               window.onload = function(){
                  toastr.success('$mensagem3');
                };
            
            </script>
            ";
    }
    session_unset();

    ?>

    <div class="card">
      <?php include('includes/add_button.php')?>

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
                      
                      <a class="btn btn-primary btn-sm" href="visu_cliente.php?id=' . $v['pk_id_cliente'] . '">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      </a>
                      
                      <a class="btn btn-info btn-sm" href="edit_cliente_form.php?id=' . $v['pk_id_cliente'] . '">
                          <i class="fas fa-pencil-alt">
                          </i>
                      </a>
                       
                      <a class="btn btn-danger btn-sm" href="excluir_cliente.php?id=' . $v['pk_id_cliente'] . '"data-href="excluir_cliente.php?id=' . $v['pk_id_cliente'] . '" data-toggle="modal" data-target="#confirm-delete"">
                      <i class="fas fa-trash-alt"></i>
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
    </div>
 
  </div>

  <!-- /.card-body -->
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          Confimar Exclusão
        </div>
        <div class="modal-body">
          Essa ação vai excluir o conteúdo selecionado. Deseja mesmo excluir?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-danger btn-ok">Sim, exclua este conteúdo.</a>
        </div>
      </div>
    </div>
  </div>
  <?php

include("includes/footer.php");

?>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>



  <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  </script>




  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>


</body>

</html>