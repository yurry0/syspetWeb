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

  <title>Indíce de Pets</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    #toast-container>.toast-warning {
      background-color: #068D9D;
    }

    #toast-container>.toast-success {
      background-color: #5B7B7A;
    }

    #toast-container>.toast-danger {
      background-color: #6A041D;
    }

    
  </style>


</head>

<body>

  <?php include('includes/navbar_template.php')
  ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Índice de Pets - Tabela</h2>
          <ol>
            <li><a href="painel.php">Painel</a></li>
            <li>Índice de Clientes</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">


        <?php
        if (isset($_SESSION['del_pet'])) {
          $mensagem = $_SESSION['del_pet'];
          echo "
            <script>
               window.onload = function(){
                  toastr.warning('$mensagem');
                };
            </script>
            ";

          unset($_SESSION['del_pet']);
        } else if (isset($_SESSION['add_pet'])) {

          $mensagem2 = $_SESSION['add_pet'];
          echo "
          <script>
             window.onload = function(){
                toastr.success('$mensagem2');
              };
          
          </script>
          ";
          unset($_SESSION['add_pet']);
        } else if (isset($_SESSION['edit_pet'])) {

          $mensagem3 = $_SESSION['edit_pet'];
          echo "
        <script>
           window.onload = function(){
              toastr.success('$mensagem3');
            };
        
        </script>
        ";
          unset($_SESSION['edit_pet']);
        }


        ?>

        <div class="card">
          <div class="container-sm">
            <div class="row">
              <div class="col-5">
              </div>



              <div class="col-2">
                <?php
                echo '<td style=align-items: center;> 
           
             <a id="add" name="add" title="Clique aqui para adicionar um novo pet." class="btn btn-primary btn-lg" alt="Adicionar um novo item" href="pet_add_form.php?id=">
                     <i class="fas fa-plus"></i>
                    
             </a>'

                ?>
              </div>
              <div class="col-sm">

              </div>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="table_pet" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Foto</th>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Especie</th>
                  <th>Raca</th>
                  <th>Sexo</th>
                  <th>Idade</th>
                  <th>Vacinas</th>
                  <th>Adotado?</th>
                  <th>Data de Cadastro</th>

                </tr>
              </thead>
              <tbody>

                <!-- Conexão com o Banco de Dados para puxar todos os dados de Pet -->
                <?php
                include('modal/pet/modal_pet_index.php');
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
 <!-- Toastr -->
 <script src="plugins/toastr/toastr.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

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


</body>

</html>