<?php
session_start();
include("../database.php");
if(isset($_GET['user_chercher'])){
    $userChercher=(string) trim($_GET['user_chercher']);
    $req=$base->prepare("SELECT * FROM `gerant` WHERE `nom` LIKE :chrchr OR `prenom` LIKE :chrchr OR `nMatr` LIKE :chrchr OR `adress` LIKE :chrchr
    OR `phone` LIKE :chrchr OR `qualification` LIKE :chrchr OR `niv` LIKE :chrchr LIMIT 10");
    $arriver=$req->execute(array("chrchr"=>$userChercher));
    if ($arriver) {
        $affich=$req->fetchall();
        header("../dashboard.php");
    } else {
        # code...
    }
    
}
?>