<?php
    require "session.php";
include("database.php");
$lister=$base->prepare("SELECT * FROM `gerant` order by id desc");
$lister->execute();
$membre=$lister->rowCount();
while($donner = $lister->fetch()){
 ?>
<tr role="row" class="odd">
  <td><?php echo $donner['id'] ?></td>
  <td><?php echo $donner['prenom'] ?></td>
  <td><?php echo $donner['nMatr'] ?></td>
  <td><?php if($donner['phone']!=""){echo $donner['phone'];}else{echo "vide";}?></td>
  <td><?php if($donner['qualification']!=""){echo $donner['qualification'];}else{echo "vide";}?></td>
  <td>
    <div class="progress progress-xs" title="<?php if($donner['niv']!=""){echo $donner['niv'];}else{echo "vide";} ?>/10">
      <div class="progress-bar" id="nivau" role="progressbar" aria-valuemin="1" value="<?php echo $donner['niv'] ?> " aria-valuemax="10" style="width: <?php if($donner['niv']!=""){echo $donner['niv']*10;}else{echo "0";}?>%;"></div>                                                
    </div>
  </td>
  <td id="hr_tr"><?php echo $donner['heure_de_trav'] ?>
  <?php if (empty($_GET['id_Modif']) and empty($_GET['page_modif'])){ ?>
    <span class="mdif" id="btn_modify"><a href="?id_Modif=<?php echo $donner['id']?>&page_modif=show" class="btn btn-sm btn-success">Modifier</a></span></td>
  <?php }else{ include("modif_h.php"); }?>
  <td class="project-actions">
    <a href="/Gestion_RH/dashboard.php?id_aff=<?php echo $donner['id']?>&conf_aff=show" class="btn btn-sm btn-outline-primary js-sweetalert" title="Views"><i class="icon-eye"></i></a>
    <a href="/Gestion_RH/dashboard.php?id_updt=<?php echo $donner['id']?>" class="btn btn-sm btn-outline-success js-sweetalert" title="Update"><i class="icon-pencil"></i></a>
    <a href="/Gestion_RH/dashboard.php?id_sup_emp=<?php echo $donner['id']?>&conf_supp=show&Pnom_sup=<?php echo $donner['nom'] ?> <?php echo $donner['prenom'] ?>" id="suppr" class="btn btn-sm btn-outline-danger" title="Delete" data-type="confirm"><i class="icon-trash"></i></a>
  </td>
  <td class="width45 sorting_1">
      <input class="checkbox-tick" id="chbx" onchange=suppall() type="checkbox" name="checkbox[]" value="<?php echo $donner['id'] ?>">
  </td>
</tr>
<?php } ?>
