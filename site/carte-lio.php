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

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<link href='cssmenu/menu_source/styles.css' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css' />
<title>Carte des îles orageuses</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>


<script type="text/javascript" src="//www.google.com/jsapi"></script>
<script type="text/javascript">
google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type='text/javascript'>
function drawVisualization() {
var data = google.visualization.arrayToDataTable([
['Joueur','latitude','lontitude','Niveau','taille'],
<?php
$reponse = mysql_query("SELECT * FROM carte-lio ") or die(mysql_error());
while($tout = mysql_fetch_array($reponse))
{

?>
['<?php echo $tout['pseudo'];?>',<?php echo $tout['po1'];?>,<?php echo $tout['po2'];?>,'<?php echo $tout['niv'];?>',<?php echo $tout['taille'];?>],
			<?php } ?>          ]);
      
          var options = {
			title: 'Position des membres (clic droit : reseter ma position ; tracé un rectangle avec clic gauche pour zoomer).',
			explorer: {actions: ['dragToZoom', 'rightClickToReset'] },
			hAxis: {title: 'latitude'},
            vAxis: {title: 'longitude'},
            bubble: {textStyle: {fontSize: 11}}
          };
      
          // Create and draw the visualization.
          var chart = new google.visualization.BubbleChart(
              document.getElementById('visualization'));
          chart.draw(data, options);
      }
      
       
      google.setOnLoadCallback(drawVisualization);
    </script>
	

  </head>
  <body  style='font-family: Arial;border: 0 none;'>

<?php include('cssmenu/menu_source/index.php');  ?>
<div id="visualization" style="width:2000px;height:900px;margin-top:0px; margin-left:-200px;">
</div>
<?php
}else{include('noco.php');}
}else{include('noco.php');}

?>