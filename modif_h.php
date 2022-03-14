<?php
if ($_GET['id_Modif']==$donner['id']) {
?>
<div class="mod_H" id="cach1">
      <span class="align_Fre">
        <form  method="post">
            <input type="time" name="heure_trav_modif" id="heure_trav_modif">
            <input type="submit" value="OK" id="ok_modify" class="btn btn-sm btn-outline-success" name="OK">
            <a href="/Gestion_RH/dashboard.php" class="btn btn-sm btn-outline-danger">X</a>
        </form> 
        
      </span>
</div>
<?php
}?>
<?php
if (!empty($_POST['OK'])) {
    if(isset($_POST['heure_trav_modif'])){
        if ($_POST['heure_trav_modif']!="") {
            $req=$base->prepare("UPDATE `gerant` SET `heure_de_trav` = :h_modf WHERE `gerant`.`id` = :idd;");
            $req->execute(array(
                "h_modf"=>$_POST['heure_trav_modif'],
                "idd"=>$_GET['id_Modif']
            ));
            if ($_GET['id_Modif']==$donner['id']){
                echo"<p style='color:green'>Success...</p>";
                }
        }   else {
            if ($_GET['id_Modif']==$donner['id']){
            echo"<p style='color:red'>Veillez remplire</p>";
            }
        }
    }
}
?>