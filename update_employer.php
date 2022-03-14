<?php 
include("database.php");
$lister=$base->prepare("SELECT * FROM `gerant` WHERE id=:mid");
$lister->execute(array("mid"=>$_GET['id_updt']));
while($donner = $lister->fetch()){
    if ($_GET['id_updt']==$donner['id']) {
 ?>
<form action="update.php?id_updt2=<?php echo $donner['id'] ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" value="<?php echo $donner['nom'] ?>" name="nom_employer" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="surname" value="<?php echo $donner['prenom'] ?>" name="prenom_employer" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="matricule" value="<?php echo $donner['nMatr'] ?>" name="matr_employer" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="adress" value="<?php echo $donner['adress'] ?>" name="adress_employer" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="phone" value="<?php echo $donner['phone'] ?>" name="phone_employer" >
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="qual" value="<?php echo $donner['qualification'] ?>" name="qual_employer" >
                </div>
                <div>
                  <input type="number" class="form-control" id="matricule" value="<?php echo $donner['niv'] ?>" name="niv_employer" >
                </div><br>
                <div class="form-group">
                  <input type="time" class="form-control" id="heur" name="heur_employer" required value="<?php echo $donner['heure_de_trav'] ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Valider</button>
              </div>
</form>
<?php }} ?>