<form action="passage.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="name" placeholder="Nom" name="nom_employer" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="surname" placeholder="Prenom" name="prenom_employer" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="matricule" placeholder="Numero matricule" name="matr_employer" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="adress" placeholder="Adress" name="adress_employer">
                </div>
                <div class="form-group">
                  <input type="texte" class="form-control" id="phone" value="+(261)" placeholder="Numero Telephone" name="phone_employer" onkeyup=num()>
                  <!-- <p class="min" style='color:red;'>Le numero de telephone doit contenire 10 caractere</p> -->
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="qual" placeholder="Qualification" name="qual_employer">
                </div>
                <div>
                  <input type="number" onkeyup=numNiv() class="form-control" id="niv" placeholder="Niveau(echelle de 10)" name="niv_employer">
                  <p class="minNiv" style='color:red;'>Le niveau doit etre inferieur a 10</p>
                </div><br>
                <div class="form-group">
                  <input type="time" class="form-control" id="heur" name="heur_employer" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <?php if (isset($_GET['membre'])) {
            ?>
            <div class="alert alert-danger alert-dismissible">Déja inscrit...</div>
          <?php } ?>
          <?php if (isset($_GET['update'])) {
            ?>
            <div class="alert alert-success alert-dismissible">Modification sucess...</div>
          <?php } ?>
          <?php if (isset($_GET['error'])) {
            ?>
            <div class="alert alert-success alert-danger">Error...</div>
          <?php } ?>
</form>