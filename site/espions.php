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
<table width="1200">
  <tr>
    <th width="800px" style="background-color:#FFFFFF">
    <?php 
	if(isset($_GET['pseudo'])){
$pseudo = htmlspecialchars($_GET['pseudo']);
$quete = mysql_query("SELECT * FROM chateau WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);?>
<div style="margin-left:200px;margin-top:-300px;">Ce joueur   <?php echo $resultat['pseudo']; ?>    à     <?php echo $resultat['Spy']; ?>    espions.</div>
	<?php }else{ ?><div style="margin-left:200px;margin-top:-300px;">Merci de choisir le joueur avec le menu à droite. →→→→→</div>
	<?php } ?>
	
    
    
    
    </th>
    <th width="400px" style="background-color:#FFFFFF">
    
    
    <?php
$quete = mysql_query("SELECT * FROM chateau") or die(mysql_error());
while($donnees = mysql_fetch_array($quete)){
?>
    
    <br><li><a href="espions.php?pseudo=<?php echo $donnees['pseudo']; ?>"><?php echo $donnees['pseudo']; ?></a></li>
    
    
  <?php
} ?>
    
    
    
    </th>
  </tr>
</table>
</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>

