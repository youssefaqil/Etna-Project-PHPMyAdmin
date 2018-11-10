<?php


function get_total_all_records()
{
	require('../connexion.php');
    $tables = $_GET['db'];
$row_table = $bdd->prepare("SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".$tables."'");

	$row_table->execute();
	$result = $row_table->fetchAll();
	
	return $row_table->rowCount();
}


?>