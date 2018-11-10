<?php


require('../connexion.php');
try {


	//$query = $bdd->prepare('DROP DATABASE '.$_POST['name_db']);
	$name_db = $_POST['name_db'];
    $bdd->exec('CREATE DATABASE '.$name_db);
    header('Location:../index.php');
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
