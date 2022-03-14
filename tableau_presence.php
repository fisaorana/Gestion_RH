<?php
include("database.php");
$li=$base->prepare("SELECT * FROM `presence`order by id desc");
$li->execute();
$membre_present=$li->rowCount();
while($P_present = $li->fetch()){
 ?>
<tr role="row" class="odd">
  <!-- asiana jointure de alaina ny prenom ao amin gerant -->
  <td>prenom</td>
  <td><?php echo $P_present['matricul_prsnt'] ?></td>
  <td><?php echo $P_present['heur_arrive'] ?></td>
  <td>Present</td>
</tr>
<?php } ?>