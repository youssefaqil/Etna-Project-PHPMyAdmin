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
	<form action="ajout_element.php" method="POST">
 <input type="hidden"  class="form-control-plaintext"  value="<?php echo $_GET['table_nm'];?>" 
 name="table_nm" hidden>
 <input type="hidden"  class="form-control-plaintext"  value="<?php echo $_GET['db_nm'];?>" 
 name="db_nm" hidden>
		
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Nom : </label>
    <div class="col-sm-10">
      <input type="text"  class="form-control"  value="" name="nom">
    </div>
  </div>
  <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Type : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="" name="type">
    </div>
  </div>
   <div class="form-group row">
    <label for="" class="col-sm-2 col-form-label">Taille : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  placeholder="" name="taille">
    </div>
  </div>
   <div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Ajouter</button>
</div>
</div>
</form>
</div>
</body>
</html>