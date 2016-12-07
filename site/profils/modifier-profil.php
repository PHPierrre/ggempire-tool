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
include('../cssmenu/menu_source/index.php'); ?>
<?php   
$profil = htmlspecialchars($_GET['pseudo']);
$pseudo = $_SESSION['pseudo'];
if($profil == $pseudo){
$quete = mysql_query("SELECT emailp, skype, sweb, Signature, departement FROM validation WHERE pseudo='$pseudo';") or die(mysql_error());
while($d = mysql_fetch_array($quete)){
	?>
    <center><div style="background-color:#FFFFFF;width:1200px;">
    <form class="form-horizontal" method="post" action="action-profil.php">
	<h2>Modifier le profil de <?php echo $pseudo; ?></h2><br>
    
    <?php
	if($_GET['etat'] == 'nurl'){echo'<h4><font color="#FF0004">Votre url n\'est pas conforme ou non présente.</font></h4>';}
	elseif($_GET['etat'] == 'val'){echo'<h4><font color="0BC832">Profils Complété</font></h4>';}
	else{}
	?>
    
    <div class="form-group">
  <label class="col-md-4 control-label" for="emailp">Email publique(cette email pourras etre vu de tout les membres du site) :</label>  
  <div class="col-md-4">
  <input id="emailp" name="emailp" type="text" value="<?php echo $d['emailp']; ?>" class="form-control input-md">
    
  </div>
</div>
    
	<div class="form-group">
  <label class="col-md-4 control-label" for="skype">Skype :</label>  
  <div class="col-md-4">
  <input id="skype" name="skype" type="text" value="<?php echo $d['skype']; ?>" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="sweb">Site Web :</label>  
  <div class="col-md-4">
  <input id="sweb" name="sweb" type="text" value="<?php echo $d['sweb']; ?>" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="departement">Departement :</label>  
  <div class="col-md-4">
  <input id="departement" name="departement" type="text" value="<?php echo $d['departement']; ?>" class="form-control input-md">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Signature :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="textarea"><?php echo $d['Signature']; ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Valider ?</label>
  <div class="col-md-4">
    <button type="submit" id="singlebutton" class="btn btn-primary">Valider</button>
  </div>
</div>

</form></div></center>

	<?php }}
elseif($profil != $pseudo){echo'<center><div style="background-color:#FFFFFF;width:1200px;">Impossible de réaliser cette action</div<</center>';}
else{echo'<center><div style="background-color:#FFFFFF;width:1200px;">Erreur inconnu</div<</center>';}
?>

<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>