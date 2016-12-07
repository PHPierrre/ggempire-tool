<?php 
session_start();

if($_COOKIE['pseudo'] OR ($_SESSION['pseudo'])){

include('../bdd.php');
	echo "
		<head>
		<meta charset='utf-8'>
		<link rel='stylesheet' type='text/css' href='http://x/styles/styles-b.css ' />
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.5.0/pure-min.css'>
	</head>
	<body id='t' style='font-family: Arial;border: 0 none;'>";
	include('../cssmenu/menu_source/index.html'); 

	//recup des donnes a la base de donné
	$reponse = mysql_query('SELECT * FROM validation WHERE pseudo=\'feufeu006\'') or die(mysql_error());

	echo "
	<center><div id=\"c\"><center>
	<table class=\"pure-table\">
	<thead>
		
	</thead>

	<tbody>
	";

	while ($donnees = mysql_fetch_array($reponse)) { 
		echo"
		<tr class=\"pure-table-odd\">
			<td>Pseudo :</td>
			<td>{$donnees['pseudo']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
		    <td>Grade sur le jeu :</td>
		    <td>{$donnees['gradej']}</td>
		</tr>
		
		<tr class=\"pure-table-odd\">
			<td>Grade sur le site : </td>
			<td>{$donnees['grades']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
			<td>E-mail publique : </td>
			<td>{$donnees['emailp']}</td>
		</tr>
		
		<tr class=\"pure-table-odd\">
			<td>Habite :  </td>
			<td>{$donnees['departement']}</td>
		</tr>
		
		<tr class=\"pure-table pure-table-bordered\">
			<td>Skype : </td>
			<td>{$donnees['skype']}</td>
		</tr>
		";
	}

	echo "
	</tbody>
	</table>


	</center></div></center> 
	";

}
else {
	include('../noco.php');
}
?>