<?php
require('../connexion.php');
try {


	
	$table_nm =$_POST['query'];
	print_r($table_nm);
     $query = $bdd->prepare($table_nm);
    $query->execute();
   

    header('Location:Free_request.php');
	
} catch (Exception $e) {

	echo $e->getMessage();
}

?>