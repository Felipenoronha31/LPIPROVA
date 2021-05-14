<?php
include 'connect.php';
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $sql= "
    select * from cadastros as c
    INNER JOIN perfil as p on p.id_perfil = c.fk_idProfile 
    where email_cadastros='$email' and senha_cadastros= '$senha'";   
    $qu= mysqli_query($con, $sql);

    if(mysqli_num_rows($qu)>0){
        $f= mysqli_fetch_assoc($qu);
        $_SESSION['id']=$f['id_cadastros'];
        $_SESSION['perfil']=$f['nome_perfil'];
        header ('location:home.php');
    }
    else{
        echo 'usuário ou senha não existe';
    } 
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imagens/Logo_4ATech.png" type="image/x-icon" />
  <title >Login 4ATECH</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
    <a href="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/index2.html">
		  <img src="imagens/Logo_4ATech.png" alt="4ATech" width="150px">
	  </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Entre em sua conta:</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="senha" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block ">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0 text-center">
        <a href="cadastro.php" class="text-center text-warning">Não tem uma conta? Cadastre-se.</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE-3.1.0-rc/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js"></script>
</body>
</html>
