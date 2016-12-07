<?php
session_start();
include('../bdd.php');
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
$emailp = htmlspecialchars($_POST['emailp']);
$skype = htmlspecialchars($_POST['skype']);
$sweb = htmlspecialchars($_POST['sweb']);
$depart = htmlspecialchars($_POST['departement']);
$sign = htmlspecialchars($_POST['textarea']);
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}
else{echo'erreur inconnu';}

if(ereg('^^http(s)?://([a-zA-Z0-9-]+.)?([a-zA-Z0-9-]+.)?[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}(:[0-9]+)?(/[a-zA-Z0-9-]*/?|/[a-zA-Z0-9]+\.[a-zA-Z0-9]{1,4})?$', $sweb)){
$quete = mysql_query("UPDATE validation SET emailp ='$emailp' WHERE pseudo='$pseudo';");
$quete = mysql_query("UPDATE validation SET skype ='$skype' WHERE pseudo='$pseudo';");	
$quete = mysql_query("UPDATE validation SET sweb ='$sweb' WHERE pseudo='$pseudo';");
$quete = mysql_query("UPDATE validation SET departement ='$depart' WHERE pseudo='$pseudo';");
$quete = mysql_query("UPDATE validation SET Signature ='$sign' WHERE pseudo='$pseudo';");	
	echo"<SCRIPT LANGUAGE='JavaScript'>document.location.href='http://x/site/profils/modifier-profil.php?pseudo=".$pseudo."&etat=val'</SCRIPT>";
	exit;
}else{
$quete = mysql_query("UPDATE validation SET emailp ='$emailp' WHERE pseudo='$pseudo';");
$quete = mysql_query("UPDATE validation SET skype ='$skype' WHERE pseudo='$pseudo';");	
$quete = mysql_query("UPDATE validation SET departement ='$depart' WHERE pseudo='$pseudo';");
$quete = mysql_query("UPDATE validation SET Signature ='$sign' WHERE pseudo='$pseudo';");
	echo"<SCRIPT LANGUAGE='JavaScript'>document.location.href='http://x/site/profils/modifier-profil.php?pseudo=".$pseudo."&etat=nurl'</SCRIPT>";
	exit;}

}else{include('noco.php');}
}else{include('noco.php');}

?>