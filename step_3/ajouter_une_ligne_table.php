<?php

//db=crud&table_nm=users

require('../connexion.php'); 
$table_nm =$_GET['table_nm'];
    $db_nm =$_GET['db'];


?>


<!DOCTYPE html>
<html>
<head>
	<title> Ajouter une ligne à la table </title>
		<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<br/><br/>
<div class="container">
	<form action="func_ajout_ligne.php?db=<?php echo $db_nm;?>&table_nm=<?php echo $table_nm;?>" method="POST">
 		<?php
    
//$query = $bdd->prepare("");

  $requet = "SHOW COLUMNS FROM ".$db_nm.'.'.$table_nm;
  $query = $bdd->prepare($requet);
  $query->execute();
  $columns = $query->fetchAll() ;
  //print_r(count($columns));
  //var_dump()

   foreach ($columns as $column) {
    
echo '<div class="form-group row">';
echo '<div class="col-sm-10">' ;
echo '<label for="staticEmail" class="col-sm-2 col-form-label"> '.$column['Field'].' : '.'</label>' ;
echo '<input type="text"  class="form-control"  value="" name="columns['.$column["Field"].']">';
echo '</div>';
echo '</div>';
       
    } 
         
    ?>
   
   <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Ajouter</button>
</div>
</div>
</form>
</div>
</body>
</html>