<?php 
session_start();
include('bdd.php');
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
}else{echo "<script>alert('Votre compte n'a pas été encore activer');</script>";}
}else{echo "<script>alert('Mot de passe incorrect!');</script>";}
}else{echo "<script>alert('Pseudo inconnu!);</script>";}
}else{include('noco.php');}}

if(!empty($_SESSION['pseudo']) && !empty($_SESSION['password']) && !empty($_SESSION['id'])){	
if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['id'])){
echo "

<!doctype html>
<html>
<head>
<link href='cssmenu/menu_source/styles.css' rel='stylesheet' type='text/css'>
<link href='http://x/styles/styles-b.css' rel='stylesheet' type='text/css'>
<meta charset='utf-8'>
<title>Alliance a ne pas attaquer</title>
<meta http-equiv='content-type' content='text/html; charset=utf-8'/>

  </head>
  <body id='t' style='font-family: Arial;border: 0 none;'>";

include('cssmenu/menu_source/index.php'); 
echo'<center><div id="c"><center>
Voici les alliances à NE PAS attaquer : <br>
- alliance royal<br>
- casiopé 1<br>
- clan-destin<br>
- Fritkots<br>
- Human ligue<br>
- Hunt of War<br>
- l ordre du graal<br>
- La bande à Alex<br>
- la table ronde 5<br>
- legion of chima<br>
- le nouveau monde<br>
- les darksiders (toutes les alliances darksiders)<br>
- Les flammes<br>
- les HUNS<br>
- les juju62<br>
- les marmottes<br>
- neo Regnum<br>
- pour mes amis<br>
- Robins School<br>
- Royaume unit<br>
- Tortues<br>
- ulfbert<br>
- union pourpre<br><br>

Vous devez respecter ces consignes sous peine de sanctions.
</center></div></center>
';
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>