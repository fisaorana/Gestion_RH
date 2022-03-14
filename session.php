<?php 
session_start();
if(empty($_SESSION['admin_connecter'])){
  header('location:/Gestion_RH/');
  return;
  }
include("database.php");
$lister=$base->prepare("SELECT * FROM `gerant`");
$donner= $lister->fetch()
 ?>