<?php
$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
$sql2 = "SELECT * FROM `regime_alimentaire`";
$resultat2=$base->query($sql2);
if(isset($_POST['sumbit'])){
session_start();
$IdUtilisateur = $_SESSION['IdUtilisateur'];
$NomRepas=$_POST['NomRepas'];
$NombreDeCalories=$_POST['NombreDeCalories'];
$regime_alimentaire=$_POST['regime_alimentaire'];


		
	
		$sql= "INSERT INTO `repas` (`IDRepas`, `NomRepas`, `NombreDeCalories`, `IdUtilisateur`, `IDRegime`)
		VALUES (NULL,'$NomRepas','$NombreDeCalories', $IdUtilisateur, '$regime_alimentaire')";
		
		$Resultat = $base->exec($sql);
		header("location:http://localhost/hiit//connexion.php");}
?>
<html>
<head>
	<meta charset ="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title> Création Repas </title>
</head>
<body>

<h4> proposer un repas</h4>
 <form action="Création_Repas.php" method="post">
  
 <pre>
 <h5>NomRepas:</h5>
 <input type="text" name="NomRepas"/><br />
 <h5>Nombre de calories pour 100g:</h5>
 <input type="number" name="NombreDeCalories"/><br />
 <h5>Type  Régime :</h5>


  <select name="regime_alimentaire" id="IDRegime">
<?php  while($ligne=$resultat2->fetch(PDO::FETCH_ASSOC)) {
 $Nom=$ligne['Nom'];
 $IDRegime=$ligne['IDRegime'];
?>
  <option value="<?php echo $IDRegime?>"><?php echo "$Nom"?></option>

  <?php }
  
  ?>
</select>
  
    <input type="submit" class="btn btn-primary"  action= 'Création_Repas.php' name="sumbit" value="Ajouter">
  </pre>
  </form>

	
  </body>
</head>