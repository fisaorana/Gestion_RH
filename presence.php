<?php
    require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>:: All Vision Presence ::</title>
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
<style>
input.form-control {
  width: 127px!important;
}
.ok1{
  background-color: #25e60e!important;
}
.border-top-green {
    border-top-color: green;
}
.border-top-fushia{
    border-top-color: #cf0d70;;
}
</style>
<body>
<header class="fixed main-header">
  <div class="bot_deconn" style="float: right; text-align: center; margin: 25px;">
  <a href="/Gestion_RH/dashboard.php" class="icon-menu" title="Actualiser">Dashboard </a>
    <a href="/Gestion_RH/dashboard.php" class="icon-menu" title="Actualiser"><i class="icon-tag" style="margin-right:10px;"></i></a>
    <a href="/Gestion_RH/destroy.php" class="icon-menu" title="Deconnecter"><i class="icon-login"></i></a>
  </div>
</header>
<section class="content container-fluid">
<div class="row">
<!-- primo colonn -->
<div class="col-md-4 col-sm-12 contenaire-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Presence le <?php 
        $DateActu = date('d.m.Y');
        echo $DateActu;
        ?></h3>
    </div>
    <div class="col-sm-12 contenaire-fluid"> 
      <!-- identification    -->
        <div class="box-body table-responsive"  style="max-height: 427px">
          <h3>Veuillez vous identifier</h3>
            <form action="verif_matr.php" method="post">
              <input type="text" name="matricul_arriv" placeholder="NUMERO MATRICULE" id=""><br>
              <input type="submit" value="Present">
            </form>
        </div>
    </div>
  </div>
</div>
<!-- second colonn -->
<div class="col-md-8 col-sm-12 contenaire-fluid">
  <div class="box border-top-fushia">
    <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
        <thead class="thead-dark">
          <p>LISTE DES PRESENTS LE <?php 
        $DateActu = date('d.m.Y');
        echo $DateActu;
        ?></p>
          <tr role="row">
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 160.797px;">Prenom</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 110.719px;">Matricule</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 107.375px;">Heure</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 86.75px;">Etat</th>
            </tr>
        </thead>
        <tbody>
          <?php include ('tableau_presence.php');?> 
        </tbody>
      </table>
  </div>
  <!-- /////// -->
  <div class="box border-top-green">
    <table class="table table-hover js-basic-example dataTable table-custom table-striped m-b-0 c_list no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
        <thead class="thead-dark">
          <p>LISTE DES ABSENTS LE <?php 
        $DateActu = date('d.m.Y');
        echo $DateActu;
        ?></p>
          <tr role="row">
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 160.797px;">Prenom</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 110.719px;">Matricule</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 107.375px;">Heure</th>
                    <th style="width: 40px" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 86.75px;">Etat</th>
            </tr>
        </thead>
        <tbody>
          <?php include ('tableau_absence.php');?> 
        </tbody>
      </table>
  </div>
  <!-- ////// -->
      <div class="float-right">
          <a href="export_presence.php">telecharger la liste du presence</a><br>
          <a href="reinitial_presence.php">Reinitialiser</a>
      </div>
</div>  
</section>
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
//presence
// function present(){
// var pres = [];
// $('input[name="checkbox_sele[]"]').each(function(){
//   if($(this).prop('checked')){
//             pres.push($(this).val());
//         }
// }); 
//        $.ajax({
//         url:'liste_emp_pre.php',
//         type:'GET',
//         data:'pres=' + encodeURIComponent(pres),
//         success:function(data){
//           if (data!="") {
//             var Countpres=pres.length;
//             $('#btn_pres').attr('href','liste_emp_pre.php?id_pres='+pres);
//             $('#cont').attr('value',Countpres);
//           } else {    
//           }
//         },
//         error:function(data){
//           alert("error");
//         },
//       });
// }
// var etat=$('#line').attr('value');
// var cn=$('#cont').attr('value');
// var e=0;
// while(e<cn){
//   if(etat=1){
//     $('#line').hide();
// }
// e=e+1;
// }
</script>
</body>
</html>
