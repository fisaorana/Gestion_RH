 <?php 
try {
	$base=new PDO('mysql:host=localhost;dbname=gestion_av' , 'root' , '150202Fisa&finoanA');

} catch (Exception $e) {
	die('Erreur'.$e->getMessage());
}
 ?>