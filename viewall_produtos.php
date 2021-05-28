<!DOCTYPE html>
<html>
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
</head>
<body>
<?php include "navbar.php";?>
<?php
    session_start();
    include 'connect.php';
    include 'check.php';
    include 'logging.php';
    logMsg( "Acessando a página Compras" );

    if(isset($_POST['addShoppingCart'])){
    
        $product_id = (int)$_POST['idProduto'];
        $quantity = (int)$_POST['quantity'];
        $nomeProduto = $_POST['nomeProduto'];

        $idCompra = 1;

        $sqlGetCompra="select * from compra_produto where fk_compra={$idCompra} AND fk_produto ={$product_id}";
        $queryGetCompra= mysqli_query($con, $sqlGetCompra);
        $resultCompra=mysqli_fetch_assoc($queryGetCompra);

        $ExisteCompra = isset($resultCompra);    
        if(isset($resultCompra)){
            
            $sqlAddOrUpdate = "
            UPDATE compra_produto set qtd_produto={$quantity} 
            WHERE fk_produto ={$product_id} and fk_compra={$idCompra};
            ";

        }else{
            $sqlAddOrUpdate = "
            INSERT INTO compra_produto (fk_produto,fk_compra,qtd_produto) 
            VALUES ({$product_id}, {$idCompra},{$quantity});
            ";

        }

        mysqli_query($con, $sqlAddOrUpdate);





    }

?>


<table class="table table-striped table-bordered" border='1'>
    <tr>
        <th>
            Id
        </th>
        <th>
            Nome
        </th>
        <th>
            Preço
        </th>
        <th></th>

    </tr>

<?php
$sq="
select * from produto as p
left join compra_produto as cp on cp.fk_produto = P.id_produto
";



$qu=mysqli_query($con,$sq);
while($produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $produto['id_produto']?>
        </td>
        <td>
            <?php echo $produto['nome_produto']?>
        </td>
        <td>
            <?php echo $produto['price']?>
        </td>
        <td>
            <form method="POST" enctype="multipart/form-data">
                <input type="number" name="quantity" value="<?=$produto['qtd_produto']?>" min="1" placeholder="Quantity" required>
                <input type="hidden" name="idProduto" value="<?=$produto['id_produto']?>">
                <input type="hidden" name="nomeProduto" value="<?=$produto['nome_produto']?>">
                <input type="submit" name="addShoppingCart" value="Adicionar">
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>

<br>
<br>
<br>



<table class="table table-striped table-bordered" border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço
        </th>
        <th>
            Quantidade
        </th>
        <th>
            Total Preço
        </th>
    </tr>

<?php
$sq="
SELECT * FROM compra_produto as cp
inner join compra as c on c.id_compra = cp.fk_compra
inner join produto as p on p.id_produto = cp.fk_produto
";
$qu=mysqli_query($con,$sq);
while($compra_produto= mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $compra_produto['nome_produto']?>
        </td>
        <td>
            <?php echo $compra_produto['price']?>
        </td>
        <td>
            <?php echo $compra_produto['qtd_produto']?>
        </td>
        <td>
            <?php echo $compra_produto['qtd_produto']*$compra_produto['price']?>
        </td>

    </tr>
    <?php
}
?>
</table>
<br>

<div class="text-center">
<a href="home.php"><button class="btn btn-info col-2 text-center btn-primary">Voltar</button></a>
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