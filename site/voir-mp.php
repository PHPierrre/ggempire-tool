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
$id = htmlspecialchars($_GET['id']);
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}


		
?>
<br>
<center>
<div style="border-radius:3px; width:1200px;background-color:#FFFFFF;">
<?php 
$quete = mysql_query("SELECT envoi, desti FROM message WHERE id='$id';") or die(mysql_error());
while($don = mysql_fetch_array($quete)){ 
$envoi = $don['envoi'];
$desti = $don['desti'];
if($pseudo == $envoi OR $pseudo == $desti){
?>
<table width="1200" border="0">
  <tbody>
    <tr>
      <td width="200px">
      <div style="margin-left:40px;">
      <a href="messagerie.php?ou=rum" title="Rédiger un message">Rédiger un message</a><br><br>
      <a href="messagerie.php?ou=bdr" title="Boite de réception">Boite de réception</a><br><br>
      <a href="messagerie.php?ou=bde" title="Boite d'envoi">Boite d'envoi</a>
      </div>
      
      
      </td>
      <?php if($pseudo == $desti){
	  $quete = mysql_query("UPDATE message SET lu ='0' WHERE id='$id';");} ?>
      
       <td width="1000">
       <?php $quete = mysql_query("SELECT desti, titre, message, time FROM message WHERE id='$id' AND (envoi='$pseudo' OR desti='$pseudo');") or die(mysql_error());
	   while($don = mysql_fetch_array($quete)){ ?>
       <span style="width:1000px;">Pour : <?php echo $don['desti']; ?> <span style="margin-left:750px;text-align:right"><?php echo $don['time']; ?></span>
       <br><center><h3><?php echo $don['titre']; ?></h3></center>
       <br>
       <div style="height:auto;min-height:500px; border-color:#000000; border:solid; border-width:1px;border-radius:5px;"><div style="margin-left:50px;"><?php echo $don['message'];?></div></div>
       <?php if($pseudo == $desti){ ?>
       <table width="800" border="0">
  <tbody>
    <tr>
      <td><span><a href="messagerie.php?ou=rum&pseudo=<?php echo $envoi; ?>&titre=<?php echo $don['titre']; ?>">Répondre</a></span></td>
      <td><span><a href="mp-delete.php?delete=<?php echo $id; ?>">Supprimer</a></span></td>
    </tr>
  </tbody>
</table> 
<?php } ?>

<?php } ?>
      </td>
      
    </tr>
  </tbody>
</table>



<?php }} ?>
</div>
</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>