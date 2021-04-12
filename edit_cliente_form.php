
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Clientes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<?php 

include('conexao_crud.php');

?>


<?php
                  $conn=conexao();
                  try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM cliente WHERE pk_id_cliente=:pk_id_cliente");
                    $stmt->bindParam(':pk_id_cliente', $id);
                    $id = $_GET['id'];
                    $stmt->execute();
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach($stmt->fetchAll() as $k=>$v) {
                      $nome = $v['cli_nome'];
                      $cidade = $v['cidade'];
                      $rg = $v['cli_rg'];
                      $estado = $v['cli_estado'];
                      $cep = $v['cli_cep'];
                      $endereco = $v['cli_endereco'];
                      $bairro = $v['cli_bairro'];
                      $email = $v['cli_email'];
                                            
                    }
                  } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                  }
                  $conn = null;
                  //echo "</table>";
            ?>


<div class="wrapper">

     
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
     <!-- form start -->
     <form role="form" name="edit_cliente" method="POST" action="edit_cliente_action.php?id=<?php echo $id; ?>">
            <div class="card-body">
                <!-- <div class="form-group">
                    <label for="id">Código</label>
                    <input type="int" disabled name = "id" class="form-control" id="id" placeholder="Auto">
                  </div>
                  <-->

                  <div class="form-group">
                    <label for="tituloInput">ID</label>
                    <input type="text" name="id" required class="form-control" id="id" placeholder="" value="<?php echo $id?>" disabled>
                </div>

                <div class="form-group">
                    <label for="tituloInput">Nome</label>
                    <input type="text" name="nome" required class="form-control" id="nome" placeholder="" value="<?php echo $nome  ?>">
                </div>
                <div class="form-group">
                    <label for="autorInput">Cidade</label>
                    <input type="text" name="cidade" required class="form-control" id="cidade" placeholder=""value="<?php echo $cidade?>" >
                </div>

                <div class="form-group">
                    <label for="autorInput">RG</label>
                    <input type="text" name="rg" required class="form-control" id="rg" placeholder="" value="<?php echo $rg?>" >
                </div>

                <div class="form-group">
                    <label for="autorInput">Estado</label>
                    <input type="text" name="estado" required class="form-control" id="estado" placeholder="" value="<?php echo $estado?>" >
                </div>

                <div class="form-group">
                    <label for="autorInput">CEP</label>
                    <input type="text" name="cep" required class="form-control" min="1" max="2020" id="cep" placeholder="" value="<?php echo $cep?>" >
                </div>
                <div class="form-group">
                    <label for="autorInput">Endereço</label>
                    <input type="text" name="endereco" required class="form-control" min="1" max="2020" id="endereco" placeholder="" value="<?php echo $endereco?>" >
                </div>

                <div class="form-group">
                    <label for="autorInput">Bairro</label>
                    <input type="text" name="bairro" required class="form-control" min="1" max="2020" id="bairro" placeholder="" value="<?php echo $bairro?>" >
                </div>
                <div class="form-group">
                    <label for="autorInput">E-Mail</label>
                    <input type="email" name="email" required class="form-control" min="1" max="2020" id="email" placeholder=" "value="<?php echo $email?>" >
           
                <div class="">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>




      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
