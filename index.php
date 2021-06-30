<?php

if(isset($_POST['sumbitionButton'])){
	session_start();
	
$NomUtilisateur = $_POST['NomUtilisateur'];

$MotDePasse = $_POST['MotDePasse'];

$base = new PDO('mysql:host=localhost;dbname=hiit','root','');

$sql= "SELECT * FROM `utilisateur` WHERE `NomUtilisateur`= '$NomUtilisateur' AND `MotDePasse`= '$MotDePasse'";

$resultat=$base->query($sql);

$ligne=$resultat->fetch(PDO::FETCH_ASSOC);

		if($ligne)

		{
			$_SESSION['NomUtilisateur'] = $NomUtilisateur;
			$_SESSION['MotDePasse'] = $MotDePasse;
			$_SESSION['IdUtilisateur'] = $ligne['IdUtilisateur'];
			$_SESSION['IDTypeUtilisateur']=$ligne['IDTypeUtilisateur'];
			$_SESSION['IDRegime']=$ligne['IDRegime'];
			header("location:http://localhost/hiit/connexion.php");
			
			
			}
		else
		{
		echo "Mot de passe et/ou Nom d'utilisateur erroné<br>";
		}
  
	}

?>

<html>
<head>
	<meta charset ="UTF-8">
	<title> projet de modelisation des données 2020 </title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<style>
body{
	background-color:#092772;
	color:white;
	font-family: 'Montserrat', sans-serif;
	
	

}
.input{
	margin-bottom:1.2em;
	width=100%;
	padding:.5em;
	border-radius:0.5em;
	border:none;
}
.container{
position: absolute;
  top: 25%;
  right:20%
 
  
}
h4{
	font-size:0.7em;
}
.btn{
	border-radius:0.5em;
	padding:0.6em;
	border:none;
	width:100%;
	color:white;
	background:  #5C0BD9;

}
#sub{
	margin-top:0.6em;
}

#WelcomePic{
	width:50%;
	height:50%;
	position:absolute;
	right:45%;
	top:30%;
}
p{
	font-siez:10%;
}
h1{
	text-align:center;
	margin-top:3em;
}

</style>
<body>
<img id="WelcomePic" src="WelcomePagePic.svg" />
<h1> Commencer à faire du sport avec HIIT </h1>
<div class="container">
	
	<h2>Connection</h2>
	<form action="index.php" method='post'>
		<h4>Nom Utilisateur:</h4>
		 <input class="input" type='text' name='NomUtilisateur'> <br>
		 <h4>Mot de passe: </h4>
		<input class="input" type='password' name='MotDePasse'> <br>
		
		<input class="btn" type= 'submit' name="sumbitionButton" value= 'se connecter'>
		
	</form>

	
	<form action='création_compte.php' method='post'>
	 <input class="btn" id="sub" type= 'submit' value= 'créer un compte'>
	</form>
	<div>	 
</body>

</html>





