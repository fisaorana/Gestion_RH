<?php
session_start();
if(empty($_SESSION['admin_connecter'])){
  header('location:/Gestion_RH/');
  return;
  }
include("database.php");
if (isset($_GET['id_pres'])) {
  $emp_pres =$_GET['id_pres'];
  $stri = explode(',', $emp_pres);
  $timenow=date('h:i:s a', time());
  $d=date('Y-m-d');
  $a=date('G');
  $e=date('a',time());
  if ($a>17 || $a<6 and $e="am"){
    $shift="Nuit";
  } else {
    $shift="Jour";
  }
  foreach ($stri as $s){
		$re=$base->prepare("INSERT INTO `presence` (`id`, `id_employer`, `date`, `heure_d_entrer`, `shift`, `etat`) VALUES (NULL, :id_employers, :dj, :hr, :shf, :et);");
		$ok=$re->execute(array(
		"id_employers"=>$s,
    "dj"=>$d,
    "hr"=>$timenow,
    "shf"=>$shift,
    "et"=>true,
		));
    if ($ok) {
      echo "ok".$s;
      header("location:/Gestion_RH/presence.php");
    } else {
      echo $shift;
      print_r($stri);
    }
	}
} else {
  echo "vide";
}

?>