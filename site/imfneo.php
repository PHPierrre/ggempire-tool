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
?> 
<center>
<div style="background-color:#FFFFFF;width:1200px;">

<?php
echo'<center><img src="http://x/site/image/0001.PNG" /></center>';
echo'<center><img src="http://x/site/image/0002.PNG" /></center>';
echo'<center><img src="http://x/site/image/0003.PNG" /></center>';
echo'<center><img src="http://x/site/image/0004.PNG" /></center>';
echo'<center><img src="http://x/site/image/0005.PNG" /></center>';
echo'<center><img src="http://x/site/image/0006.PNG" /></center>';
echo'<br>';
?>
</div>
</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}
?>