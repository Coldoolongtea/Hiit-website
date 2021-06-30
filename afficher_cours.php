<?php
session_start(); 
$IdUtilisateur = $_SESSION['IdUtilisateur'];
$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
if(isset($_POST['id_cours'])){
  date_default_timezone_set("Europe/Brussels");
  $IDcour = $_POST['id_cours'];
  $date = date("Y-m-d");
  $sql1 = "INSERT INTO `participer` (`IDCours`, `IdUtilisateur`, `DateDinscription`) 
    VALUES ('$IDcour', '$IdUtilisateur', '$date')";

$Resultat = $base->exec($sql1);
  
}
try{


	
	$sql = "SELECT * FROM cours WHERE `IDObjectif` IN ( SELECT `IDObjectif` FROM `choisir` WHERE `IdUtilisateur` = '$IdUtilisateur')";
	$resultat=$base->query($sql);
	$sql2 = "SELECT * FROM cours";
	$resultat2=$base->query($sql2);


		//echo " Nom : $NomCours, Nombre de participants : $NombreDeParticipants, Date : $Date, Heure : $Heure, 	IDTypeCours : $IDTypeCours</strong><br/>";

   }
catch (Exception $e){
//message en cas d'erreur
die('Erreur : '.$e->getMessage());
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>HIIT</title>
  </head>
  <style>
  .card{
    margin:5em;
 
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
      </ul></ul>

<h2>Chercher un cours en fonction de la date</h2>
<form action='recherche.php' method='post'>
		Date: <input type='date' name='DateDuCours'> <br>
		<input type= 'submit' class="btn btn-primary" value= 'Chercher le cours'>
	</form>
<?php If($ligne=$resultat->fetch(PDO::FETCH_ASSOC)!=0) {?>
<h2>Cours spécialement pour vous!</h2>
<?php } ?>
  <?php
  	while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		
		$NomCours=$ligne['NomCours'];
		$NombreDeParticipants = $ligne['NombreDeParticipants'];
    $Date=$ligne['Date'];
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
    <p class="card-text"><?php echo "Date : $Date";?></p>
    <p class="card-text"><?php echo "Heure : $Heure";?></p>
    <form method="post">
    <input type="submit" onclick="myFunction(this.id)" id = '<?php echo $IDcours ?>' action= 'afficher_cours.php'  name='id_cours' class="btn btn-primary" value='<?php echo $IDcours ?>'>
    </input>
  </div>
</div>
</form>
<?php
	}
		?>

<h2>L'entiéreté de notre catalogue</h2>

<?php
  	while($ligne2=$resultat2->fetch(PDO::FETCH_ASSOC))
		{
		
		$NomCours=$ligne2['NomCours'];
		$NombreDeParticipants = $ligne2['NombreDeParticipants'];
    $Date=$ligne2['Date'];
    $Heure=$ligne2['Heure'];
    $IDTypeCours=$ligne2['IDTypeCours'];
    $IDcours = $ligne2['IDCours']
		?>
    <form method='post'>
 <div class="card" style="width: 18rem;">
  <img src="https://images.unsplash.com/photo-1586401426077-df67f1316076?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $NomCours?></h5>
    <p class="card-text"><?php echo " Nombre de participants : $NombreDeParticipants";?></p>
    <p class="card-text"><?php echo "Date : $Date";?></p>
    <p class="card-text"><?php echo "Heure : $Heure";?></p>
    <form method="post">
    <input type="submit" onclick="myFunction(this.id)" id = '<?php echo $IDcours ?>' action= 'afficher_cours.php'  name='id_cours' class="btn btn-primary" value='<?php echo $IDcours ?>'>
    </input>
  </div>
</div>
</form>
<?php
	}
		?>

   


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Optional JavaScript; choose one of the two! -->

 <script>

     
    function myFunction(y) {
    var x = y;    
    
    $.ajax({
    type : "POST", 
    url  : 'afficher_cours.php',  
    data : {IdCour: x},  
    success: function(data)
        {
         console.log(x); // Alert the results
        }  
  })}
</script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>