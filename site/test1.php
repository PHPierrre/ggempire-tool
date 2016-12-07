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
<?php

echo "
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css' />
</head>
<body id='t' style='font-family: Arial;border: 0 none;'>";
include('cssmenu/menu_source/index.html'); 


echo '<center><div id="c"><center><br><br><br><br><br><br><br><br><div style"margin-left:200px;">';
//session
if(isset($_SESSION['pseudo'])){
echo'
<br>Bonjour
<div style="background-color:rgba(82,228,240,1.00);width:100px;border-radius:10px">'
.$_SESSION['pseudo'].'!</div>';}
//cookie
else{
echo'
<br>Bonjour
<div style="background-color:rgba(82,228,240,1.00);width:100px;border-radius:10px"> '.$_COOKIE['pseudo'].'!</div>';}
//
echo'<br>
Bienvenue sur la page d\'accueil !
<br>
Je suis <b>pierre151 sur goodgame empire</b> ,  je suis representant de cette alliance et pour mon projet au college , j\'ai decide de faire ce site comme outils pour vous car il correspond aux critères demandés<br><b>Bonne visite!</b><br>

<b>Outils :<br>
2 cartes disponibles , les fieffes coquin, conseils, et bien d\'autre chose</b></div> ';
?>
<?php
}
else{echo $msg_erreur;}
}
else{echo $msg_erreur; ;}

?>