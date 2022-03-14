<?php include("database.php"); ?>
		<div class="col-md-9">
			<?php 
			include("database.php");
			$req=$base->prepare("SELECT * FROM `gerant` WHERE id =:myid");
			$ok=$req->execute(array(
			"myid"=>$_GET['id']
			));
			$det=$req->fetch();
			if ($det['nMatr']!="") {
				echo '<img src="pdp/'.$det['nom_pdp'].'" width="98" height="98" style="border-radius:50%;"><br><br>';
			}else{
				echo '<img src="pdp/default.png"  width="98" height="98" style="border-radius:50%;"><br><br>';
			}
			 ?>
			 <label>NOM :</label><?php echo strtoupper($det['nom']); ?><br>
			 <label>PRENOM :</label><?php echo $det['prenom']; ?><br>
			 <label>EMAIL :</label><?php echo $det['email']; ?><br>
			 <label>GRAND TITRE :</label><?php echo $det['G_titre']; ?><br>
			 <label>NATIONALITE :</label><?php echo $det['nationalite']; ?><br>
			 <label>TWITER :</label><?php echo $det['twiter']; ?><br>
			 <label>FACEBOOK :</label><?php echo $det['facebook']; ?><br>
			 <label>YOUTUBE :</label><?php echo $det['youtube']; ?>
		</div>
	</div>
<script src="../js/jquery-3.4.1.min.js"></script>
<script >

</script>
</body>
</html>