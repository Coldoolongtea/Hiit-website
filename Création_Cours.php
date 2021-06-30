
<?php
	$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
	$sql2 = "SELECT * FROM `objectif`";
	$resultat2=$base->query($sql2);


if(isset($_POST['submit'])){
   session_start();
   $IdUtilisateur = $_SESSION['IdUtilisateur'];

	$NomCours=$_POST['NomCours'];
	$NombreDeParticipants = $_POST['NombreDeParticipants'];
	$Date=$_POST['Date'];
	$Heure=$_POST['Heure'];
	$categorie=$_POST['categorie'];
	$IDObjectif=$_POST['Objectif'];
	/*$IDTypeCours =$_POST['IDTypeCours'];*/
	
	/*$IdUtilisateur=$ligne['IdUtilisateur'];*/

	
	
	
	
	$sql = "INSERT INTO cours (`IDCours`, `NomCours`, `NombreDeParticipants`, `Date`, `Heure`,`IDTypeCours`,`IdUtilisateur`, `IDObjectif` ) 
			VALUES (NULL, '$NomCours', '$NombreDeParticipants', '$Date', '$Heure',$categorie,  $IdUtilisateur, $IDObjectif)";
	
	
	$Resultat = $base->exec($sql);
	echo " Le cours ".$NomCours. " a bien été ajouté! Merci pour votre proposition ";
	
	
	if($Resultat){
		$_SESSION['IDCours'] = $base->lastInsertID();
			header("location:http://localhost/hiit/ChoixMouvement.php");
			
			}
}
?>





<html>
<head>
<meta charset ="UTF-8">
<title> projet de modelisation des données 2020 </title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<title> projet de modelisation des données 2020 </title>
</head>

<body>
<h2>Proposer Un cours</h2>
<form action="Création_Cours.php" method="post">
<pre>

<h3>Nom du cours :</h3>
<input type="text" name="NomCours" /><br />
<h3>NombreDeParticipants :</h3>
<input type="number" name="NombreDeParticipants" /><br />
<h3>Date :</h3>
<input type="date" name="Date" /><br />
<h3>Heure :</h3>
<input type="time" name="Heure" /><br />
<h3>Type cours :</h3>
<select name="categorie" id="IDTypeCours">

  <option value="1">Cours</option>
  <option value="2">Concours</option>
  
</select>
<h3>Objectif visé :</h3>
<select name="Objectif" id="IDObjectif">
<?php  while($ligne=$resultat2->fetch(PDO::FETCH_ASSOC)) {
 $NomObjectif=$ligne['NomObjectif'];
 $IDObjectif=$ligne['IDObjectif'];
?>
  <option value="<?php echo $IDObjectif ?>"><?php echo " $NomObjectif"?></option>

  <?php }
  
  ?>
</select>

<input type="submit" class="btn btn-primary" action= 'Création_Cours.php'  name="submit" value="Ajouter">
</pre>
</form>




</body>
</html>
