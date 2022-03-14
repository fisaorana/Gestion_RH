<?php 
try {
	$base=new PDO('mysql:host=localhost;dbname=gestion_av' , 'root' , '150202Fisa&finoanA');

} catch (Exception $e) {
	die('Erreur'.$e->getMessage());
	}
if ($_GET['id_updt2']!="") {
    if(isset($_POST['nom_employer']) or isset($_POST['prenom_employer']) or isset($_POST['matr_employer']) or isset($_POST['adress_employer'])
    or isset($_POST['phone_employer']) or isset($_POST['qual_employer']) or isset($_POST['niv_employer']) 
    or isset($_POST['heur_employer'])){
        $req=$base->prepare("UPDATE `gerant` SET `nom` = :nam, `prenom` = :surnam, `nMatr` = :matrix, `adress` = :lot, `phone` = :mob, `qualification` = :qualif, `niv` = :nniv, `heure_de_trav` = :hhrr WHERE `gerant`.`id` = :iid;
        ");
        $ajout=$req->execute(array(
            "nam"=>$_POST['nom_employer'],
            "surnam"=>$_POST['prenom_employer'],
            "matrix"=>$_POST['matr_employer'],
            "lot"=>$_POST['adress_employer'],
            "mob"=>$_POST['phone_employer'],
            "qualif"=>$_POST['qual_employer'],
            "nniv"=>$_POST['niv_employer'],
            "hhrr"=>$_POST['heur_employer'],
            "iid"=>$_GET['id_updt2']
        ));
        if ($ajout) {
            header('location:/Gestion_RH/dashboard.php?update=ok');
        }else{
            header('location:/Gestion_RH/dashboard.php?error=ok');
        }
    } else {
        header('location:/Gestion_RH/dashboard.php?error=ok');
    }
}
 ?>
