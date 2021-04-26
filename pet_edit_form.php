
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


<div class="wrapper" >

     
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0">Edição - Pets</h1>
          </div><!-- /.col -->
          <div class="col-sm-9">
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
        
      <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Pet</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" name="edit_pet" method="POST" action="pet_edit_action.php?id=<?php echo $id; ?>">
            <div class="card-body">

              
                    <label for="id">Código</label>
                    <input type="int" disabled name = "id" class="form-control" id="id" value=<?php echo $id ?> placeholder="Auto">
                  
              


                <!-- Campo Raça -->

                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <label for="raca">Raça</label>
                            <input type="text" value=<?php echo $raca ?> class="form-control rounded-0" name="raca" id="raca" placeholder=".rounded-0">
                        </div>


                        <div class="col-2">
                            <label for="sexo">Sexo</label>
                            <select class="custom-select form-control-border" name="sexo" id="sexo" value=<?php echo $sexo ?>>
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
                            <input type="number" class="form-control rounded-0" name="idade" id="idade" placeholder="" value=<?php echo $idade ?> >
                        </div>
                        <div class="col-2">

                            <!-- Campo Altura -->
                            <label for="raca">Altura</label>
                            <input type="text" class="form-control rounded-0" name="altura" id="altura" placeholder="" value=<?php echo $altura ?>>
                        </div>

                        <!-- Campo Peso -->
                        <div class="col-2">

                            <label for="raca">Peso</label>
                            <input type="text" class="form-control rounded-0" name="peso" id="peso" placeholder="" value=<?php echo $peso ?>>
                        </div>

                    </div>

                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="raca">Vacinas</label>
                            <input type="text" class="form-control form-control-lg rounded-0" name="vacinas" id="vacinas" placeholder="" value=<?php echo $vacinas ?> >
                        </div>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <div class="col-1"></div>
                        <div class="col-2">
                  <img src="img/pet-care_128.png">
                </div>

                    </div>
                </div>
              
                
                <div class="form-group">
                    <div class="row">
                    <div class="col-6">
                    <label for="img_pet">Adicionar Foto</label>
                    <div><input name="img_pet" value=<?php echo $img_pet ?> id="img_pet" type="file"/></div>
                    </div>
                    </div>
                </div>
                  
  
            
                <div class="">
                    <button type="submit" class="btn btn-block bg-gradient-success btn-flat" alt="Concluir Edição">Concluir Edição</button>
                </div>
            </div>
    </form>



    </div>

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
