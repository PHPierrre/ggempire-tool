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
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='http://x/site/cssmenu/menu_source/styles.css' />
<link rel='stylesheet' type='text/css' href='../styles/styles-b.css' />
</head>
<body id='t' style='font-family: Arial;border: 0 none;'>";
include('cssmenu/menu_source/index.php'); 

echo'<br><center><div id="c">Par défaut, GGE ne tient pas compte de l\'apport du bailli et considère les archers comme des soldats à distance, ce qui est faux, car ils ont autant de force en mêlée qu\'en distance.<br>

Voici un exemple simple avec une répartition 50/50 sur le mur défendu';
echo'<center><img src="http://x/site/image/sys/sys0001.jpg" /></center><br>';
echo'<center><img src="http://x/site/image/sys/sys0002.jpg" /></center>';
echo'<center>Il n\'y a pas beaucoup de soldats à distance sur le mur, ce qui crée une faille.
Avec le bailli qui donne plus de forces pour les soldats en mêlée, il faudrait qu\'il y ait plus de soldats en distance que de soldats en mêlée.<br>

Voici ce que donne le calcul des forces en défense :</center>';
echo'<center><img src="http://x/site/image/sys/sys0003.jpg" /></center>';
echo'<center>Le déséquilibre est visible : si on se fait attaquer en 50%-50% distance/melée ou full-distance on est plus faible.</center>';
echo'<center><img src="http://x/site/image/sys/sys0004.jpg" /></center>';
echo'<center>Si je change le curseur de répartition distance/mélées sur le mur, j\'obtiens une répartition plus intéressante</center>';
echo'<center>Avec une force globale plus intéressante.<br>
J\'ai gagné 50 % en défense en mêlée et 28% en défense à distance par une simple modification du curseur !!</center>';
echo'<center><img src="http://x/site/image/sys/sys0005.jpg" /></center>';
echo'<center><img src="http://x/site/image/sys/sys0006.jpg" /></center>';
echo'<br><br>';

?>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>