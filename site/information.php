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
?>
<?php include('cssmenu/menu_source/index.php'); ?>
<center>
<div style="background-color:#FFFFFF;width:900px;">
<h1>Informations sur le site : </h1>
</div>
<br /><br />
Site en version : 2.0.3
<br /><br />
<div style="background-color:#FFFFFF;width:600px;">
Ce site comporte 3 outils : <br />
Carte : le grand empire et glacier etarnel <br />
troupes avec l'outils admin	<br />
L'ouitls espion<br />
<br>
<br>
Votre site web a été construit avec 6 languages informatiques :  <br>
<img height="100" width="130" src="http://x/site/image/info/HTML5.png" />
<img height="100" width="110" src="http://x/site/image/info/css3.svg" />
<img height="100" width="150" src="http://x/site/image/info/javascript.png" />
<img height="100" width="150" src="http://x/site/image/info/ajax.jpg" />
<img height="100" width="150" src="http://x/site/image/info/php.png" />
<img height="100" width="150" src="http://x/site/image/info/mysql.png" />
<br /><br />
Le html pour vos liens, texte, ...<br />
Le css pour la couleur, le style, le positionnement de tout<br />
Le javascript pour le chat , le style qui bouge et s'annime<br />
L'ajax pour l'actualisation du chat<br />
Le php pour la connexion,les outils troupes,espions,message, ... <br />
Le mysql , pour la base de donnes ou beaucoup d'informations y sont stockées<br />
</div>




</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>

