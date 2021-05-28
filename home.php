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

    <title>4ATech</title>
  </head>
  <body>
  
  <?php include "navbar.php";?>

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
  </body>
</html>