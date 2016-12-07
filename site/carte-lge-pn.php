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
			['HeroVince34', 943,-822,'28',28],
			  ['HeroVince34', 943,-825,'28',28],
			  ['HeroVince34', 934,-825,'28',28],
			['Pierre151', 970,-843,'34',34],  
			  ['Pierre151', 929,-840,'34',34],
			  ['Pierre151', 930,-842,'34',34],
			  ['Pierre151', 952,-853,'34',34],
            ['Elsa45', 938,-815,'40',40], 
              ['Elsa45', 945,-814,'40',40],
			  ['Elsa45', 945,-809,'40',40],
			  ['Elsa45', 973,-842,'40',40],
			['Kpout', 946,-815,'32',32],  
			  ['Kpout', 954,-814,'32',32],
			  ['Kpout', 947,-816,'32',32],
			['sys-007', 958,-819,'31',31], 
			  ['sys-007', 952,-814,'31',31],
			  ['sys-007', 952,-833,'31',31],
			['Gauth84', 985,-854,'29',29],
			  ['Gauth84', 929,-847,'29',29],
			  ['Gauth84', 931,-853,'29',29], 
			['Illig', 937,-807,'29',29],  
			  ['Illig', 930,-802,'29',29],
			  ['Illig', 934,-815,'29',29],
			['michael12240', 923,-806,'33',33], 
			  ['michael12240', 925,-822,'33',33], 
			  ['michael12240', 962,-815,'33',33],
			['Yanisdu26', 990,-855,'16',16],
			  ['Yanisdu26', 973,-845,'16',16],
			['fang', 929,-819,'19',19],  
			['fang', 923,-812,'19',19],
			['destruc', 927,-829,'29',29],
			['destruc', 939,-833,'29',29],
			['destruc', 938,-847,'29',29],
			['Damien Maas', 946,-811,'33',33],
			['Damien Maas', 941,-809,'33',33],
			['Damien Maas', 947,-814,'33',33],
			['cheriff001', 949,-831,'19',19],
			['cheriff001', 954,-825,'19',19],
			['vivi 007', 940,-808,'29',29],
			['vivi 007', 938,-809,'29',29],
			['vivi 007', 939,-802,'29',29],
			['g1adoff', 970,-783,'31',31],
			['g1adoff', 968,-792,'31',31],
			['g1adoff', 965,-788,'30',30],
		['Arthur2Player', 932,-828,'21',21],
			['Arthur2Player', 938,-830,'21',21],
			['Arthur2Player', 932,-828,'21',21],
			['Arthur2Player', 929,-821,'21',21],
			['behemothe', 964,-820,'13',13],
			['lolo77160', 913,-817,'33',33],
			['lolo77160', 915,-816,'33',33],
			['lolo77160', 926,-817,'33',33],
			['lolo77160', 912,-811,'33',33],
			['raptor5', 963,-784,'21',21],
			['raptor5', 964,-783,'21',21],
			['franci', 921,-828,'38',38],
			['franci', 925,-826,'38',38],
			['franci', 927,-820,'38',38],
			['franci', 917,-816,'38',38],
			['gregtkd', 944,-813,'25',25],
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
echo '<div id="visualization" style="width:2000px;height:900px;margin-top:0px; margin-left:-200px;">
</div>'; 
include('cont.php');}
else{
	include('noco.php');
	}
	
/*if($_SESSION['pseudo']){
	echo"session ok ".$_SESSION['pseudo']."<br>";}
	
	else{echo'erreur total de sessions '.$_SESSION['pseudo'].'<br>';}
if($_COOKIE['pseudo']){
	echo'cookie ok '.$_COOKIE['pseudo'].'<br>';}
else{echo'erreur total de cookie'.$_COOKIE['pseudo'].'';}

echo'<br>'.$_SESSION['pseudo'] ;*/

?>