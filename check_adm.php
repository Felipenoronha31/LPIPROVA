<?php

if($_SESSION['perfil']!='Admin'){
    header('location:home.php');
}

?>