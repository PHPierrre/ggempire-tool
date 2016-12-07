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
<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css' />
</head>
<body id='t' style='font-family: Arial;border: 0 none;'>";
include('cssmenu/menu_source/index.php'); 
echo '<center><div id="c">

<br>
<center>Aller je vous présente une liste d\'espionnage des Tours barbare.</center><br><br>
'; 

echo'Niveau 1 - 1 victoire pour passer au niveau 21';
echo'<center><img src="http://x/site/image/fc1/fc20-21-1.PNG" /></center>';
echo'Niveau 2 - 1 victoire pour passer au niveau 22';
echo'<center><img src="http://x/site/image/fc1/fc21-22-1.PNG" /></center>';
/*
echo'Niveau 3 - 1 victoire pour passer au niveau 23';
echo'<center><img src="http://x/site/image/fc/4-1.jpg" /></center>';
echo'Niveau 4 - 1 victoire pour passer au niveau 5';
echo'<center><img src="http://x/site/image/fc/5-1.jpg" /></center>';
echo'Niveau 5 - 2 victoires pour passer au niveau 6';
echo'<center><img src="http://x/site/image/fc/6-2.jpg" /></center>';
echo'Niveau 5 - 1 victoire pour passer au niveau 6';
echo'<center><img src="http://x/site/image/fc/6-1.jpg" /></center>';
echo'Niveau 6 - 2 victoires pour passer au niveau 7';
echo'<center><img src="http://x/site/image/fc/7-2.jpg" /></center>';
echo'Niveau 6 - 1 victoire pour passer au niveau 7';
echo'<center><img src="http://x/site/image/fc/7-1.jpg" /></center>';
echo'Niveau 7 - 3 victoires pour passer au niveau 8';
echo'<center><img src="http://x/site/image/fc/8-3.jpg" /></center>';
echo'Niveau 7 - 2 victoires pour passer au niveau 8';
echo'<center><img src="http://x/site/image/fc/8-2.jpg" /></center>';
echo'Niveau 7 - 1 victoire pour passer au niveau 8';
echo'<center><img src="http://x/site/image/fc/8-1.jpg" /></center>';
echo'Niveau 8 - 3 victoires pour passer au niveau 9';
echo'<center><img src="http://x/site/image/fc/9-3.jpg" /></center>';
echo'Niveau 8 - 2 victoires pour passer au niveau 9';
echo'<center><img src="http://x/site/image/fc/9-2.jpg" /></center>';
echo'Niveau 8 - 1 victoire pour passer au niveau 9';
echo'<center><img src="http://x/site/image/fc/9-1.jpg" /></center>';
echo'Niveau 9 - 3 victoires pour passer au niveau 10';
echo'<center><img src="http://x/site/image/fc/10-3.jpg" /></center>';
echo'Niveau 9 - 2 victoires pour passer au niveau 10';
echo'<center><img src="http://x/site/image/fc/10-2.jpg" /></center>';
echo'Niveau 9 - 1 victoire pour passer au niveau 10';
echo'<center><img src="http://x/site/image/fc/10-1.jpg" /></center>';
echo'Niveau 10 - 3 victoires pour passer au niveau 11';
echo'<center><img src="http://x/site/image/fc/11-3.jpg" /></center>';
echo'Niveau 10 - 2 victoires pour passer au niveau 11';
echo'<center><img src="http://x/site/image/fc/11-2.jpg" /></center>';
echo'Niveau 10 - 1 victoire pour passer au niveau 11';
echo'<center><img src="http://x/site/image/fc/11-1.jpg" /></center>';
echo'Niveau 11 - 4 victoires pour passer au niveau 12';
echo'<center><img src="http://x/site/image/fc/12-4.jpg" /></center>';
echo'Niveau 11 - 3 victoires pour passer au niveau 12';
echo'<center><img src="http://x/site/image/fc/12-3.jpg" /></center>';
echo'Niveau 11 - 2 victoires pour passer au niveau 12';
echo'<center><img src="http://x/site/image/fc/12-2.jpg" /></center>';
echo'Niveau 11 - 1 victoire pour passer au niveau 12';
echo'<center><img src="http://x/site/image/fc/12-1.jpg" /></center>';
echo'Niveau 12 - 4 victoires pour passer au niveau 13';
echo'<center><img src="http://x/site/image/fc/13-4.jpg" /></center>';
echo'Niveau 12 - 3 victoires pour passer au niveau 13';
echo'<center><img src="http://x/site/image/fc/13-3.jpg" /></center>';
echo'Niveau 12 - 2 victoires pour passer au niveau 13';
echo'<center><img src="http://x/site/image/fc/13-2.jpg" /></center>';
echo'Niveau 12 - 1 victoire pour passer au niveau 13';
echo'<center><img src="http://x/site/image/fc/13-1.jpg" /></center>';
echo'Niveau 13 - 4 victoires pour passer au niveau 14';
echo'<center><img src="http://x/site/image/fc/14-4.jpg" /></center>';
echo'Niveau 13 - 3 victoires pour passer au niveau 14';
echo'<center><img src="http://x/site/image/fc/14-3.jpg" /></center>';
echo'Niveau 13 - 2 victoires pour passer au niveau 14';
echo'<center><img src="http://x/site/image/fc/14-2.jpg" /></center>';
echo'Niveau 13 - 1 victoire pour passer au niveau 14';
echo'<center><img src="http://x/site/image/fc/14-1.jpg" /></center>';*/


echo'</div>';
?>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>