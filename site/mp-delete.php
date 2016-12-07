<?php
session_start();
include('bdd.php');
if(!empty($_COOKIE['pseudo']) && !empty($_COOKIE['password']) && !empty($_COOKIE['id'])){
if(isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && isset($_COOKIE['id'])){

$pseudo = mysql_real_escape_string(htmlspecialchars($_COOKIE['pseudo']));
$passe = mysql_real_escape_string(htmlspecialchars($_COOKIE['password']));
$sec = 1;
	
$quete = mysql_query("SELECT pseudo FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($pseudo == $resultat['pseudo']){

$quete = mysql_query("SELECT pass FROM validation WHERE pass='$passe';");
$resultat = mysql_fetch_array($quete);
if($passe == $resultat['pass']){
	
$quete = mysql_query("SELECT * FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($sec == $resultat['id']){

// authentification ok 
$_SESSION['pseudo'] = $resultat['pseudo'];// le pseudo
$_SESSION['password'] = $resultat['pass'];// le mdp
$_SESSION['id'] = $resultat['id'];// 1
}else{echo "<script>alert('Votre compte n'a pas été encore activer');</script>";}
}else{echo "<script>alert('Mot de passe incorrect!');</script>";}
}else{echo "<script>alert('Pseudo inconnu!);</script>";}
}else{include('noco.php');}}

if(!empty($_SESSION['pseudo']) && !empty($_SESSION['password']) && !empty($_SESSION['id'])){	
if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['id'])){ 
include('cssmenu/menu_source/index.php');
$id = htmlspecialchars($_GET['delete']);
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}
$quete = mysql_query("SELECT desti FROM message WHERE id='$id';") or die(mysql_error());
while($don = mysql_fetch_array($quete)){
	
$pseudobdd == $base;
if($pseudo == $don['desti']){
mysql_query("DELETE FROM message WHERE id='$id'");
echo'<SCRIPT LANGUAGE="JavaScript">document.location.href="http://x/site/messagerie.php?confirm=suppr"</SCRIPT>';
	exit;
}
else{echo'action non autorisé';}}

?>

<?php	
	
	
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>