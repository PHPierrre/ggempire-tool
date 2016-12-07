<?php 
session_start();
if($_COOKIE['pseudo'] OR ($_SESSION['pseudo'])){
echo "

<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<link href='cssmenu/menu_source/styles.css' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css' />
<title>Carte du Grand Empire</title>
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>


    <script type=\"text/javascript\" src=\"//www.google.com/jsapi\"></script>
    <script type=\"text/javascript\">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type='text/javascript'>
      function drawVisualization() {
          var data = google.visualization.arrayToDataTable([
            ['Joueur','latitude','lontitude','Niveau','taille'],
			['TanguyUser9', 963,-855,'70',70],
			['TanguyUser9', 964,-853,'70',70],
			['TanguyUser9', 965,-854,'70',70],
			['TanguyUser9', 960,-851,'70',70],
            ['calaos', 927,-853,'65',65],
			['calaos', 928,-854,'65',65],
			['calaos', 926,-846,'65',65],
			['calaos', 924,-848,'65',65],
			['Ivanoe', 926,-871,'69',69],
			['Ivanoe', 926,-873,'69',69],
			['Ivanoe', 928,-869,'69',69],
			['Ivanoe', 926,-873,'69',69],
			['Jim26', 956,-847,'56',56],
			['Jim26', 953,-843,'56',56],
			['Jim26', 955,-843,'56',56],
			['Jim26', 957,-843,'56',56],
			['rambo 5', 946,-850,'68',68],
			['rambo 5', 945,-848,'68',68],
			['rambo 5', 942,-853,'68',68],
			['rambo 5', 949,-846,'68',68],
			['Chani Kynes', 964,-847,'50',50],
			['Chani Kynes', 964,-849,'50',50],
			['Chani Kynes', 963,-848,'50',50],
			['Chani Kynes', 963,-846,'50',50],
			['bof33', 931,-843,'50',50],
			['bof33', 933,-843,'50',50],
			['bof33', 926,-839,'50',50],
			['bof33', 924,-841,'50',50],
			['alexonie', 941,-859,'42',42],
			['alexonie', 925,-869,'42',42],
			['alexonie', 933,-885,'42',42],
			['alexonie', 940,-849,'42',42],
			['prurit', 930,-830,'34',34],
			['prurit', 949,-822,'34',34],
			['prurit', 954,-835,'34',34],
			['prurit', 932,-837,'34',34],
			['ashura46', 967,-849,'54',54],
			['ashura46', 963,-850,'54',54],
			['ashura46', 973,-853,'54',54],
			['ashura46', 951,-853,'54',54],
			['lukerking', 937,-846,'35',35],
			['janou12', 979,-823,'33',33],
			['janou12', 980,-822,'33',33],
			['janou12', 983,-823,'33',33],
			
			['max547', 954,-821,'12',12],
			
			
          
          ]);
      
          var options = {
            title: 'Position des membres',
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
  <body  style='font-family: Arial;border: 0 none;'>";

include('cssmenu/menu_source/index.html'); 
echo '<div id="visualization" style="width:2000px;height:900px;margin-top:0px; margin-left:-200px;"></div>';
include('cont.php'); }
else{
	include('noco.php');
	}
?>