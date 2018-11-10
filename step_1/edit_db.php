<?php


require('../connexion.php');
try {

	
	$query = $bdd->prepare('DROP DATABASE '.$_GET['db']);
  $query->execute();
    
	
} catch (Exception $e) {

	echo $e->getMessage();
}



?>
<!DOCTYPE html>
<html>
<head>
	<title> Test PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<form action="ajout_db.php" method="POST">
<div class="form-row">
   <div class="form-group col-md-6">
    <label for="pseudo"> Editer Base de donné <?php echo $_GET['db']; ?> : </label>
    <input type="text" class="form-control" name="name_db" aria-describedby="name_db" placeholder="entrer le nom de votre base de donné" value="<?php echo $_GET['db']; ?>">
  </div>
</div>


 <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Editer</button>
</div>
</div>
  </tbody>
  </table>
</div>


</body>
</html>