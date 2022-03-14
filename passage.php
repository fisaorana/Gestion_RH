<?php
	$name=htmlspecialchars($_POST['nom_employer']);
	$surname=htmlspecialchars($_POST['prenom_employer']);
	$matr=htmlspecialchars($_POST['matr_employer']);
  	$adres=htmlspecialchars($_POST['adress_employer']);
	$phone=htmlspecialchars($_POST['phone_employer']);
	$role=htmlspecialchars($_POST['qual_employer']);
	$niv=htmlspecialchars($_POST['niv_employer']);
	$hrr=htmlspecialchars($_POST['heur_employer']);
if ($name!=="" && $surname!=="" && $matr!=="" && $hrr!=="") {//verifier si c'est complet les donner requis

	include("database.php");
	$reqe=$base->prepare("SELECT * FROM `gerant` WHERE nMatr=?");
	$reqe->execute([$matr]);
	$donner=$reqe->fetch();
	if ($donner) {//verification doublant
		header("location:/Gestion_RH/dashboard.php?membre=true");
			}
		else{
			echo('blem');
			$req=$base->prepare("INSERT INTO `gerant` (`id`, `nom`, `prenom`, `nMatr`, `adress`, `phone`, `qualification`, `niv`, `heure_de_trav`, `date_ajout`) VALUES (NULL, :n, :P_N, :M, :Ad, :Num, :rol, :nivv, :hr_tr, current_timestamp();)");
			$req->execute(array(
    		"n"=>$name,
    		"P_N"=>$surname,
    		"M"=>$matr,
    		"Ad"=>$adres,
    		"Num"=>$phone,
    		"rol"=>$role,
    		"nivv"=>$niv,
    		"hr_tr"=>$hrr
				));
				mail("allvision@gmail.com","ajout d'une eployer") ;
				header('location:/Gestion_RH/dashboard.php');

		}
}	
else{
	header("location:/Gestion_RH/dashboard.php?error=true");
}

 ?>

