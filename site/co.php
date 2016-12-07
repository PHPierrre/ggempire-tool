<?php
session_start();
include('bdd.php');
//cookie

if(!empty($_COOKIE['pseudo']) && !empty($_COOKIE['password']) && !empty($_COOKIE['id'])){
if(isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && isset($_COOKIE['id'])){

$pseudo = mysql_real_escape_string(htmlspecialchars($_COOKIE['pseudo']));
$passe = mysql_real_escape_string(htmlspecialchars($_COOKIE['password']));
$sec = 1;
	
$quete = mysql_query("SELECT * FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($pseudo == $resultat['pseudo']){

$quete = mysql_query("SELECT * FROM validation WHERE pass='$passe';");
$resultat = mysql_fetch_array($quete);
if($passe == $resultat['pass']){
	
$quete = mysql_query("SELECT * FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($sec == $resultat['id']){

// authentification ok 
$_SESSION['pseudo'] = $resultat['pseudo'];// le pseudo
$_SESSION['password'] = $resultat['pass'];// le mdp
$_SESSION['id'] = $resultat['id'];// 1
}else{
	echo "<script>alert('Votre compte n'a pas été encore activer');</script>";
	}
}else{
	echo "<script>alert('Mot de passe incorrect!');</script>";
	}
}else{
	echo "<script>alert('Pseudo inconnu!);</script>";
	}

$msg_erreur = '
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="http://x/styles/styles-b.css" rel="stylesheet" media="all" type="text/css"> 
<title>erreur</title>
</head>

<body>
<div>Vous n\'etes pas connectés et donc vous ne vouvez pas voir le contenu disponible à cette adresse.<br/>
<center>
<a href="http://x/site/inscription.php" class="btn btn-success">Inscription</a>
<a href="http://x/site/connect.php" class="btn btn-success">Se connecter</a>
<a href="http://x/site/forget.php" class="btn btn-danger">Mot de passe oubllié</a>
</center>
</div>
</body>
</html>';

}
else{echo $msg_erreur;}
}
else{echo $msg_erreur;}

if(!empty($_SESSION['pseudo']) && !empty($_SESSION['password']) && !empty($_SESSION['id'])){	
	
if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['id'])){
?>