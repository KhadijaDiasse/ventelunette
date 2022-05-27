<?php

     $id=$_GET['id'];    
     $con=new PDO("mysql:host=localhost;dbname=vente;","root",""); 
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     $sql = "DELETE FROM utilisateurs  WHERE id = '$id' ";
     $con->exec($sql);
     header("Location:connexion.php");
 ?>