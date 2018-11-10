<?php

require('../connexion.php');

$table_nm =$_GET['table_nm'];
  $db_nm =$_GET['db_nm'];
//$query = $bdd->prepare("");

$requet = "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".$db_nm."'";
$query = $bdd->query($requet);




?>
<!DOCTYPE html>
<html>
<head>
	<title> Ajoute element</title>
		<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<br/><br/>
<div class="container">
	<form action="func_rename.php" method="POST">
 <input type="hidden"  class="form-control-plaintext"  value="<?php echo $_GET['table_nm'];?>" 
 name="table_nm" hidden>
 <input type="hidden"  class="form-control-plaintext"  value="<?php echo $_GET['db_nm'];?>" 
 name="db_nm" hidden>
		
  <div class="form-group row">
    <label for="nom de tabme" class="col-sm-2 col-form-label"> Nom de table </label>
    <div class="col-sm-10">
      <?php
      while ($data_table = $query->fetch()) {
      if($data_table['TABLE_NAME'] == $table_nm)
      {
        ?>
      <input type="text"  class="form-control"  value="<?php echo $table_nm ;?>" name="nom">
     <?php
      } 
 }
      ?>
    </div>
  </div>
   <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Renommer</button>
</div>
</div>
</form>
</div>
</body>
</html