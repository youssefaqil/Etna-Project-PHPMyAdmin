<!DOCTYPE html>
<html>
<head>
  <title> Test PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <h3 class="display-4">Affichage des statistiques de la table (nombre de lignes)</h3>
 <br/><br/>
<ul class="list-group">
   <?php 

require('../connexion.php');

 $db_nm =$_GET['db'];
  $table_nm = $_GET['table_nm'];

$query = $bdd->prepare("SELECT COUNT(*) as 'nbr_rows'  FROM ".$db_nm.'.'.$table_nm);
$query->execute();

$data = $query->fetchall() ;


foreach ($data as $rows) {

?>
  <li class="list-group-item list-group-item-primary"><b>Lombre de lignes </b>:<strong><?php echo $rows['nbr_rows'] ?></strong> </li>

<?php
}
?>
</ul>

</body>
</html>
