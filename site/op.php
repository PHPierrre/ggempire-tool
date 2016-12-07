<?php
include('bdd.php');
date_default_timezone_set('Europe/Paris');
$datet = date('d/m');
$pseudo = 'pierre151' ;
$date = mysql_query("SELECT * FROM pierre151 WHERE date =(SELECT MAX(date) FROM pierre151);");
$dated = mysql_fetch_array($date);
if($datet == $dated['date']){
	echo'Graphique deja actualisé';
}
else{
if($_COOKIE['pseudo']){
$pseudos = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudos = $_SESSION['pseudo'];	
}
$troupebbd['nombret'] = mysql_query("SELECT nombret FROM troupes WHERE pseudo='$pseudos'");
date_default_timezone_set('Europe/Paris');
$date = date('d/m');
mysql_query("INSERT INTO pierre151 (t, date) VALUES('$tr', '$date')");
	
}
?>