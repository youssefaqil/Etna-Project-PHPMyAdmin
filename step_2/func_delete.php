<?php


require('../connexion.php');
try {
   
   $db_nm =$_GET['db'];
	$table_nm = $_GET['table_nm'];
	$column =$_GET['column'];

    //echo $table_nm;
	$query = $bdd->prepare("ALTER TABLE ".$db_nm.'.'.$table_nm. " DROP " .$column );
	//print_r("ALTER TABLE ".$db_nm.'.'.$table_nm. " DROP " .$column );
    $query->execute();
    header('Location:index.php?db='.$db_nm);
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
