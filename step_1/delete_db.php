<?php


require('../connexion.php');
try {


	$query = $bdd->prepare('DROP DATABASE '.$_GET['db']);
    $query->execute();
    header('Location:../index.php');
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
