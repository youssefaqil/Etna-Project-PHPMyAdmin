<!DOCTYPE html>
<html>
<head>
	<title> Test PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<form action="step_1/ajout_db.php" method="POST">
<div class="form-row">
   <div class="form-group col-md-6">
    <label for="pseudo"> Nom Base de donné : </label>
    <input type="text" class="form-control" name="name_db" aria-describedby="name_db" placeholder="entrer le nom de votre base de donné">
  </div>
</div>



 <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Ajouter</button>
</div>
</div>
</form>

<div class="bd-example">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome base donné</th>
       
        <th scope="col" colspan="4" style="text-align: center;">Action</th>

      </tr>
    </thead>
   <tbody>
   <?php 

require('connexion.php'); 


$query = $bdd->prepare('SHOW DATABASES');
$query->execute();

$data = $query->fetchAll() ;
sort($data);

foreach ($data as $db) {

?>
    <tr>
  <td><?php echo $db['Database'];  ?></td>
   <td>
    <a href="step_1/edit_db.php?db=<?php echo $db['Database'] ?>"> 
    <span class="glyphicon glyphicon-pencil"></span> Modifier
  </a> 
</td>
  <td>
    <a href="step_1/delete_db.php?db=<?php echo $db['Database'] ?>" class="delete">
   <span class="glyphicon glyphicon-trash"> Supprimer 
   </a> 
 </td>
  <td><a href="step_1/detail.php?db=<?php echo $db['Database'] ?>"> 
    <span class="glyphicon glyphicon-info-sign"> Info
    </a> 
  </td>
  <td><a href="step_2/index.php?db=<?php echo $db['Database'] ?>"> 
    <span class=" glyphicon glyphicon-list-alt"> Detail
    </a> 
  </td>
      
    </tr>
    <?php 
	}
	?>
  </tbody>
  </table>
</div>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Vous êtes sur que vous vouliez Supprimer cette base de donnée?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
</div>
</body>
</html>