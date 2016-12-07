<?php
// Connexion à la base de données
include('bdd.php');
// Insertion du message à l'aide d'une requête préparée
$pseudo = htmlspecialchars($_POST['pseudo']);
$message= htmlspecialchars($_POST['message']);
date_default_timezone_set('Europe/Paris');
$date = date('H:i');

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


mysql_query("INSERT INTO minichat (pseudo, message, date) VALUES('$pseudo', '$message', '$date')");
// Redirection du visiteur vers la page du minichat
header('Location: accueil.php#chat');
echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="http://x/site/accueil.php#chat" 
</SCRIPT>';
?>
Si vous n'êtes pas redirigés automatiquement appuyer ici : 
<a href="accueil.php#chat" title="redirection">Redirection</a>
