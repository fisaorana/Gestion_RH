<?php
    session_start();
    include('database.php');
    $req=$base->prepare("SELECT * FROM `admincompte` ");
    $req->execute();
    $affich=$req->fetch();
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css">
    <link href="bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
</head>
<body>
    <style>
        body {
            background-repeat:no-repeat;
            -webkit-perspective: 800px;
            perspective: 800px;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: "Gudea", sans-serif;
            background:linear-gradient(180deg, rgb(0 165 162 / 62%) 30%, rgb(131 181 62 / 69%) 70%);
        }
    </style>
<div class="formulaire" style="background-color:#00a5a2;!important; box-shadow: 0px 0px 21px -9px;border-radius: 12px 12px 12px 12px;">
    <div class="tete_form" style="height: 31px;width: 100%;background:#83b53e;margin: 0px;position: absolute;top: 0%;left: 0%;    border-radius: 12px 12px 0px 0px;"></div>
    <div class="N_Pn_admin">
        <h2>
            SOCIETE <br>ALL-VISION
        </h2>
    </div>
        <div class="champ">
            <?php if (empty($_GET['ancien'])) {?>
                    <form method="post">
                    <input class="fom" type="email" placeholder="Ancien E-mail" name="an_grandAdmin"><br>
                    <input class="fom" type="password" placeholder="Ancien Mot de passe" name="an_mdp_G_A"><br>
                    <input type="submit" value="VALIDER" name="valider" class="fom">
            <?php } else {?>
                    <form method="post" action="/Gestion_RH/nouveau_admin.php">
                    <input class="fom" type="email" placeholder="Nouveau E-mail" name="nv_grandAdmin"><br>
                    <input class="fom" type="password" placeholder="Nouveau Mot de passe" name="nv_mdp_G_A"><br>
                    <input type="submit" value="MODIFIER" name="nvmdf" class="fom">
            <?php }?>
        </form>
        </div>    
        <button class="btn btn-successs" style="outline: none;border: 0px;background: #95a095;color: white;padding: 10px;border-radius: 30px;margin-top: 11px;"><a href="/Gestion_RH/" style="color:white;">RETOUR</a></button>
    <div class="lettre">
        <p>Cette espace est reservé au administrateur , 
            verifie bien votre e-mail et mot de passe pour y acceder. merci.</p>
    </div>
    <?php 
        if (isset($_GET['error'])) {
            echo '<p style="color:red;font-size: 10px;">Il y a un erreur verifier votre email ou motdepasse il vous plait</p>';
        }
        if (isset($_POST['valider'])) {
            $anmail=htmlspecialchars($_POST['an_grandAdmin']);
            $anmdp=md5($_POST['an_mdp_G_A']);
            $req=$base->prepare("SELECT * FROM `admincompte`");
            $req->execute();
            $existuser=$req->rowCount();
            $donner = $req->fetch();
            if (isset($anmail) and isset($anmdp)) {
                if ($anmail==$donner['mail'] and $anmdp==$donner['mdp']) {
                    $_SESSION['admin_connecter']=$donner['mail'];
                    header("location:/Gestion_RH/modify_admin.php?ancien=ok");
                }else{
                    header("location:/Gestion_RH/?error=marina");
                }
        
            }else{
                header("location:/Gestion_RH/?error=true");
            }
        }
    ?>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/tables/buttons/buttons.bootstrap4.min.js"></script>
</body>
</html>
