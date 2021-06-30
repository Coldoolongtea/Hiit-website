<?php 
session_start();

$NomUtilisateur = $_SESSION['NomUtilisateur'];
$IdUtilisateur = $_SESSION['IdUtilisateur'];

$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
$sql = "SELECT * FROM `regime_alimentaire`";
$resultat=$base->query($sql);
if(isset($_POST['submit'])){
  if(!empty($_POST['Regime'])) {
    $IDRegime = $_POST['Regime'];

    $sql = "UPDATE `utilisateur` SET `IDRegime` = '$IDRegime' WHERE `utilisateur`.`IdUtilisateur` = '$IdUtilisateur'";
    $_SESSION['IDRegime']=$IDRegime;
}
}

        
$Resultat = $base->exec($sql);
?>

<html>
<head>
	<meta charset ="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title> HIIT </title>
	<title> Choix Régime </title>
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
<form action="ChoixRegime.php" method="post">
<pre>
<h3>Choisir Un Régime :</h3>
  <?php  while($ligne=$resultat->fetch(PDO::FETCH_ASSOC)){
      $Nom=$ligne['Nom'];
      $IDRegime=$ligne['IDRegime'];
      ?>
     
      <input name= "Regime" type="radio" value="<?php echo $IDRegime ?>"/><label for="<?php $IDRegime ?>"><?php echo " $Nom"?></label><br />
      
      <?php  } 
  ?>
    <input type="submit" class="btn btn-primary" name="submit" value="Valider">
  </pre>
  </form>
  <form action= 'Connexion.php' method= 'post'>
  <input type="submit" class="btn btn-primary" value="Retour">  		
	</form>
	  
	
</body>
</head>