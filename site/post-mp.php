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
date_default_timezone_set('Europe/Paris');
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}	
if(isset($_POST['desti'])){
$desti = htmlspecialchars($_POST['desti']);
$envoi = $pseudo;
$lu = '1';	
if(isset($_POST['titre'])){
$titre = htmlspecialchars($_POST['titre']);
if(isset($_POST['message'])){
$message = $_POST['message'];
$date = date('d m y \à H:i');	
}else{
	echo'<SCRIPT LANGUAGE="JavaScript">document.location.href="http://x/site/messagerie.php?confirm=titre"</SCRIPT>';
	exit;}
	
}
else{
	echo'<SCRIPT LANGUAGE="JavaScript">document.location.href="http://x/site/messagerie.php?confirm=msg"</SCRIPT>';
	exit;}
}else{
	echo'<SCRIPT LANGUAGE="JavaScript">document.location.href="http://x/site/messagerie.php?confirm=desti"</SCRIPT>';
	exit;
	}
$message = str_replace(':/', '<img src="http://x/site/image/smilies/4.gif" />', $message);
$message = str_replace(';)', '<img src="http://x/site/image/smilies/5.gif" />', $message);
$message = str_replace(':O', '<img src="http://x/site/image/smilies/6.gif" />', $message);
$message = str_replace('mdr', '<img src="http://x/site/image/smilies/7.gif" />', $message);
$message = str_replace('degage', '<img src="http://x/site/image/smilies/8.gif" />', $message);
$message = str_replace(';(', '<img src="http://x/site/image/smilies/9.gif" />', $message);
$message = str_replace(':.', '<img src="http://x/site/image/smilies/10.gif" />', $message);
$message = str_replace(':))', '<img src="http://x/site/image/smilies/1.gif" />', $message);
$message = str_replace(':[', '<img src="http://x/site/image/smilies/2.gif" />', $message);
$message = str_replace(':D', '<img src="http://x/site/image/smilies/3.gif" />', $message);
$message = str_replace('lsms', '<img src="http://x/site/image/smilies/11.gif" />', $message);
$message = str_replace('!', '<img src="http://x/site/image/smilies/12.gif" />', $message);
$message = str_replace('?', '<img src="http://x/site/image/smilies/14.gif" />', $message);
$message = str_replace('+1', '<img src="http://x/site/image/smilies/001.gif" />', $message);
$message = str_replace('merci', '<img src="http://x/site/image/smilies/002.gif" />', $message);
$message = str_replace('adminyes', '<img height="55" width="70" src="http://x/site/image/smilies/003.gif" />', $message);
$message = str_replace('o_O', '<img src="http://x/site/image/smilies/004.gif" />', $message);
$message = str_replace('aielemur', '<img src="http://x/site/image/smilies/005.gif" />', $message);
$message = str_replace('horsujet', '<img src="http://x/site/image/smilies/006.gif" />', $message);
$message = str_replace('svp', '<img src="http://x/site/image/smilies/007.gif" />', $message);
$message = str_replace('idea', '<img src="http://x/site/image/smilies/008.gif" />', $message);
$message = str_replace('nosms', '<img src="http://x/site/image/smilies/009.gif" />', $message);
$message = str_replace('&lt;', '<', $message);
$message = str_replace('&gt;', '>', $message);
$message = str_replace("\n", "<br />", $message);


mysql_query("INSERT INTO message (envoi, desti, message, lu, time, titre, id) VALUES('$envoi', '$desti', '$message' , '$lu', '$date', '$titre', '')");
// Redirection du visiteur vers la page du message envoyé
header('Location: accueil.php#chat');
echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="http://x/site/messagerie.php?confirm=ok" 
</SCRIPT>';
?>
Si vous n'êtes pas redirigés automatiquement appuyer ici : 
<a href="messagerie.php?confirm=ok" title="redirection">Redirection</a>
<?php	
	
	
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>