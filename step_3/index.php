<?php

require('../connexion.php'); 
//if(isset($_GET['table_nm']))
//{
 /*$db_name= $_GET['db'];
$table_nm =$_GET['table_nm'] ;
$requet = "SELECT * FROM ".$db_name.'.'.$table_nm ;

$query = $bdd->prepare($requet);
$query->execute();
$data_tables = $query->fetchAll() ;*/

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
	<br/>	<br/>
<div class="container">
<div class="form-row">
   <div class="form-group col-md-6">
    
  
<a class="btn btn-primary" href="ajouter_une_ligne_table.php?db=<?php echo $_GET['db'] ;?>&table_nm=<?php echo $_GET['table_nm'];?>" role="button">Ajouter une ligne à la table</a>
 
    

  </div>
</div>


</form>

<div class="bd-example">
  <table class="table">
    <thead class="thead-dark">
      <tr>
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
	//print_r(count($columns));
	//var_dump()
if(!empty($columns)){
   foreach ($columns as $column) {
      
     // echo '<th scope="col" >Action</th>' ;
       echo '<th scope="col" >'.$column['Field'] .'</th>' ;
       
    } 
    
      ?>
             </tr>
       </thead>
   			<tbody>
           
          <?php
          $query_all = "SELECT * FROM ".$db_nm.'.'.$table_nm;
          $data_table = $bdd->prepare($query_all);
	      $data_table->execute();
	      $rows = $data_table->fetchAll();
	      //print_r($rows);
	      $requet = "SHOW COLUMNS FROM ".$db_nm.'.'.$table_nm;

	      $query = $bdd->prepare($requet);
	      $query->execute();
	     $columns = $query->fetchAll() ;

	      foreach ($rows as $key => $value) {
           
            echo '<tr>' ; 
	      	   foreach ($columns as $column) {

       				echo '<td>'. $value[$column['Field']] .'</td>'; 
			       
			    } 
	      	  echo '</tr>';

	      
	  }
	      

   		
         

             
         
      }
  }
    ?>
   


    		</tbody>
  </table>
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