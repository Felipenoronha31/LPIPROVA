<?php
include 'connect.php';
include 'check.php';
if(isset($_POST['emp'])){
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $rep=$_POST['rep'];

    $sql="insert into empresa (nome_empresa, email_empresa, representante_empresa) values ('$nome','$email', '$rep' )";
    mysqli_query($con, $sql);
}

if(isset($_POST['vei'])){
  $placa=$_POST['placa'];
  $marca=$_POST['marca'];
  $modelo=$_POST['modelo'];
  $ano=$_POST['ano'];

  $sqlvei="insert into veiculo (placa_veiculo, nome_veiculo, marca_veiculo, ano_veiculo) values ('$placa','$modelo', '$marca', '$ano' )";
  mysqli_query($con, $sqlvei);
}

if(isset($_POST['sub'])){
  $empresa=$_POST['empresa'];
  if($_FILES['file']['name']){
    move_uploaded_file($_FILES['file']['tmp_name'], "arquivo/".$_FILES['file']['name']);
    $arq="arquivo/".$_FILES['file']['name'];
    $sqlarq="insert into arquivo (empresa_arquivo, arquivo) values ('$empresa','$arq')";
    mysqli_query($con, $sqlarq);
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imagens/4ATech1.ico" type="image/x-icon"/>
  <title>AdminLTE 3 | Advanced form elements</title>

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
</head>

<body>
<div class="card card-info card-primary">
              <div class="card-header">
                <h3 class="card-title">Cadastro de Empresas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Insira o Nome da Empresa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email corporativo</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Insira o Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Representante</label>
                    <div class="col-sm-10">
                      <input type="text" name="rep" class="form-control" id="inputPassword3" placeholder="Insira o nome de um Representante">
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="emp" class="btn btn-info btn-primary">Cadastrar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

            <div class="card card-info card-primary">
              <div class="card-header">
                <h3 class="card-title">Cadastro de Veículos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Placa</label>
                    <div class="col-sm-10">
                      <input type="text" name="placa" class="form-control" id="inputPassword3" placeholder="Insira a Placa">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Marca</label>
                    <div class="col-sm-10">
                      <input type="text" name="marca" class="form-control" id="inputEmail3" placeholder="Insira a marca">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                      <input type="text" name="modelo" class="form-control" id="inputPassword3" placeholder="Insira o nome">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Ano</label>
                    <div class="col-sm-10">
                      <input type="text" name="ano" class="form-control" id="inputPassword3" placeholder="Insira o ano">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="vei" class="btn btn-info btn-primary">Cadastrar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
            <div class="card card-info card-primary">
              <div class="card-header">
                <h3 class="card-title">Cadastro de Arquivos</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Empresa</label>
                    <div class="col-sm-10">
                      <input type="text" name="empresa" class="form-control" id="inputEmail3" placeholder="Insira a empresa">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="file" class="custom-file-input" id="customFileLang" lang="es">
                      <label class="custom-file-label" for="customFileLang">Selecionar Arquivo</label>
                    </div>
                    </div> 
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="sub" class="btn btn-info btn-primary">Cadastrar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
            
</body>
<div class="text-center">
<a href="viewall.php"><button class="btn btn-info col-2 text-center btn-primary">Ver Dados</button></a>
<a href="logout.php"><button class="btn btn-info col-2 text-center btn-primary">Logout</button></a>
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