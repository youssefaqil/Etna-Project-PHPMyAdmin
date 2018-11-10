<!DOCTYPE html>
<html>
<head>
	<title> Test PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <h3 class="display-4">Affichage des statistiques de la base de données</h3>
 <br/><br/>
<ul class="list-group">
   <?php 

require('../connexion.php');

$database = $_GET['db'];

$query = $bdd->prepare("SELECT COUNT(table_schema) as 'table_nbr' , create_time, index_length FROM information_schema.tables WHERE TABLE_SCHEMA = '".$database."' Group by TABLE_SCHEMA Order by create_time desc");
$query->execute();

$data = $query->fetchall() ;


foreach ($data as $db) {

?>
  <li class="list-group-item list-group-item-primary"><b>Nombre de tables </b>:<strong><?php echo $db['table_nbr'] ?></strong> </li>
  <li class="list-group-item list-group-item-secondary"><b>date de création</b> : <strong><?php echo $db['create_time'] ?></strong></li>
  <li class="list-group-item list-group-item-success"><b>Espace mémoire</b> :<strong> <?php echo $db['index_length'] ?> </strong></li>

<?php
}
?>
</ul>

</body>
</html>
