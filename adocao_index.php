<!DOCTYPE html>
<html lang="pt">
<?php
session_start();
$_SESSION['usuario'];
include "conexao_crud.php";
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Indíce Adoções</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- fade in -->
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
  <!-- Favicons -->
  <?php include('includes/icon.php') ?>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      opacity: 1;
      transition-duration: 0.7s;
      transition-property: opacity;
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <h1><a href="index.html">SysPet</a></h1>

      </div>

      <?php include('includes/navbar_template.php') ?>

    </div>
  </header><!-- End #header -->

  <main id="main">
    <div class="loader-wrapper">
      <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Índice de Adoções</h2>
          <ol>
            <li><a href="painel.php">Painel</a></li>
            <li>Índice de Adoções</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

          <!-- Main content -->
          <div class="content">
            <div class="container">
              <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                  <?php

                  if (isset($_SESSION['del_adocao'])) {

                    $mensagem = $_SESSION['del_adocao'];
                    echo "
                <script>
                
                   window.onload = function(){
                      toastr.info('$mensagem');
                    };
                
                </script>
                ";
                    unset($_SESSION['del_adocao']);
                  } else if (isset($_SESSION['add_adocao'])) {

                    $mensagem2 = $_SESSION['add_adocao'];
                    echo "
              <script>
                 window.onload = function(){
                    toastr.info('$mensagem2');
                  };
              
              </script>
              ";
                    unset($_SESSION['add_adocao']);
                  } else if (isset($_SESSION['edit_adocao'])) {

                    $mensagem3 = $_SESSION['edit_adocao'];
                    echo "
            <script>
               window.onload = function(){
                  toastr.success('$mensagem3');
                };
            
            </script>
            ";
                    unset($_SESSION['edit_adocao']);
                  }
                  ?>
                  <div class="card">
                    <div class="container-sm">
                      <div class="row">
                        <div class="col-1">

                        </div>
                        <div class="col-1">

                        </div>

                        <div class="col-4">

                        </div>



                        <div class="col-2">
                          <?php
                          echo '<td style=align-items: center;> 
                                            <a id="add" name="add" class="btn btn-primary btn-lg" alt="Adicionar um novo item" href="catalogo.php">
                                    <i class="fas fa-plus"></i></a>'

                          ?>
                        </div>
                        <div class="col-sm">

                        </div>
                      </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>ID da Adoção</th>
                            <th>Nome do Cliente</th>
                            <th>ID do Cliente</th>
                            <th>Nome do Pet</th>
                            <th>ID do Pet</th>
                            <th>Data da Adoção</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php

                          $conexao = conexao();

                          try {
                            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conexao->prepare("SELECT * FROM adocao INNER JOIN cliente ON adocao.id_cliente = cliente.pk_id_cliente INNER JOIN pet  ON adocao.id_pet = pet.pk_id_pet");
                            $stmt->execute();

                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach ($stmt->fetchAll() as $k => $v) {
                              if (!$v['deletado'] == true) {
                                $valid_date = date('d/m/y g:i A', strtotime($v['data_adocao']));
                                echo '<tr>';
                                echo '<td>' . $v['pk_id_adocao'] . '</td>';
                                echo '<td>' . $v['cli_nome'] . '</td>';
                                echo '<td>' . $v['pk_id_cliente'] . '</td>';
                                echo '<td>' . $v['nome'] . '</td>';
                                echo '<td>' . $v['pk_id_pet'] . '</td>';
                                echo '<td>' . $valid_date . '</td>';



                                echo '<td style="text-align:center"> 
                      
                      <a class="btn btn-primary btn-sm" href="adocao_read.php?id=' . $v['pk_id_adocao'] . '">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      </a>
                      
                      <a class="btn btn-info btn-sm" href="adocao_edit_form.php?id=' . $v['pk_id_pet'] . '">
                          <i class="fas fa-pencil-alt">
                          </i>
                      </a>
                       
                      <a class="btn btn-danger btn-sm" href="adocao_delete.php?id=' . $v['pk_id_adocao'] . '&id_pet=' . $v['pk_id_pet'] . '"data-href="adocao_delete.php?id=' . $v['pk_id_adocao'] . '&id_pet=' . $v['pk_id_pet'] . '"data-toggle="modal" data-target="#confirm-delete"">
                      <i class="fas fa-trash-alt"></i>
                      </a>';
                                echo '</tr>';
                              }
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
              </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php

  include('includes/footer_template.php');

  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/toastr/toastr.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>



  <script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  </script>


</body>

</html>