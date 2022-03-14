<?php 
session_start();
require "session.php";
try {
	$base=new PDO('mysql:host=localhost;dbname=gestion_av' , 'root' , '150202Fisa&finoanA');

} catch (Exception $e) {
	die('Erreur'.$e->getMessage());}
if (isset($_GET['id_del']) and $_GET['nbrsup']==0) {
	$req=$base->prepare("DELETE  FROM `gerant` WHERE id=:monid");
	$affich=$req->execute(array(
	"monid"=>$_GET['id_del']
	));
	if ($affich) {
		header('location:/Gestion_RH/dashboard.php');
	}else{
	echo "error";
}} 
// chexbox suppr
if (isset($_GET['id_del']) and $_GET['nbrsup']>=1) {
	$emp_sup =$_GET['id_del'];
	$string = explode(',', $emp_sup);
	print_r($string);
	foreach ($string as $s){
		$req_a=$base->prepare("DELETE  FROM `gerant` WHERE id=:monid");
		$req_a->execute(array(
		"monid"=>$s
		));
		echo "ok".$s;
	}
	header("location:/Gestion_RH/dashboard.php");
}
 ?>