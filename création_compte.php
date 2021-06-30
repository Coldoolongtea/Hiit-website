<?php
	if(isset($_POST['créer'])){
	
	session_start();
	$Nom = $_POST['Nom'];
	$Prenom = $_POST['Prenom'];
	$NomUtilisateur = $_POST['NomUtilisateur'];
	$MotDePasse = $_POST['MotDePasse'];
	$Sexe = $_POST['Sexe'];
	$DateDeNaissance = $_POST['DateDeNaissance'];
	

	

	$base = new PDO('mysql:host=localhost;dbname=hiit','root','');

$sql = "INSERT INTO utilisateur(`IdUtilisateur`, `Nom`, `Prenom`, `NomUtilisateur`, `MotDePasse`, `Sexe`, `DateDeNaissance`, `IDRegime`, `IDTypeUtilisateur`) 
        VALUES(NULL,'$Nom','$Prenom','$NomUtilisateur','$MotDePasse','$Sexe','$DateDeNaissance',NULL,1)";
        
$Resultat = $base->exec($sql);
$IDUtilisateur = $base->lastInsertId();


$_SESSION['NomUtilisateur'] = $NomUtilisateur;
$_SESSION['MotDePasse'] = $MotDePasse;
$_SESSION['IdUtilisateur'] = $IDUtilisateur;
$_SESSION['IDTypeUtilisateur']=1;
$_SESSION['IDRegime']=NULL;
	
header("location:http://localhost/hiit/connexion.php");
			
	
	}
	  ?>
<html>
<head>
	<meta charset ="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title> Créer Un Compte </title>




</head>

<body>
	<h1> Créer votre compte HIIT </h1>
	<dev class="container">
	<form action='création_compte.php' method='post'>
		Nom: <input type='text' name='Nom'> <br>
		Prenom: <input type='text' name='Prenom'> <br>
		NomUtilisateur: <input type='text' name='NomUtilisateur'> <br>
		MotDePasse: <input type='password' name='MotDePasse'> <br>
		Sexe: <select name="Sexe" id="sexe">
			<option value="F">F</option>
			<option value="M">M</option>
    
		  </select> <br>
		DateDeNaissance: <input type='date' name='DateDeNaissance'> <br>
		<input type= 'submit' class="btn btn-primary" name="créer" value= 'Creer Un Compte'>
	</form>
	</div>
</body>
</head>


			
