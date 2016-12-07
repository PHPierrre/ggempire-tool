<?php
session_start(); 
//information connection à la  base de donnée
include('bdd.php');
 
//vérification des mots de passe
$pass1 = mysql_real_escape_string(htmlspecialchars($_POST['pass1'])) ;
$pass2 = mysql_real_escape_string(htmlspecialchars($_POST['pass2'])) ;

//recupération des informtions
$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo'])) ;
$mail = mysql_real_escape_string(htmlspecialchars($_POST['mail'])) ;

include('txt1.php');
if(isset($_POST['pass1'])){
if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $mail))
{
	
if($pass1 == $pass2){
// Hachage du mot de passe
$pass3 = sha1($pass2);
//Envoi du mot de passe à la bdd
mysql_query("INSERT INTO validation (id, pseudo, pass, email) VALUES('2', '$pseudo', '$pass3', '$mail')");
//email
$de_nom = "Administrateur de x"; //Nom de l'envoyeur
$de_mail = "admin@x"; //Email de l'envoyeur
$vers_nom = $pseudo; //Nom du receveur
$vers_mail = $mail; //Email du receveur
$sujet = "Votre inscription"; //Sujet du mail
//Message :
$message = " 
Bonjour $pseudo
<br>
Merci de vous être inscrit sur le site de l'alliance x.<br>
Un administrateur passera accepter votre compte.
<br>
----------------------------------------------------------------------------
<br>
Pseudo : $pseudo
<br>
Mot de passe : $pass2
<br>
Votre email : $mail
<br>
----------------------------------------------------------------------------
<br>
Merci de garder cet email précieusement , vous pourrez toutefois utiliser la fonction \"Mot de passe oublié\" si c'est le cas
<br>Pour vous connectez , c'est par ici des que l'admin aura activé votre compte, vous recevrez une confirmation sur le jeu des que votre compte sera activé.
<br>
<a href='http://x/site/connect.php'>http://x/site/connect.php</a>
<br>
Pierre151 , Alliance xs
";
/** Envoi du mail **/
$entete = "MIME-Version: 1.0\r\n";
$entete .= "Content-type: text/html; charset=UTF-8\r\n";
$entete .= "To: $vers_mail <$vers_mail>\r\n";
$entete .= "From: $de_nom <$de_mail>\r\n";

if(!mail($vers_mail, $sujet, $message, $entete)){echo "<script>alert('L\'email n'a pu être envoyé à $vers_mail<br>');</script>";} 
else{echo "<script>alert('Un email a  été evoyé à $vers_mail');</script>";}
echo "<script>alert('Votre inscritpion a ete prise en compte!');</script>";
echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="http://x/" 
</SCRIPT>';}
else{echo "<script>alert('Les deux mots de passe que vous avez saisi ne correspondent pas!');</script>";}
}else{echo "<script>alert('Adresse email incorect');</script>";echo'<SCRIPT LANGUAGE="JavaScript">document.location.href="http://x/site/inscription.php"</SCRIPT>';}


}
else{}
?>