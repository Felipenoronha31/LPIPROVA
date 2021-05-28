<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="imagens/4ATech1.ico" type="image/x-icon" />

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
  <title>Editar</title>
</head>
<body>
<?php include "navbar.php";?>

<h1> Editar Cadastros </h1>


<?php
    session_start();
    include 'connect.php';
    include 'check.php';
    include 'logging.php';
    logMsg( "Acessando a página EDIT CADASTROS" );

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $perfil=$_POST['idperfil'];


        $sql="
        update cadastros set nome_cadastros='{$nome}', email_cadastros='{$email}', fk_idProfile='{$perfil}' where id_cadastros = {$id},
        ";
        mysqli_query($con, $sql);
        header('location:home.php');
    }
    if(isset($_POST['cancelar'])){
        header('location:home.php');
    }

    $id = $_GET['id_cadastros'];


    $sql= "
            select * from cadastros as c
                    INNER JOIN perfil as p on p.id_perfil = c.fk_idProfile 
            ";
    $query= mysqli_query($con, $sql);
    $result=mysqli_fetch_assoc($query);
?>
    
    <form method="POST" enctype="multipart/form-data">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>
                             Id:
                            <input readonly="readonly" type="text"  name="id" value="<?php echo $result['id_cadastros']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nome:
                            <input type="text" name="nome" value="<?php echo $result['nome_cadastros']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email:
                            <input type="text" name="email" value="<?php echo $result['email_cadastros']?>">
                        </td>
                    </tr>
                    <tr>
                    <td>
                        Id Perfil:
                        <input  type="text"  name="idperfil" value="<?php echo $result['id_perfil']?>">
                    </td>
                    </tr>
                    <tr>
                    <div class="card-footer">
                    <td>
                        <button type="submit" value="Editar" name="update" class="btn btn-info col-2 btn-warning">Editar</button>
                        <button type="submit" value="Editar" name="cancelar" class="btn btn-info col-2 btn-warning">Cancelar</button>
                        
                               
                    </td>
                    </div>
                </tr>
               
                </table>    
    </form>
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