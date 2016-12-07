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
?>
<head>
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css ' />
<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.5.0/pure-min.css'>
</head>
<body id='t' style='font-family: Arial;border: 0 none;'>
<?php include('../cssmenu/menu_source/index.php'); 
//recup des donnes a la base de donné
	$reponse = mysql_query('SELECT pseudo, gradej, grades, emailp, departement, skype, sweb, signature FROM validation WHERE pseudo=\'lord M\'') or die(mysql_error());?>
	<center><div id="c"><center>
<table class="pure-table">
<thead></thead>
<tbody>
<?
	while ($donnees = mysql_fetch_array($reponse)) { 
		echo"
		<tr class=\"pure-table-odd\">
			<td>Pseudo :</td>
			<td>{$donnees['pseudo']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
		    <td>Grade sur le jeu :</td>
		    <td>{$donnees['gradej']}</td>
		</tr>
		
		<tr class=\"pure-table-odd\">
			<td>Grade sur le site : </td>
			<td>{$donnees['grades']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
			<td>E-mail publique : </td>
			<td>{$donnees['emailp']}</td>
		</tr>
		
		<tr class=\"pure-table-odd\">
			<td>Habite :  </td>
			<td>{$donnees['departement']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
			<td>Skype : </td>
			<td>{$donnees['skype']}</td>
		</tr>
		
		<tr class=\"pure-table-odd\">
			<td>Site web :  </td>
			<td>{$donnees['sweb']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
			<td>Signature : </td>
			<td>{$donnees['signature']}</td>
		</tr>
		";
	}
?>
	</tbody>
	</table>


	</center>
    <?
	if($_SESSION['pseudo'] == 'lord M'){
?>
   <center> <a href="">Modifier mon profil</a></center>
    <?php } ?></div></center> 
    <?
include('../cont.php');
}else{include('../noco.php');}
}else{include('../noco.php');}

?>