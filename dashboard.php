<?php 
session_start();
if(empty($_SESSION['admin_connecter'])){
  header('location:/Gestion_RH/');
  return;
  }
include("database.php");
$lister=$base->prepare("SELECT * FROM `gerant`");
$donner = $lister->fetch()
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: ALL VISION ::</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adm.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="stylesheet" href="css/color_skins.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sweetalert.css"/>
    <link rel="stylesheet" href="css/tables/dtable-dragger.min.css">
    <link rel="stylesheet" href="css/tables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/tables/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet" href="css/tables/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<header class="fixed main-header">
  <div class="bot_deconn" style="float: right; text-align: center; margin: 25px;">
  <a href="/Gestion_RH/presence.php" class="icon-menu" title="Actualiser">Presence </a>
    <a href="/Gestion_RH/dashboard.php" class="icon-menu" title="Actualiser"><i class="icon-tag" style="margin-right:10px;"></i></a>
    <a href="/Gestion_RH/destroy.php" class="icon-menu" title="Deconnecter"><i class="icon-login"></i></a>
  </div>
</header>
    <section class="content container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3 col-sm-12 contenaire-fluid">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter un nouveau employer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
            if (empty($_GET['id_updt'])) {
              include("ajout_employer.php");
            } else {
              include("update_employer.php");
            }
            ?>
          </div>  
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-9 col-sm-12 contenaire-fluid">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des employers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive"  style="max-height: 427px">
            <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="thead-dark">
                  <tr role="row">
                    <th style="width: 10px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 61.8594px;">#</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 160.797px;">Prenom</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 110.719px;">Matricule</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 107.375px;">Phone</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 86.75px;">Qualification</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 127.609px;">Niveau</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 127.609px;">Heure du travail</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 61.8594px;">Action</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
: activate to sort column descending" style="width: 59.8906px;">
                          <input class="select-all" type="checkbox" onchange=suppall() name="checkbox_sele" value="Tous" type="checkbox" name="checkbox">
                      </label>
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php include("liste_employer.php") ?> 
                </tbody>
              </table>
                <!-- card affichage -->
                <?php if (!empty($_GET['id_aff']) and !empty($_GET['conf_aff'])){ 
                  include("database.php");
                  $lister=$base->prepare("SELECT * FROM `gerant` order by id desc");
                  $lister->execute();
                  while($donner = $lister->fetch()){
                    if ($_GET['id_aff']==$donner['id']) {
                   ?>
                  <div class="sweet-overlay" tabindex="-1" style="opacity: 1.01; display: block;"></div>
                  <div class="sweet-alert showSweetAlert visible" data-animation="pop" data-timer="null" style="display: block; margin-top: -165px;">
                      <div class="card card-body" style="width: 18rem;">
                        <div class="aff-card" style="text-align:initial">
                          <label for="nom" class="labs">NOM : </label><?php echo " ".strtoupper($donner['nom']) ?><br>
                          <label for="prenom" class="labs">PRENOM :</label><?php echo " ".$donner['prenom'] ?><br>
                          <label for="nMatr" class="labs">N MATRICULE :</label><?php echo " ".$donner['nMatr'] ?><br>
                          <label for="addre" class="labs">ADRESS :</label><?php echo " ".$donner['adress'] ?><br>
                          <label for="qual" class="labs">QUALIFICATION :</label><?php echo " ".$donner['qualification'] ?><br>
                          <label for="niveau" class="labs">NIVEAU :</label><?php echo " ".$donner['niv'] ?><br>
                          <label for="hrr_tr" class="labs">HEURE DU TRAVAIL :</label><?php echo " ".$donner['heure_de_trav'] ?><br>
                          <label for="date_ajout" class="labs">DATE D'AJOUT :</label><?php echo " ".$donner['date_ajout'] ?><br><br>
                          <a href="/Gestion_RH/dashboard.php" class="btn btn-secondary">Retour</a>
                        </div>
                      </div>
                  </div>
                <?php }}} ?>
                <!-- card affichage -->
                <!-- card confirm  delete --> 
                <?php if (!empty($_GET['id_sup_emp']) and !empty($_GET['conf_supp'])){ ?>
                  <div class="sweet-overlay" tabindex="-1" style="opacity: 1.01; display: block;"></div>
                  <div class="sweet-alert showSweetAlert visible" data-animation="pop" data-timer="null" style="display: block; margin-top: -165px;">
                      <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h6 class="card-title" style="color:red;">Vous etes sure de suppimer
                            <?php if(!empty($_GET['Pnom_sup'])){?>
                             <a href="/Gestion_RH/dashboard.php?id_aff=<?php echo $_GET['id_sup_emp']?>&conf_aff=show"><?php echo $_GET['Pnom_sup'] ?></a>
                            <?php }else{
                              $nbrpersonn=$_GET['nbrsupp'];
                              echo "ces ".$nbrpersonn." personnes";
                            } ?>
                             !?</h6>
                          <a href="/Gestion_RH/dashboard.php" class="btn btn-secondary">Retour</a>
                          <a href="/Gestion_RH/delete.php?id_del=<?php echo $_GET['id_sup_emp']?>&nbrsup=<?php
                            if (isset($_GET['nbrsupp'])) {
                              echo $nbrpersonn;
                            } else {
                              echo "0";
                            }
                            
                          ?>" class="btn btn-danger">Yes, supprimer!</a>
                        </div>
                      </div>
                  </div>
                <?php } ?>

                <!-- confirm delet all -->
                <!-- card confirm delete -->
            </div>
            <!-- /.box-body -->
            <a class="btn btn-danger btn-sm" id="btn_del_all" tabindex="-1" role="button" style="float: right;margin-right: 10px;margin-top: 14px;" title="Delete">SUPPIMER</a>
            <!-- chexbox suppr all -->
 
            <div style="margin-left: 10px">Il y a <?php echo $membre; ?> membres.</div>
            <div class="tel" style="margin-left: 10px;"><a href="export.php" style="color:green ">Télécharger en format xls</a>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquer.js"></script>
<script src="js/tables/jquery-datatable.js"></script>
<script src="js/tables/buttons/buttons.bootstrap4.min.js"></script>
<script src="js/tables/buttons/buttons.colVis.min.js"></script>
<script src="js/tables/buttons/dataTables.buttons.min.js"></script>
<script src="js/tables/buttons/buttons.print.min.js"></script>
<script src="js/tables/buttons/buttons.html5.min.js"></script>
<script src="js/tables/buttons/table-dragger.min.js"></script>
<script src="js/tables/mindmup-editabletable.js"></script>
<script src="js/tables/libscripts.bundle.js"></script>    
<script src="js/tables/vendorscripts.bundle.js"></script>
<script src="js/tables/datatablescripts.bundle.js"></script>
<script src="js/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
<script src="js/tables/mainscripts.bundle.js"></script>
<script src="js/dialogs.js"></script>
<script>
// $('.min').hide()
//   function num() {
// 	var number_num=$('#phone').val().length
// 	if (number_num!=10) {
// 		$('.min').slideDown()
// 		$('#phone').css({'border' : '1px solid red', 'color' :
// 'red'})}
// else{
// 		 $('.min').hide()
// 		 $('#phone').css({'border':'1px solid green', 'color':'green'})
// 	}
// }
$('.minNiv').hide()
  function numNiv() {
	var number_numNiv=$('#niv').val().length
	if (number_numNiv>1) {
		$('.minNiv').slideDown()
		$('#niv').css({'border' : '1px solid red', 'color' :
'red'})}
else{
		 $('.minNiv').hide()
		 $('#niv').css({'border':'1px solid green', 'color':'green'})
	}
}
//miaficher employer
function affich() {
  $('#font_noir').attr('style','opacity: 1.02; display: block;')
}
//supprimer employers
$('#suppr').click(function(){
  var nid=$('#suppr').attr('value');
  $('button.confirm').attr('href','/Gestion_RH/dashboard.php?id_updt='+nid);
});
// ajax checkbox supp all
function suppall() {
    // Initialisation du tableau des filenames
    var valsall = [];
    // Parcours de toutes tes checkboxes
    $('input[name="checkbox[]"]').each(function(){
        // Si la checkbox courante (a la boucle) est check
        if($(this).prop('checked')){
            // Ajouter la valeur au tableau
            valsall.push($(this).val());
        }
    });
       $.ajax({
        url:'dashboard.php',
        type:'GET',
        data:'valsall=' + encodeURIComponent(valsall),
        success:function(data){
          if (data!="") {
            var Countvalsall=valsall.length;
            $('#btn_del_all').attr('href','dashboard.php?id_sup_emp='+valsall+'&conf_supp=show&nbrsupp='+Countvalsall)
          } else {
            
          }
        },
        error:function(data){
          alert("error");
        },
      });
}
</script>
</body>
</html>