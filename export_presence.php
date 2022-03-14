<?php 
require 'php-export-data.class.php';
include("database.php");
//login

date_default_timezone_set("America/New_York");
$exporter = new ExportDataExcel('browser', 'Presence_le_'.date("Y.m.d") .'.xls');

$exporter->initialize(); // starts streaming data to web browser

// pass addRow() an array and it converts it to Excel XML format and sends 
// it to the browser
$exporter->addRow(array("Prenom", "N matricule", "Heure-d'arriver", "Etat"));
$ins = $base->prepare("SELECT gerant.nom,gerant.prenom,gerant.nMatr,gerant.adress,gerant.phone,gerant.qualification,gerant.niv,gerant.heure_de_trav,gerant.date_ajout FROM `gerant`");
$ins->execute();
while($data=$ins->fetch()){
$exporter->addRow(array($data['nom'], $data['prenom'], $data['nMatr'], $data['adress'],$data['phone'],$data['qualification'],$data['niv'],$data['heure_de_trav'],$data['date_ajout']));
}






// doesn't care how many columns you give it
$exporter->addRow(array("")); 

$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done






 ?>
