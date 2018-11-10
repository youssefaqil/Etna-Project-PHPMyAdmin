<?php
require('../connexion.php');

include('function.php');
$query = '';
$output = array();
//$table = $_GET['db'];
$table = "crud";
$query = "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = 'crud' ";
//$query .= "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".$table ."'";
/*if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE TABLE_NAME LIKE "%'.$_POST["search"]["value"].'%" ';
	//$query .= 'OR TABLE_NAME LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}

/*if(isset($_POST["length"]) != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$statement = $bdd->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();
	
	$sub_array[] = $row["TABLE_NAME"];
	
		/*$sub_array[] = '<button type="button" name="update" id="'.$row["TABLE_NAME"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["TABLE_NAME"].'" class="btn btn-danger btn-xs delete">Delete</button>';*/
	$data[] = $sub_array;

}
$output = array(
	//"draw"				=>	intval($_POST["draw"]),
	//"recordsTotal"		=> 	$filtered_rows,
	//"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);

echo json_encode($output);
?>