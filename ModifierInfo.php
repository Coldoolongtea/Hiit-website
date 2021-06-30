<?php
	if(isset($_POST['creer'])){
	
	session_start();
	$NomUtilisateur = $_SESSION['NomUtilisateur'];
    $Nom = $_POST['Nom'];
	$Prenom = $_POST['Prenom'];
	$MotDePasse = $_POST['MotDePasse'];
	$Sexe = $_POST['Sexe'];
	$DateDeNaissance = $_POST['DateDeNaissance'];
   
 try{
	
	$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
	$requete =$base->prepare("UPDATE utilisateur SET Nom=?,Prenom=?,MotDePasse=?,Sexe=?,DateDeNaissance=? WHERE `utilisateur`.`NomUtilisateur` =?");
	$resultat =$requete->execute(array($Nom,$Prenom,$MotDePasse,$Sexe,$DateDeNaissance,$NomUtilisateur));

	
 }
 catch (Exception $e){
//message en cas d'erreur
die('Erreur : '.$e->getMessage());
}
	}
	  ?>
<html>
<head>
	<meta charset ="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title> HIIT </title>

</head>
<body>
<ul class="nav bg-light justify-content-between">
  <!--<li class="nav-item">
    <a class="nav-link active" href="#">Maison</a>
  </li>-->
  <ul class="nav bg-light justify-content-between">
  <a class="nav-link" href="connexion.php">Accueil</a>
</u1>
</u1>
  <li class="nav-item">
    <a class="nav-link" href="afficher_cours.php">Cours</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="afficher_repas.php">Repas</a>
  </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Mes Propositions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="CoursProposes.php">Voir Mes propositions de cours</a>
		  <a class="dropdown-item" href="RepasProposes.php">Voir Mes propositions de repas</a>
        </div>
      </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Paramétres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="ChoixRegime.php">Choisir Un Régime</a>
          <a class="dropdown-item" href="ChoixType.php">Choisir Un Type d'utilisateur</a>
          <a class="dropdown-item" href="ModifierInfo.php">Modifier infos</a>
		  <a class="dropdown-item" href="ChoixObjectif.php">Chosisir ses objectifs</a>
        </div>

		<li class="nav-item">
		<a href="deconnexion.php">Deconnexion</a>
		</li>
      </li>
</ul>
</ul>
	<h1> Midifer vos informations </h1>
	
	<form action='ModifierInfo.php' method='post'>
		<input type='text' name='Nom' placeholder= 'Nouveau Nom'> <br>
		<input type='text' name='Prenom' placeholder='Nouveau Prenom'> <br>
		<!--NomUtilisateur: <input type='text' name='NomUtilisateur'> <br> -->
		<input type='password' name='MotDePasse' placeholder='Nouveau mot de passe'> <br>
		Sexe: <select name="Sexe" id="sexe">
			<option value="F">F</option>
			<option value="M">M</option>
    
		  </select> <br>
		DateDeNaissance: <input type='date' name='DateDeNaissance'> <br>
		<input class="btn btn-primary" type= 'submit' name="creer" value= 'update'>
	</form>
	<form action= 'Connexion.php' method= 'post'>
  <input class="btn btn-primary" type="submit" value="Retour">  		
	</form>
</body>
</head>

