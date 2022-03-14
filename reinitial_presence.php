<?php 
require 'php-export-data.class.php';
include("database.php");
$vid=$base->prepare("TRUNCATE `gestion_av`.`presence`");
$vid->execute();
header("location:/Gestion_RH/presence.php");
?>