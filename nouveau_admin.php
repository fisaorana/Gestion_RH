<?php
    session_start();
    include('database.php');
    $req=$base->prepare("SELECT * FROM `admincompte` ");
    $req->execute();
    $affich=$req->fetch();
    if(isset($_POST['nvmdf'])) {
        $nvmail=htmlspecialchars($_POST['nv_grandAdmin']);
        $nvmdp=md5($_POST['nv_mdp_G_A']);
        $req=$base->prepare("UPDATE `admincompte` SET `mail` = :nvml, `mdp` = :nvp WHERE `admincompte`.`id` = 1;");
        $fini=$req->execute(array(
            "nvml"=>$nvmail,
            "nvp"=>$nvmdp
        ));
        if($fini){
            header("location:/Gestion_RH/?modif=ok");
        }
    } else {
            header("location:/Gestion_RH/?error=fajk");
        }
?>