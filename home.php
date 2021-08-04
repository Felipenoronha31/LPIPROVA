<?php
session_start();
include 'connect.php';
include 'check.php';
include 'logging.php';


    $s="select * from empresa";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

    $s="select * from cadastros";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

    $s="select * from veiculo";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);

    logMsg( "Acessando página HOME" );
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imagens/Logo_4ATech.png" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/summernote/summernote-bs4.min.css">

    <title>4ATech</title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
     
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Página Inicial</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <img src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CloudTech</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 navbar-dark">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">

                <ul class="nav nav-treeview ">
                <li class="nav-item">
                    <a href="home.php" class="nav-link active">
                    <i class="far nav-icon"></i>
                    <p>Página Inicial</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Recursos
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="forms.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastros</p>
                    </a>
                </li>
                <?php
                    if($_SESSION['perfil']=="Admin"){
                        include "logs_link.php";
                    }
                ?>
                <li class="nav-item">
                    <a href="viewall_produtos.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compras</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Tables
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
                    </a>
                </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Sair</p>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <?php
        if($_SESSION['perfil']=="Admin"){
            include "table_usuarios.php";
        }
        ?>
    
    <h3 class="container text-center">Empresas</h3>
    <p>
    <div class="container">
    <table class="table table-striped table-bordered">
    <tr class="cor-tabela">
            <th scope="col">
                    Id
                </th>
                <th scope="col">
                    Nome
                </th>
                <th scope="col">
                Email
                </th>
                <th scope="col">
                Representante
                </th>
                <th scope="col">
                Editar
                </th> 
                <th scope="col">
                Apagar
                </th>
            </th>

    <tbody>

        <?php
            $sq="select * from empresa";
            $qu=mysqli_query($con,$sq);
            while($f=  mysqli_fetch_assoc($qu)){
        ?>
        <tr>
        <td>
                <?php echo $f['id_empresa']?>
            </td>
            <td>
                <?php echo $f['nome_empresa']?>
            </td>
            <td>
                <?php echo $f['email_empresa']?>
            </td>
            <td>
                <?php echo $f['representante_empresa']?>
            </td>
            <td>
                <a href="edit_empresa.php?id_empresa=<?php echo $f['id_empresa']?>">Editar</a>
            </td>
            <td>
                <a href="delete_empresa.php?id_empresa=<?php echo $f['id_empresa']?>">Apagar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    </div>
    </p>
    <h3 class="container text-center">Veículos</h3>
    <p>
    <div class="container">
    <table class="table table-striped table-bordered">
    <tr class="bg-warning">
            <th scope="col">
                    Placa
                </th>
                <th scope="col">
                    Nome
                </th>
                <th scope="col">
                    Marca
                </th>
                <th scope="col">
                    Ano
                </th>
                <th scope="col">
                Editar
                </th> 
                <th scope="col">
                Apagar
                </th>
            </th>

    <tbody>

        <?php
            $sq="select * from veiculo";
            $qu=mysqli_query($con,$sq);
            while($f=  mysqli_fetch_assoc($qu)){
        ?>
        <tr>
        <td>
                <?php echo $f['placa_veiculo']?>
            </td>
            <td>
                <?php echo $f['nome_veiculo']?>
            </td>
            <td>
                <?php echo $f['marca_veiculo']?>
            </td>
            <td>
                <?php echo $f['ano_veiculo']?>
            </td>
            <td>
                <a href="edit_veiculo.php?placa_veiculo=<?php echo $f['placa_veiculo']?>">Editar</a>
            </td>
            <td>
                <a href="delete_veiculo.php?placa_veiculo=<?php echo $f['placa_veiculo']?>">Apagar</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    </div>
    </p>

    <div class="text-center">
    <a href="viewall_produtos.php"><button class="btn btn-info col-2 text-center btn-primary">Compras</button></a>
    <a href="forms.php"><button class="btn btn-info col-2 text-center btn-primary">Cadastrar</button></a>
    <?php
        if($_SESSION['perfil']=="Admin"){
            include "btn_loggings.php";
        }
    ?>

    <a href="logout.php"><button class="btn btn-info col-2 text-center btn-primary">Sair</button></a>
    </div>

    <p>
    <?php
    include 'footer.php';
    ?>
    </p>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
  <!-- /.control-sidebar -->
</div>
  <!-- jQuery -->
  <script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/moment/moment.min.js"></script>
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- jQuery -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/moment/moment.min.js"></script>
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/pages/dashboard.js"></script>
  </body>
</html>