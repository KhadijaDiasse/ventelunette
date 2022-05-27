<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>LunetteForStars</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">  
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/unveil-effects/animations.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<?php
  $con = new PDO("mysql:host=localhost;dbname=vente;","root","");                
        $id = $_GET['id'];                          
        $query = "select * from utilisateurs where id=$id"; 
            $req = $con->prepare($query);
            $id = $req->fetch();
            $req->execute(array());        
            $ligne = $req->fetch();                         
?>
<body>
    
    	<h4>Modifier votre compte  </h4>
    	<form method="POST" action="">
     
		    Id<input type="text" name="id"value=" <?php echo $ligne['0']?>"/><br/>
		    Nom<input type="text" name="nom" value="<?php echo $ligne['1']?>"/>	<br/>	    
		    Prenom<input type="text" name="prenom" value="<?php echo $ligne['2']?>"/><br/>
		    Telephone<input type="int" name="telephone" value="<?php echo $ligne['3']?>"/><br/>
			Adresse<input type="text" name="adresse" value="<?php echo $ligne['4']?>"/><br/>
			Login<input type="text" name="login" value="<?php echo $ligne['5']?>"/><br/>
      Password<input type="text" name="password" value="<?php echo $ligne['6']?>"/><br/>
		    <input class='btn btn-primary'type="submit" value="enregistrer"/><br/>
        </form>
<?php

$con = new PDO("mysql:host=localhost;dbname=vente;","root","");          
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone'])&& 
isset($_POST['login'])&& isset($_POST['password']))
{             
   $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $telephone=$_POST['telephone'];	
    $login=$_POST['login'];
    $password=$_POST['password'];
     
   $sql = "UPDATE utilisateurs set 
   nom = '$nom', prenom ='$prenom', telephone ='$telephone', adresse ='$adresse', login = '$login',password = '$password' 
   where id = $id ";
   $con->exec($sql); 
   header("Location:connexion.php");
} 
	?>
</body>
</html>
