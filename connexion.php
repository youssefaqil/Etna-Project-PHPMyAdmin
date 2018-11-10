<?php
try
{
  $bdd = new PDO('mysql:host=127.0.0.1','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
}
catch(PDOException $e)
{
        die('Erreur : '.$e->getMessage());
      
}
?>