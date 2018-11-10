<?php
require('../connexion.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title> Free request</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<form action="func_sql.php" method="POST">
  

  <div class="form-group">
    <label for="exampleFormControlTextarea1"> Exécuter une ou des requêtes SQL</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="query"></textarea>
  </div>

    <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Executer</button>
</div>
</div>
</form>
</div>
</body>
</html>