<?php


require('../connexion.php');
try {


	
	$table_nm =$_POST['table_nm'];
	$db_nm =$_POST['db_nm'];
	$nom =$_POST['nom'];
	$type =$_POST['type'];
	$taille =$_POST['taille'];
	

   $bdd->exec("ALTER TABLE ".$db_nm.'.'.$table_nm." ADD ". $nom . ' ' .$type. ' '.$taille);
   // print_r("ALTER TABLE ".$db_nm.'.'.$table_nm." ADD ". $nom . ' ' . $type);
    header('Location:index.php?db='.$db_nm);
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
