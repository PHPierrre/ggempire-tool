<?php
session_start();
//je me connecte a la base de donnee
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
$pseudo = $_SESSION['pseudo'];

     

$type = mysql_real_escape_string(htmlspecialchars(trim($_POST['type'])));

if(eregi("^[0-9]{5}$",$nombre1)){$nombre1 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre1'])));}
if(eregi("^[0-9]{5}$",$nombre2)){$nombre2 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre2'])));}
if(eregi("^[0-9]{5}$",$nombre3)){$nombre3 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre3'])));}
if(eregi("^[0-9]{5}$",$nombre4)){$nombre4 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre4'])));}
if(eregi("^[0-9]{5}$",$nombre5)){$nombre5 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre5'])));}
if(eregi("^[0-9]{5}$",$nombre6)){$nombre6 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre6'])));}
if(eregi("^[0-9]{5}$",$nombre7)){$nombre7 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre7'])));}
if(eregi("^[0-9]{5}$",$nombre8)){$nombre8 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre8'])));}
if(eregi("^[0-9]{5}$",$nombre9)){$nombre9 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre9'])));}
if(eregi("^[0-9]{5}$",$nombre10)){$nombre10 = mysql_real_escape_string(htmlspecialchars(trim($_POST['nombre10'])));}

$troupes1 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes1'])));
$troupes2 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes2'])));
$troupes3 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes3'])));
$troupes4 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes4'])));
$troupes5 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes5'])));
$troupes6 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes6'])));
$troupes7 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes7'])));
$troupes8 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes8'])));
$troupes9 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes9'])));
$troupes10 = mysql_real_escape_string(htmlspecialchars(trim($_POST['troupes10'])));
$lieu = mysql_real_escape_string(htmlspecialchars(trim($_POST['lieu'])));

if($type == 1){$type = 'off';$quete11 = mysql_query("UPDATE troupes SET type ='$type' WHERE pseudo='$pseudo' AND ou='$lieu';");}
elseif($type == 2){$type = 'def';$quete11 = mysql_query("UPDATE troupes SET type ='$type' WHERE pseudo='$pseudo' AND ou='$lieu';");}
elseif($type == 3){$type = 'off/def';$quete11 = mysql_query("UPDATE troupes SET type ='$type' WHERE pseudo='$pseudo' AND ou='$lieu';");}
elseif($type == 4){$type = 'farmer';$quete11 = mysql_query("UPDATE troupes SET type ='$type' WHERE pseudo='$pseudo' AND ou='$lieu';");}
else{$type = '';}


$quete1 = mysql_query("UPDATE troupes SET $troupes1 ='$nombre1' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete2 = mysql_query("UPDATE troupes SET $troupes2 ='$nombre2' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete3 = mysql_query("UPDATE troupes SET $troupes3 ='$nombre3' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete4 = mysql_query("UPDATE troupes SET $troupes4 ='$nombre4' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete5 = mysql_query("UPDATE troupes SET $troupes5 ='$nombre5' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete6 = mysql_query("UPDATE troupes SET $troupes6 ='$nombre6' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete7 = mysql_query("UPDATE troupes SET $troupes7 ='$nombre7' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete8 = mysql_query("UPDATE troupes SET $troupes8 ='$nombre8' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete9 = mysql_query("UPDATE troupes SET $troupes9 ='$nombre9' WHERE pseudo='$pseudo' AND ou='$lieu';");
$quete10 = mysql_query("UPDATE troupes SET $troupes10 ='$nombre10' WHERE pseudo='$pseudo' AND ou='$lieu';");
;
?>
<meta charset="utf-8">
<?php
echo'<SCRIPT LANGUAGE="JavaScript">alert("Vos troupes ont bien été ajouté ! cliquer sur ok pour continuer.");</SCRIPT>';

$page = $_SERVER['HTTP_REFERER'];
echo'<SCRIPT LANGUAGE="JavaScript">
document.location.href="'.$page.'" 
</SCRIPT>';

}
else{include('noco.php');}
}
else{include('noco.php');}

?>
