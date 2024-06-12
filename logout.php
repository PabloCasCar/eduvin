<?php include('ligacao.php');?>
<?php include('cabecalho.php');?>
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>