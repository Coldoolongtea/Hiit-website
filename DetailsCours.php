<?php
session_start(); 
$IdUtilisateur = $_SESSION['IdUtilisateur'];
$IDCours = $_SESSION['IDCours'];
$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
$date = date("Y-m-d");
if(isset($_POST['id_cours'])){
 
}
try{
	
    $sql = "SELECT * FROM `mouvement` WHERE IDMouvement IN ( SELECT IDMouvement FROM contient WHERE `IDCours` = $IDCours)";
    $sql2 = "SELECT* FROM cours WHERE IDCours = $IDCours";
    $sql3 = "SELECT NomUtilisateur, IdUtilisateur FROM `Utilisateur` WHERE IDUtilisateur IN ( SELECT IDUtilisateur FROM participer WHERE `IDCours` = $IDCours)";
    $resultat=$base->query($sql);
    $resultat2=$base->query($sql2);
    $resultat3=$base->query($sql3);
    $ligne2=$resultat2->fetch(PDO::FETCH_ASSOC);
    $NomCours = $ligne2["NomCours"];
    $IDTypeCours = $ligne2["IDTypeCours"];
    $IDCreator = $ligne2["IdUtilisateur"];
   }
catch (Exception $e){
//message en cas d'erreur
die('Erreur : '.$e->getMessage());
}

if(isset($_POST['supprimer'])){
    $sql3 = "DELETE FROM `cours` WHERE `cours`.`IDCours` = $IDCours";
    $base->query($sql3);
    header("location:http://localhost/hiit//connexion.php");
}
if(isset($_POST['submit'])){
  if(!empty($_POST['Utili'])) {
    $IdUtilisateur = $_POST['Utili'];

    $sql4 = "INSERT INTO `gagner` (`IDCours`, `IdUtilisateur`, `DateDeVictoire`) VALUES ('$IDCours', '$IdUtilisateur', '$date')";
    $base->query($sql4);
    header("location:http://localhost/hiit//connexion.php");
    
}}
if(isset($_POST['noter'])){
  
  $note=$_POST['note'];
  $commentaire=$_POST['commentaire'];
  $date = date("Y-m-d");

    $sql5 = "INSERT INTO `noter` (`IDCours`, `IdUtilisateur`, `DateDeNotation`, `Commentaire`, `note`) VALUES ('$IDCours', '$IdUtilisateur', '$date' , '$commentaire' ,'$note')";
    $base->query($sql5);
    header("location:http://localhost/hiit//connexion.php");
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
  
    <title>HIIT</title>
  </head>
  <style>
  .card{
    margin:5em;
 
  }
  
  </style>
  <body>

  
<h3>Liste de mouvements pour le cours <?php echo $NomCours ?></h3>


<?php
while($ligne=$resultat->fetch(PDO::FETCH_ASSOC))
		{
		
        $NomMouvement=$ligne['NomMouvement'];
        echo "Nom du mouvement : ".$NomMouvement."\n";
        echo "</br>"; 
        $DureePause=$ligne['DureePause'];
        echo "Durée pause : ".$DureePause."\n";
        echo "</br>"; 
        $DureeMouvement=$ligne['DureeMouvement'];
        echo "Durée du mouvement : ".$DureeMouvement."\n";
        echo "</br>"; 
    
    
    }

    if ($IdUtilisateur==$IDCreator) {

   
    ?>
<form action="DetailsCours.php" method="post">
<?php  
    
      if ($IDTypeCours == 2){
?>
<h3>Choisir Un Gagnant :</h3>

<?php  
      }
      else if($IDTypeCours == 1){

?>

<h3>Liste de participants :</h3>
<?php  
      }

    while($ligne3=$resultat3->fetch(PDO::FETCH_ASSOC)){
      $NomUtilisateur=$ligne3['NomUtilisateur'];
      $IdUtilisateur=$ligne3['IdUtilisateur'];
      if ($IDTypeCours == 2){
      ?>
     
     <input name= "Utili" type="radio" value="<?php echo $IdUtilisateur ?>"/><label for="<?php $IdUtilisateur ?>"><?php echo " $NomUtilisateur"?></label><br />
      
      <?php  }
      else{

      echo  $NomUtilisateur;
      echo "<br>";
      }}
      if ($IDTypeCours == 2){
      ?>

  <input type="submit" class="btn btn-primary" name="submit" value="Valider">

  <?php  }?>

   </form>

   <form action= 'DetailsCours.php' method= 'post'>
   <input type="submit" class="btn btn-primary" name="supprimer" value="Supprimer le cours">  		
   </form>
  
   <?php  }
   
   else {   ?>
        <form action= 'DetailsCours.php' method= 'post'>
        <h5>Noter le cours :</h5>
        <input type="number" name="note"/><br />
        <h5>Rajouter un commentaire :</h5>
        <input type="text" name="commentaire"/><br />
        <input type="submit" class="btn btn-primary" name="noter" value="Noter le cours">  		
        </form>
<?php } ?>
 

 



    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>