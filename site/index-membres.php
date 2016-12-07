<?php
session_start();
//je me connecte a la base de donnee
include('bdd.php');
 
//je recupere les informations du formulaire
$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
$passe = mysql_real_escape_string(htmlspecialchars($_POST['password']));
$sec = 1;

// Je crypte $passe avec la fonction "sha1".
$passe = sha1($passe);

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

//cookie

if (isset($_POST['souvenir']))
{
$expire = time() + 365*24*3600;
setcookie('pseudo', $_SESSION['pseudo'], $expire);
setcookie('password', $_SESSION['password'], $expire);
setcookie('id', $_SESSION['id'], $expire);
}

$expire = time() + 365*24*3600;
setcookie('pseudo', $_SESSION['pseudo'], $expire);
setcookie('password', $_SESSION['password'], $expire);
setcookie('id', $_SESSION['id'], $expire);

date_default_timezone_set('Europe/Paris');
$date = date('d m y \à H:i');
$quete = mysql_query("UPDATE validation SET date ='$date' WHERE pseudo='$pseudo';");

// on affiche une include du gestionnaire d'outil
echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="http://x/site/accueil.php" 
</SCRIPT>';
}
else{
	echo'activation pas ok';}}

else{ echo'Mot de passe incorect';}
}
else{ echo'pseudo incorrect';}


?>