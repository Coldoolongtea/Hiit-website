<?php 
session_start();

$IDCours = $_SESSION['IDCours']; 

$base = new PDO('mysql:host=localhost;dbname=hiit','root','');
$sql = "SELECT * FROM `mouvement`";
$resultat=$base->query($sql);

if(isset($_POST['submit'])){
  if(!empty($_POST['check'])) {
    
    $Ordre = $_POST['Ordre'];
    $Check = $_POST['check']; 

    $sql2 = "INSERT INTO `contient`(IDCours,IDMouvement,ordre) VALUES " ;
    for ($i=0; $i<sizeof($Check); $i++)
    {
      $Tmp = $Check[$i];
      $sql2 .= "($IDCours, $Tmp ,$Ordre[$Tmp])" ;  

      if($i!=sizeof($Check)-1){
        $sql2 .= ","; 
      }
      
    }

    $resultat2=$base->exec($sql2);

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
	<title> Choisir les mouvements </title>


</head>

<body>
<form action="ChoixMouvement.php" method="post">
<pre>
<h3>Choisir ses mouvements :</h3>
  <?php  while($ligne=$resultat->fetch(PDO::FETCH_ASSOC)){
      $NomMouvement=$ligne['NomMouvement'];
      $IDMouvement=$ligne['IDMouvement'];
      ?>
     
      <input name= "check[]" type="checkbox" value="<?php echo $IDMouvement ?>"/><label for="<?php $IDMouvement ?>"><?php echo " $NomMouvement"?></label>
      <h5>Ordre:</h5>
      <input type="number" name="Ordre[<?= $IDMouvement ?>]"/><br />
      <?php  } 
  ?>
    <input type="submit" action= 'choixMouvement.php' class="btn btn-primary"  name="submit" value="Valider">
  </pre>
  </form>


</body>
</head>
</html>