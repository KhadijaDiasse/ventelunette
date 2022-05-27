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
<body>
<?php 
 $con=new PDO("mysql:host=localhost;port=3306;dbname=vente","root",""); 
if (isset($_POST['login']) AND isset($_POST['password'])) {
        $login=$_POST['login'];       
        $password=$_POST['password'];       
        $req="SELECT * FROM 'utilisateurs' WHERE 'login' like '$login' AND 'password' like '$password'";
        $sql=$con->query($req);          
               
                        
                                  
}

try {
        $con=new PDO("mysql:host=localhost;dbname=vente;","root","");        
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['telephone'])&& isset($_POST['login']) && isset($_POST['password']))
 	       {              
                    $n=$_POST['nom'];
                    $p=$_POST['prenom'];
	            $ad=$_POST['adresse'];
	            $tel=$_POST['telephone'];	
                    $log=$_POST['login'];
	            $pas=$_POST['password'];	                                       
                      echo '</br>';
                      echo '</br>';                                          
              $sql="INSERT INTO utilisateurs (nom,prenom,adresse,telephone,login,password)values(?,?,?,?,?,?)";
              $stm=$con->prepare($sql);
              $stm->execute([$n,$p,$ad,$tel,$log,$pas]);
              $id=$con->lastInsertId();
        }                 
      }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
 }        
        ?>
        <?php 
            $con=new PDO("mysql:host=localhost;dbname=vente;","root",""); 
            $req= "select * from utilisateurs";                       
            $resultat=$con->query($req);
            echo"<table class='table caption-top'>";
            echo"<caption>Liste des Utilisateurs</caption>";   
            echo"<tr>
            <th scope='col'>Id</th>
            <th scope='col'>Nom</th>
            <th scope='col'>Prenom</th>
            <th scope='col'>Adresse</th>
            <th scope='col'>Telephone</th>
            <th scope='col'>Login</th>
            <th scope='col'>Password</th>
            <th scope='col'>Actions</th>
                  </tr>\n";
            while ($ligne= $resultat ->fetch()) {
            echo "<tr> <td>{$ligne['id']}</td><td>{$ligne['nom']}</td>  <td>{$ligne['prenom']}</td> <td>{$ligne['adresse']}</td> <td>{$ligne['telephone']}</td><td>{$ligne['login']}</td> <td>{$ligne['password']}</td>
            <td><a class='btn btn-danger' href='supprimer.php?id=$ligne[id]'>Supprimer</a> <a class='btn btn-primary' href='modifier.php?id=$ligne[id]'>Modifier</a></td> </tr>";
            }    
        ?>
<script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>
  <script src="lib/unveil-effects/unveil-effects.js"></script>
  <script src="js/main.js"></script>
</body>
</html>  