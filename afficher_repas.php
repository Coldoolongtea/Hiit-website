<?php
session_start();

$IDRegime = $_SESSION['IDRegime'];

    $base = new PDO('mysql:host=localhost;dbname=hiit','root','');
if(isset($_POST['details'])){
 
  echo "details de la recette <br>";
  header("location:http://localhost/hiit/afficher_recette.php");
  
}
try{    
    $sql = "SELECT * FROM `repas` where `IDRegime` = '$IDRegime'";
    $resultat=$base->query($sql);

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
</ul>
</ul>
 <h1>Des recettes spécialement pour votre régime</h1>

  <?php
      while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
    {
        
            $NomRepas= $ligne['NomRepas'];
            $NombreDeCalories= $ligne['NombreDeCalories'];
            $IDRegime= $ligne['IDRegime'];
        ?>
 <div class="card" style="width: 18rem;">
  <img src="https://media.eggs.ca/assets/RecipePhotos/_resampled/FillWyIxMjgwIiwiNzIwIl0/Fluffy-Pancakes-New-CMS.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $NomRepas?></h5>
    <p class="card-text"><?php echo " Nombre de Calories : $NombreDeCalories pour 100g  ";?></p>

    <form method="post">
   
    
  </div>
</div>
<?php
    }
        ?>
 