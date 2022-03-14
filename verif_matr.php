<?php
    require "session.php";
    include ('database.php');
    $matr_arriv0=htmlspecialchars($_POST['matricul_arriv']);
    $matr_arriv=strtoupper($matr_arriv0);
$lister=$base->prepare("SELECT * FROM `gerant` ");
$lister->execute();
// verifier si il est deja dans de present
$lis=$base->prepare("SELECT * FROM `presence` ");
$lis->execute();
while($donner = $lister->fetch()){?>
<?php
    if($matr_arriv!="" and $matr_arriv==$donner['nMatr']){
        while($don=$lis->fetch()){?>
        <?php
            if ($matr_arriv!=$don['matricul_prsnt']) {
                $requ=$base->prepare("INSERT INTO `presence` (`id`, `matricul_prsnt`, `heur_arrive`, `Etat`) VALUES (NULL, :nmtr, current_timestamp(), '1');");
                $requ->execute(array(
                    "nmtr"=>$matr_arriv,
                ));
            } else {
                echo "tsy ekena fa efa ao";
            }?>
        <?php } ?>
    <?php
    }else{
        echo "tsy membre miits";
    }
?>
<?php } ?>