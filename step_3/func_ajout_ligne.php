<?php


require('../connexion.php');
try {


	
	 $table_nm =$_GET['table_nm'];
    $db_nm =$_GET['db'];
//$query = $bdd->prepare("");

  /*$requet = "SHOW COLUMNS FROM ".$db_nm.'.'.$table_nm;
  $query = $bdd->prepare($requet);
  $query->execute();
  $columns = $query->fetchAll() ;*/
  //print_r(count($columns));
  //var_dump()


$values = "";
$ligne_rows = "";
   foreach ($_POST['columns'] as $column) {

          $values= $values.','."'".$column."'";
          
    } 
   
    $ligne_rows = substr($values,1-strlen($values)); 
$result = "INSERT INTO ".$db_nm.'.'.$table_nm. " VALUES (".$ligne_rows.")";
print_r($result);
  $query = $bdd->prepare($result);
  $query->execute();

  header('Location:index.php?db='.$db_nm.'&table_nm='.$table_nm);

} catch (Exception $e) {

	echo $e->getMessage();
}



?>
