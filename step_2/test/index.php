<!DOCTYPE html>
<html>
<head>
  <title>  Affichage et gestion des bases de données </title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style type="text/css">
      
      body
      {
        margin:0;
        padding:0;
        background-color:#f1f1f1;
      }
      .box
      {
        width:1270px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:25px;
      }
    </style>
</head>
<body>
<div class="container box">
      <h3 align="center" class="display-4">Affichage et gestion des tables de base de données</h3>
      <br />
      <div class="table-responsive">
        <br />
        <div align="right">
          <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Ajouter</button>
        </div>
        <br /><br />
        <table id="user_data" class="table table-bordered table-striped">
          <thead>
           <tr>
              <th width="35%" scope="col">Nom de Table</th>
              <th width="20%" scope="col">Renommer</th>
              <th width="20%" scope="col">Supprimer</th>
              <th width="20%" scope="col">Edit</th>
              <th width="20%" scope="col">Info</th>
            </tr>
          </thead>
          <tbody>
            <?php 

require('../connexion.php'); 
$table = $_GET['db'];
$requet = "SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".$table."'";

$query = $bdd->prepare($requet);
$query->execute();

$data = $query->fetchAll() ;
sort($data);

foreach ($data as $db_table) {

?>
            <tr>
               <td>
               <?php echo $db_table['TABLE_NAME'] ;?>  
               </td>
               <td width="35 %">
                <button type="button" name="update" id="<?php echo $db_table['TABLE_NAME'] ;?>" class="btn btn-success btn-xs update"><span class="glyphicon glyphicon-refresh"></span> Renommer</button>
               </td>
               <td width="25 %">
                <button type="button" name="delete" id="<?php echo $db_table['TABLE_NAME'] ;?>  " class="btn btn-danger btn-xs delete"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
               </td>
               <td>
                <button type="button" name="" id="<?php echo $db_table['TABLE_NAME'] ;?>  " class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</button>
               </td>
               <td > 
                <button type="button" name="update" id="<?php echo $db_table['TABLE_NAME'] ;?>" class="btn btn-info btn-xs" width=" 35 %"><span class="glyphicon glyphicon-list-alt"></span> Info</button>
               </td>

            </tr>
          <?php } ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </body>
</html>

<div id="userModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="user_form" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add User </h4>
        </div>
        <div class="modal-body">
          <label>Enter First Name</label>
          <input type="text" name="name_table" id="name_table" class="form-control" />
          <br />
         
          
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id" id="user_id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  
  $('#add_button').click(function(){
    $('#user_form')[0].reset();
    $('.modal-title').text("Add User youssef");
    $('#action').val("Ajouter");
    $('#operation').val("Ajouter");
  
  });
  
  /*var dataTable = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"aff_table.php",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[0, 3, 4],
        "orderable":false,
      },
    ],

  });
/*console.log('youssef');

    
      $.ajax({
        url:'aff_table.php',
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          console.log(data);
          $('#user_data').append('<tbody>');
            
           for (var i = 0; i < data.length; i++) {
             $('#user_data').append('<tr>');
             console.log(data.length);
            $('#user_data').append('<td>' + tab[i] + '</td>');
               $('#user_data').append('</tr>');                 
            }

             $('#user_data').append('</tbody>');
        }
         /*error:function(){
              alert('error');        
        }
      });*/
   
    

   

  $(document).on('submit', '#user_form', function(event){
    event.preventDefault();
    var firstName = $('#name_table').val();

    if(firstName != '' && lastName != '')
    {
      $.ajax({
        url:"insert.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModal').modal('hide');
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      alert("Both Fields are Required");
    }
  });
  
  $(document).on('click', '.update', function(){
    var user_id = $(this).attr("id");
    $.ajax({
      url:"fetch_single.php",
      method:"POST",
      data:{user_id:user_id},
      dataType:"json",
      success:function(data)
      {
        $('#userModal').modal('show');
        $('#name_table').val(data.name_table);
      
        $('.modal-title').text("Edit User");
        $('#user_id').val(user_id);
        
        $('#action').val("Edit");
        $('#operation').val("Edit");
      }
    })
  });
  
  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");
    if(confirm("Êtes-vous sûr de vouloir supprimer ceci ?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{user_id:user_id},
        success:function(data)
        {
          alert(data);
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });
  
  
});
</script>