<?php

require('../connexion.php'); 
$db_name = $_GET['db'];
$requet = "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".$db_name."'";

$query = $bdd->prepare($requet);
$query->execute();
$data = $query->fetchAll() ;
sort($data);

?>
<!DOCTYPE html>
<html>
<head>
	<title> Test PHP</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

<div class="form-row">
   <div class="form-group col-md-6">
    <label for="pseudo"> Nom de table : </label>
 
    <div class="dropdown">
  <button type="submit" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Ajouter un élement
  </button>
  <div class="dropdown-menu">
   <?php
   foreach ($data as $db_table) {
    ?>
    <a class="dropdown-item" 
    href="aff_ajout_element.php?table_nm=<?php echo $db_table['TABLE_NAME'];?>&db_nm=<?php echo $_GET['db'] ;?>"><?php echo $db_table['TABLE_NAME'] ;?></a>
<?php  
  }
?>
  </div>
</div>
  </div>
</div>



 <!--<div class="form-row">
  <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary btn-xs">Ajouter un élement</button>
</div>
</div>-->
</form>

<div class="bd-example">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome base donné</th>
       
        <th scope="col" colspan="5" style="text-align: center;">Action</th>

      </tr>
    </thead>
  <tbody>
<?php 



foreach ($data as $db_table) {

?>
            <tr>
               <td>
               <?php echo $db_table['TABLE_NAME'] ;?>  
               </td>
               <td><a  href="table_rename.php?table_nm=<?php echo $db_table['TABLE_NAME'];?>&db_nm=<?php echo $_GET['db'] ;?>">
                <button type="button" class="btn btn-success btn-xs">
                  <span class="glyphicon glyphicon-refresh"></span> Renommer</button>
                </a>
               </td>
               <td>
                <a  href="index.php?db=<?php echo $_GET['db'] ;?>&table_nm=<?php echo $db_table['TABLE_NAME'];?>">
                <button type="button" class="btn btn-xs" id="show" onclick="myFunction()"><span class="glyphicon glyphicon-th-list"></span> Show élement</button>
              </a>
               </td>
               <td>
                <a  href="aff_ajout_element.php?table_nm=<?php echo $db_table['TABLE_NAME'];?>&db_nm=<?php echo $_GET['db'] ;?>">
                <button type="button"  name="<?php echo $db_table['TABLE_NAME'] ;?>  " class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</button>
              </a>
               </td>
               <td > 
                <a  href="info_table.php?db=<?php echo $_GET['db'] ;?>&table_nm=<?php echo $db_table['TABLE_NAME'];?>">
                <button type="button"  class="btn btn-info btn-xs"><span class="glyphicon ion ion-md-list-box"></span> Info</button>
              </a>
               </td>

                  <td > 
                <a  href="../step_3/index.php?db=<?php echo $_GET['db'] ;?>&table_nm=<?php echo $db_table['TABLE_NAME'];?>">
                <button type="button"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-list-alt"></span> afficher </button>
              </a>
               </td>

            </tr>
          <?php } ?>
          </tbody>
  </table>
</div>


  <div class="dropdown" id="hide">
  <button type="submit" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
    Supprimer un élement
  </button>
  <div class="dropdown-menu">
   <?php

if(isset($_GET['table_nm']))
{
$table_nm =$_GET['table_nm'];
  $db_nm =$_GET['db'];
//$query = $bdd->prepare("");

$requet = "SHOW COLUMNS FROM ".$db_nm.'.'.$table_nm;

$query = $bdd->prepare($requet);
$query->execute();
$columns = $query->fetchAll() ;
if(!empty($columns)){
   foreach ($columns as $column) {
    ?>
    <a id="delete" class="dropdown-item" 
    href="func_delete.php?db=<?php echo $_GET['db'] ;?>&table_nm=<?php echo $_GET['table_nm'] ;?>&column=<?php echo $column['Field'];?>" ><?php echo $column['Field'];?></a>
<?php  
  }
}
}
?>
  </div>
</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--<script type="text/javascript">
function myFunction() {
    $("div#show").show(1000);
}


</script>-->
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){

    
    $("a#delete").click(function(e){
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