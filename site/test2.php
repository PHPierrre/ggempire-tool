<html>
  <head>
    <meta http-equiv='content-type' content='text/html; charset=utf-8'/>
    <title>
      ???~~####é'(-??
    </title>
    <script type='text/javascript' src='//www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type='text/javascript'>
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
                  ['date', 'nombre de troupes'],
				  <?php
include('bdd.php');
date_default_timezone_set('Europe/Paris');
$date = date('d m y \à H:i');
mysql_query("INSERT INTO pierre151 (t, date) VALUES('10', '$date')");

//$pseudo = 'pierre151'; 
$pseudo = $_COOKIE['pseudo'];
$reponse = mysql_query("SELECT * FROM $pseudo") or die(mysql_error());
while($tout = mysql_fetch_array($reponse))
{ ?>
				  
				  
		['<?php echo $tout['date'];?>', <?php echo $tout['t'];?> ],
		  
		  <?php } ?>]);
        
        new google.visualization.LineChart(document.getElementById('visualization')).
            draw(data, {curveType: 'function',
                        width: 500, height: 400,
                        vAxis: {maxValue: 10}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>
  <body style='font-family: Arial;border: 0 none;'>
    <div id='visualization' style='width: 500px; height: 400px;'></div>
  </body>
  </html>
<?php
  if($_COOKIE['pseudo']){
  $pseudo = $_COOKIE['pseudo'];
  echo"cookie bon";
  ;}
  elseif($_SESSION['pseudo']){
      echo"session bon";
      $pseudo = $_SESSION['pseudo'];
      }
  else{echo"erreur cookie";}
  ?>