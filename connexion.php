<?php 
session_start();


$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
$NomUtilisateur = $_SESSION['NomUtilisateur'];
$MotDePasse = $_SESSION['MotDePasse'];
$IdUtilisateur = $_SESSION['IdUtilisateur'];
$IDType = $_SESSION['IDTypeUtilisateur'];

$sql = "SELECT * FROM `cours` WHERE `IDCours` IN ( SELECT `IDCours` FROM `participer` WHERE `IdUtilisateur` = '$IdUtilisateur')";


$resultat=$base->query($sql);

if(isset($_POST['id_cours'])){
  $_SESSION['IDCours'] = $_POST['id_cours'];
  header("location:http://localhost/hiit/DetailsCours.php");
  
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<meta charset ="UTF-8">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<title> HIIT </title>
</head>
<style>

.container{
  margin-top:3em;
  margin-bottom:3em;
}



  </style>
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

<!--<div class="container">
	 <?php
	 if (!isset($_SESSION['IdUtilisateur'])){
			echo "vous n'êtes pas connecté";
	  }
	  else{
	  echo  "Bienvenu ".$NomUtilisateur ."<br>"; 
	  } ?>
	  
	  
     
</div>-->
<h2>Mes cours</h2>
<?php
  	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		
		$NomCours=$ligne['NomCours'];
		$NombreDeParticipants = $ligne['NombreDeParticipants'];
    $DateDuCours=$ligne['Date'];
    $Heure=$ligne['Heure'];
    $IDTypeCours=$ligne['IDTypeCours'];
    $IDcours = $ligne['IDCours']
		?>

    
    <form method='post'>
 <div class="card" style="width: 18rem;">
  <img src="https://images.unsplash.com/photo-1586401426077-df67f1316076?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $NomCours?></h5>
    <p class="card-text"><?php echo " Nombre de participants : $NombreDeParticipants";?></p>
    <p class="card-text"><?php echo "Date : $DateDuCours";?></p>
    <p class="card-text"><?php echo "Heure : $Heure";?></p>
    <form method="post">
    <?php if(date("Y-m-d" )== $DateDuCours) { ?>
    <input type="submit" onclick="myFunction(this.id)" id = '<?php echo $IDcours ?>' action= 'afficher_cours.php'  name='id_cours' class="btn btn-primary" value='<?php echo $IDcours ?>'>
    </input>
    <?php } ?>
	
  </div>
</div>
</form>
<?php
	}
		?>

<?php if($IDType==2) { ?>


<!--<form action= 'CoursProposes.php' method= 'post'>
<input type="submit" value="Voir mes propositions">  		
</form>-->
<form action= 'Création_Cours.php' method= 'post'>
<input type="submit" class="btn btn-primary" value="Créer un cours">  		
</form>
<?php }?>

<?php if($IDType==3) { ?>


<form action= 'Création_Repas.php' method= 'post'>
<input type="submit" class="btn btn-primary" value="Proposer un repas">  		
</form>


<?php }?>

</body>
</head>
</html>