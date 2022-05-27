
<?php
	function createUser($nom, $prenom, $telephone, $adresse) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO utilisateurs (nom, prenom, telephone, adresse) 
					VALUES ('$nom', '$prenom', '$telephone' ,'$adresse')";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	//recupere un user
	function readUser($id) {		 
		$con = getDatabaseConnexion();
		$req = "SELECT * from utilisateurs where id like '$id' ";
		$sql = $con->query($req);
		$sql->execute();
		if($row=$sql->fetch())
		{
            $nom=$row['nom'];
 			$prenom=$row['prenom'];		
 			 echo $prenom;
 			 echo $nom;

		}
		
		
	
	}
	//met à jour le user
	function updateUser($id, $nom, $prenom, $telephone, $adresse) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE utilisateurs set 
						nom = '$nom',
						prenom = '$prenom',
						telephone = '$telephone',
						adresse = '$adresse' 
						where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}

	// suprime un user
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from utilisateurs where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>



