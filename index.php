<?php
    session_start();
    include('database.php');
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
        button#btn_bt {
            outline: none;
            border: 0px;
            background: #4be04b;
            color: white;
            padding: 10px;
            border-radius: 30px;
            margin-top: 11px;
        }
        button#btn_bt :hover {
            background: #83c12e;
            outline: none;
            border: 0px;
            color: #00a5a2;
            padding: 10px;
            border-radius: 30px;
            margin-top: 11px;
        }
        body {
            background-repeat:no-repeat;
            -webkit-perspective: 800px;
            perspective: 800px;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            font-family: "Gudea", sans-serif;
            background:linear-gradient(180deg, rgb(234 144 117 / 39%) 30%, rgb(243 230 241 / 69%) 70%);
        }
    </style>
<div class="formulaire" style="background-color:#e9f3f247;!important; box-shadow: 0px 0px 21px -9px;border-radius: 12px 12px 12px 12px;">
    <div class="tete_form" style="height: 31px;width: 100%;background: #2bd2ec;margin: 0px;position: absolute;top: 0%;left: 0%;border-radius: 12px 12px 0px 0px;"></div>
    <div class="N_Pn_admin">
        <h2 style="color:black;">
            ALL <br>VISION
        </h2>
    </div>
        <div class="champ">
        <form method="post">
                    <input class="fom" type="email" placeholder="E-mail" name="grandAdmin"><br>
                    <input class="fom" type="password" placeholder="Mot de passe" name="mdp_G_A"><br>
                    <input type="submit" value="LOGIN" name="login" class="fom">
        </form>
        </div>    
        <button class="btn btn-successs" id="btn_bt"><a href="/Gestion_RH/modify_admin.php" style="color:white;" >MODIFIER</a></button>
    <div class="lettre">
        <p style="color:black;">Cette espace est reservé au administrateur , 
            verifie bien votre e-mail et mot de passe pour y acceder. merci.</p>
    </div>
    <?php 
        if (isset($_GET['error'])) {
            echo '<p style="color:red;font-size: 13px;font-family: sans-serif;">Il y a un erreur verifier votre email ou motdepasse il vous plait</p>';
        }
        if (isset($_GET['modif'])) {
            echo '<p style="color:#b6d0b6;font-size: 13px;font-family: sans-serif;">Vous aviez modifiez votre mot de passe</p>';
        }
    ?>
</div>
<script src="js/jquery.min.js"></script>
</body>
<?php 
if (isset($_POST['login'])) {
    $mmail=htmlspecialchars($_POST['grandAdmin']);
    $mdp=md5($_POST['mdp_G_A']);
    $req=$base->prepare("SELECT * FROM `admincompte`");
	$req->execute();
    $existuser=$req->rowCount();
    $donner = $req->fetch();
    if (isset($mmail) and isset($mdp)) {
        if ($mmail==$donner['mail'] and $mdp==$donner['mdp']) {
            $_SESSION['admin_connecter']=$donner['mail'];
            header("location:/Gestion_RH/dashboard.php");
        }else{
            header("location:/Gestion_RH/?error=marina");
        }

    }else{
        header("location:/Gestion_RH/?error=true");
    }
}
?>
</html>