<?php


require('../connexion.php');
try {


	//$query = $bdd->prepare('DROP DATABASE '.$_POST['name_db']);
	$db_nm =$_POST['db_nm'];
	$table_nm =$_POST['table_nm'];
	$nom =$_POST['nom'];
	//$type =$_POST['type'];
	//print_r('USE DATABASE '.$db_nm);

   $bdd->exec("ALTER TABLE ".$db_nm.'.'.$table_nm. " RENAME TO " .$db_nm.'.'.$nom);
   //print_r("ALTER TABLE ".$db_nm.'.'.$table_nm. " RENAME TO " .$db_nm.'.'.$nom);
    header('Location:index.php?db='.$db_nm);
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
