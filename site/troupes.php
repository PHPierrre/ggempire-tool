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
<?php include('cssmenu/menu_source/index.php'); ?>
<?php
$pseudos = $_SESSION['pseudo'];
if(!empty($_GET['name'])){
if(isset($_GET['name'])){
$lieu = htmlspecialchars($_GET['name']);
}}?>
<?php ?>
<?php
$quete = mysql_query("SELECT * FROM chateau WHERE pseudo='$pseudos';") or die(mysql_error());
while($donnees = mysql_fetch_array($quete)){
?>
<body>
<br>
<center><h2>Gestionnaire de troupes : <?php echo $lieu;?></h2></center>
<?php 
if($pseudos == $donnees['pseudo']){
if($lieu == $donnees['Chateau'] || $lieu == $donnees['avp1'] || $lieu == $donnees['avp2'] || $lieu == $donnees['avp3'] || $lieu == $donnees['chateaui'] || $lieu == $donnees['chateaug']){
$voir = mysql_query("SELECT * FROM troupes WHERE pseudo='$pseudo' AND ou='$lieu';");
$base = mysql_fetch_array($voir);

$result = $base['Piquier'] + $base['Archerléger'] + $base['Porteurdemasse'] + $base['Arbalétrier'] + $base['Epéiste']  + $base['Archer']  + $base['Hallebardier']  + $base['Archerlong']  + $base['Epéeàdeuxmains']  + $base['Arbalétrierlourd'] + $base["Massedelombre"] + $base['Arbalétrierdelombre'] + $base["Fripouilledelombre"] + $base["Félondelombre"] + $base['Scélératdelombre']  + $base["Vauriendelombre"] + $base['Pyrommane'] + $base['Pyromanevétéran'] + $base['Maraudeur'] + $base['Maitrepilleurvétéran'] + $base['Porteurdemassevétéran'] + $base['Arbalétriervétéran'] + $base['Piquiervétéran'] + $base['Archerlégervétéran'] + $base['Epéistevétéran'] + $base['Chevaliererrant'] + $base['Arbalétriererrant'] + $base['Chevalierdelagarderoyale'] + $base['Arbalétrierdelagarderoyale'] + $base['Sentinelledelagarderoyale'] + $base['Archerdudésertrenégat'] + $base['Eclaireurdelagarderoyale'] + $base['Scandinaveavechache'] + $base['Scandinaveavecarc'] + $base['Archerscandinaverenégat'] + $base['Guerrierscandinave renégat'] + $base['Barbare'] + $base['Chienloup'] + $base['loupferoce'] + $base['Archerdudésertrenégat'] + $base['Sabreurdudésertrenégat'] + $base['Archerdudésert'] + $base['Archercomposite'] + $base['Porteurdeflamme'] + 
$base['Archerlégersquelette'] + $base['Archerours'] + $base['Guerrierours'] + $base['Archerlion'] + $base['Boeufarcherlong'] + $base['Hallebardierbovin'] + $base['Archerduculterenégat'] + $base['Guerrierduculterenégat'] + $base['Pirateabordeur'] + $base['Eventreurdesmers'] + $base['Tentacule'] +  $base['Frondeur'] + $base['Sabreurs'] + $base['Lanciers'] + $base['Lanceursdejavelots'] + $base['GardesduKhan'] + $base['Assassin'] + $base['Tueurdedémons'] + $base['Guerrierdentderequinrenégat'] + $base['Ecrasepierrerenégat'] + $base['Horreurdémoniaque'];

$quete = mysql_query("UPDATE troupes SET nombret ='$result' WHERE pseudo='$pseudo' AND ou='$lieu';");
	
	
	?>
<center>
<table width="75%" style="border:none;" height="3000px">
  <tr style="border:none;" >
    <th width="800px" style="border:none;">

<script language="javascript" type="text/javascript">
/*if (confirm("Cette page est actuellement en maintenance, si vous pouviez revenir lundi 21 juillet 2014 et regarder le résultat, sa serais top! Merci , Pierre ")){
	 
}
else{document.location.href="accueil.php"}*/

function bascule(elem)
   {
   etat=document.getElementById(elem).style.display;
   if(etat=="none"){
   document.getElementById(elem).style.display="block";
   }
   else{
   document.getElementById(elem).style.display="none";
   }
   }
</script>
<div style="background-color:#FFFFFF;width:100%;border-radius:3px;cursor:pointer;">
<a style="margin-left:10px;text-decoration:none; " class="glyphicon glyphicon-chevron-down" onclick="bascule('1'); return false;">Graphique de vos troupes pour votre chateau du Grand Empire              Open / Close</a>
<div id='1'  style='display:none;'>
 
    
    <script type='text/javascript' src='//www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type='text/javascript'>
      function drawVisualization() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
                  ['Date', 'Nombre de troupes'],
				  <?php
 
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}
$reponse = mysql_query("SELECT * FROM $pseudo") or die(mysql_error());
while($tout = mysql_fetch_array($reponse))
{ ?>
				  
				  
		['<?php echo $tout['date'];?>', <?php echo $tout['t'];?> ],
		  
		  <?php } ?>]);
        
        new google.visualization.LineChart(document.getElementById('visualization')).
            draw(data, {curveType: 'function',
                        width: 700, height: 400,
                        vAxis: {maxValue: 30}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>   
  <body style='font-family: Arial;border: 0 none;'>
    <div id='visualization' style='width: 700px; height:400px;'></div>
</div>
</div>
<br>
<div style="background-color:#FFFFFF;width:100%;border-radius:3px;">

<form class="form-horizontal" action="add-troupes.php" method="post">

<fieldset style="border:none;">

<!-- Form Name -->
<center><legend>Vos troupes :</legend></center>

<!-- Multiple Radios -->
<div class="form-group">
  <label  class="col-md-4 control-label" for="type">Type :</label>
  <div class="col-md-6">
  <div class="radio">
    <label for="type-0">
      <input type="radio" name="type" id="type-0" value="1">
      Offensif (troupes avec attaques)
    </label>
	</div>
  <div class="radio">
    <label for="type-1">
      <input type="radio" name="type" id="type-1" value="2">
      Défensif (troupes qui défend)
    </label>
	</div>
  <div class="radio">
    <label for="type-2">
      <input type="radio" name="type" id="type-2" value="3">
      Off/def (produit les deux)
    </label>
	</div>
  <div class="radio">
    <label for="type-3">
      <input type="radio" name="type" id="type-3" value="4">
      Farmer(qui produit des ressources)
    </label>
	</div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 1 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre1" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes1" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 2 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre2" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes2" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 3 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre3" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes3" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 4 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre4" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes4" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 5 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre5" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes5" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 6 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre6" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes6" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 7 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre7" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes7" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 8 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre8" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes8" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 9 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre9" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes9" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    <div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Troupes 10 :</label>  
  <div class="col-md-2">
  <input id="textinput" name="nombre10" type="text" placeholder="" class="form-control input-md">  
</div><div class="col-md-4">
<select id="selectbasic" name="troupes10" class="form-control">
      <?php include('re.html'); ?>
    </select>
    </div></div>
    
<!--<script>
function create_champ(i) {

var i2 = i + 1;

document.getElementById('leschamps_'+i).innerHTML = '<div class="form-group"><label class="col-md-4 control-label" for="textinput">Troupes : </label><div class="col-md-2"><input id="textinput" name="nombre" type="text" placeholder="" class="form-control input-md"></div><div class="col-md-4"><select id="selectbasic" name="troupes" class="form-control"></select></div></div>';
document.getElementById('leschamps_'+i).innerHTML += (i <= 10) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter un champs troupes</a></span>' : '';


}
</script>
<span id="leschamps_4"><a href="javascript:create_champ(4)">Ajouter un champs troupes</a></span>-->
<script type="text/javascript"> 
<!-- 
function BoutonDroit() 
{ 
if((event.button==2)||(event.button==3)||(event.button==4)) 
alert('Le bouton droit de la souris à été desactivé'); 
} 
document.onmousedown=BoutonDroit; 

//--> 
</script>
<input type="hidden" name="lieu" value="<?php echo $lieu;?>">
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Confirmer : </label>
  <div class="col-md-4">
    <button id="singlebutton"  name="singlebutton" class="btn btn-success">Envoyer</button>
  </div>
</div>

</fieldset>
</form>
</div>

<?php 
$page = $_SERVER['HTTP_REFERER'];
$actu = 'http://x/site/add-troupes.php';
if($page = $actu){?>
<div style="margin-top:3471px;"></div>
<?php
}
else{?>
<div style="margin-top:3171px;"></div>
<?php
}
?>


</th>

<th width="400px" style="background-color:#FFFFFF; position:absolute">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<?php
if(isset($_GET['name'])){
?>
<?php
$quet = mysql_query("SELECT * FROM troupes WHERE pseudo='$pseudos' AND ou='$lieu';") or die(mysql_error());
while($troupes = mysql_fetch_assoc($quet)){
?>	

<table class="pure-table">
<tbody>



<tr>
<td>Troupes :</td>
<td><?php echo $troupes['nombret']; $tr = $troupes['nombret']; ?></td>
<td></td>
</tr>
	


<tr>
<td>Type :</td>
<td><?php echo $troupes['type']; ?></td>
<td></td>
</tr>
	
<tr>
<td>Piquier</td>
<td><?php echo $troupes['Piquier']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t18.PNG"></td>

</tr>
	
<tr>
<td>Archer léger</td>
<td><?php echo $troupes['Archerléger']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t19.PNG"></td>

</tr>
	
<tr>
<td>Porteur de masse</td>
<td><?php echo $troupes['Porteurdemasse']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t15.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier</td>
<td><?php echo $troupes['Arbalétrier']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t20.PNG"></td>

</tr>
	
<tr>
<td>Epéiste</td>
<td><?php echo $troupes['Epéiste']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t16.PNG"></td>

</tr>
	
<tr>
<td>Archer lourd</td>
<td><?php echo $troupes['Archer']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t21.PNG"></td>

</tr>
	
<tr>
<td>Hallebardier</td>
<td><?php echo $troupes['Hallebardier']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t10.PNG"></td>

</tr>
	
<tr>
<td>Archer long</td>
<td><?php echo $troupes['Archerlong']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t22.PNG"></td>

</tr>
	
<tr>
<td>Epée à deux mains</td>
<td><?php echo $troupes['Epéeàdeuxmains']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t7.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier lourd</td>
<td><?php echo $troupes['Arbalétrierlourd']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t11.PNG"></td>

</tr>
	
<tr>
<td>Masse de l'ombre</td>
<td><?php echo $troupes["Massedelombre"]; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t12.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier de l'ombre</td>
<td><?php echo $troupes['Arbalétrierdelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t37.PNG"></td>

</tr>
	
<tr>
<td>Fripouille de l'ombre</td>
<td><?php echo $troupes["Fripouilledelombre"]; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t13.PNG"></td>

</tr>
	
<tr>
<td>Félon de l'ombre</td>
<td><?php echo $troupes["Félondelombre"]; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t14.PNG"></td>

</tr>
	
<tr>
<td>Scélérat de l'ombre</td>
<td><?php echo $troupes["Scélératdelombre"]; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t57.PNG"></td>

</tr>
	
<tr>
<td>Vaurien de l'ombre</td>
<td><?php echo $troupes['Vauriendel\'ombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t58.PNG"></td>

</tr>
	
<tr>
<td>Pyrommane</td>
<td><?php echo $troupes['Pyrommane']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t40.PNG"></td>

</tr>
	
<tr>
<td>Pyromane vétéran</td>
<td><?php echo $troupes['Pyromanevétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t64.PNG"></td>

</tr>
	
<tr>
<td>Maraudeur</td>
<td><?php echo $troupes['Maraudeur']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t39.PNG"></td>

</tr>
	
<tr>
<td>Maitre pilleur vétéran</td>
<td><?php echo $troupes['Maitrepilleurvétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t63.PNG"></td>

</tr>
	
<tr>
<td>Porteur de masse vétéran</td>
<td><?php echo $troupes['Porteurdemassevétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t17.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier vétéran</td>
<td><?php echo $troupes['Arbalétriervétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t9.PNG"></td>

</tr>
	
<tr>
<td>Piquier vétéran</td>
<td><?php echo $troupes['Piquiervétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t38.PNG"></td>

</tr>
	
<tr>
<td>Archer léger vétéran</td>
<td><?php echo $troupes['Archerlégervétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t62.PNG"></td>

</tr>
	
<tr>
<td>Epéiste vétéran</td>
<td><?php echo $troupes['Epéistevétéran']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t44.PNG"></td>

</tr>
	
<tr>
<td>Chevalier errant</td>
<td><?php echo $troupes['Chevaliererrant']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t2.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier errant</td>
<td><?php echo $troupes['Arbalétriererrant']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t3.PNG"></td>

</tr>
	
<tr>
<td>Chevalier de la garde royale</td>
<td><?php echo $troupes['Chevalierdelagarderoyale']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t6.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier de la garde royale</td>
<td><?php echo $troupes['Arbalétrierdelagarderoyale']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t8.PNG"></td>

</tr>
	
<tr>
<td>Sentinelle de la garde royale</td>
<td><?php echo $troupes['Sentinelledelagarderoyale']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t35.PNG"></td>

</tr>
	
<tr>
<td>Archer du désert renégat</td>
<td><?php echo $troupes['Archerdudésertrenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t51.PNG"></td>

</tr>
	
<tr>
<td>Eclaireur de la garde royale</td>
<td><?php echo $troupes['Eclaireurdelagarderoyale']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t36.PNG"></td>

</tr>
	
<tr>
<td>Scandinave avec hache</td>
<td><?php echo $troupes['Scandinaveavechache']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t55.PNG"></td>

</tr>
	
<tr>
<td>Scandinave avec arc</td>
<td><?php echo $troupes['Scandinaveavecarc']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t56.PNG"></td>

</tr>
	
<tr>
<td>Archer scandinave renégat</td>
<td><?php echo $troupes['Archerscandinaverenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t26.PNG"></td>

</tr>
	
<tr>
<td>Guerrier scandinave renégat</td>
<td><?php echo $troupes['Guerrierscandinave renégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t25.PNG"></td>

</tr>
	
<tr>
<td>Barbare</td>
<td><?php echo $troupes['Barbare']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t28.PNG"></td>

</tr>
	
<tr>
<td>Chien-loup</td>
<td><?php echo $troupes['Chienloup']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t27.PNG"></td>
</tr>

<tr>
<td>Loup féroce</td>
<td><?php echo $troupes['loupferoce']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t65.PNG"></td>
</tr>
	
<tr>
<td>Archer du désert renégat</td>
<td><?php echo $troupes['Archerdudésertrenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t51.PNG"></td>

</tr>
	
<tr>
<td>Sabreur du désert renégat</td>
<td><?php echo $troupes['Sabreurdudésertrenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t50.PNG"></td>

</tr>
	
<tr>
<td>Archer du désert</td>
<td><?php echo $troupes['Archerdudésert']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t54.PNG"></td>

</tr>
	
<tr>
<td>Archer composite</td>
<td><?php echo $troupes['Archercomposite']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t49.PNG"></td>

</tr>
	
<tr>
<td>Porteur de flamme</td>
<td><?php echo $troupes['Porteurdeflamme']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t34.PNG"></td>

</tr>
	
<tr>
<td>Archer léger squelette</td>
<td><?php echo $troupes['Archerlégersquelette']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t53.PNG"></td>

</tr>
	
<tr>
<td>Archer ours</td>
<td><?php echo $troupes['Archerours']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t52.PNG"></td>

</tr>
	
<tr>
<td>Guerrier ours</td>
<td><?php echo $troupes['Guerrierours']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t48.PNG"></td>

</tr>
	
<tr>
<td>Archer lion</td>
<td><?php echo $troupes['Archerlion']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t59.PNG"></td>

</tr>
	
<tr>
<td>Boeuf archer long</td>
<td><?php echo $troupes['Boeufarcherlong']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t41.PNG"></td>

</tr>
	
<tr>
<td>Hallebardier bovin</td>
<td><?php echo $troupes['Hallebardierbovin']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t60.PNG"></td>

</tr>
	
<tr>
<td>Archer du culte renégat</td>
<td><?php echo $troupes['Archerduculterenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t33.PNG"></td>

</tr>
	
<tr>
<td>Guerrier du culte renégat</td>
<td><?php echo $troupes['Guerrierduculterenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t32.PNG"></td>

</tr>
	
<tr>
<td>Pirate abordeur</td>
<td><?php echo $troupes['Pirateabordeur']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t24.PNG"></td>

</tr>
	
<tr>
<td>L'Eventreur des mers renégat</td>
<td><?php echo $troupes['Eventreurdesmers']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t23.PNG"></td>

</tr>
	
<tr>
<td>Tentacule</td>
<td><?php echo $troupes['Tentacule']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t43.PNG"></td>

</tr>
	
<tr>
<td>Frondeur</td>
<td><?php echo $troupes['Frondeur']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t5.PNG"></td>

</tr>
	
<tr>
<td>Sabreurs</td>
<td><?php echo $troupes['Sabreurs']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t4.PNG"></td>

</tr>
	
<tr>
<td>Lanciers</td>
<td><?php echo $troupes['Lanciers']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t47.PNG"></td>

</tr>
	
<tr>
<td>Lanceurs de javelots</td>
<td><?php echo $troupes['Lanceursdejavelots']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t46.PNG"></td>

</tr>
	
<tr>
<td>Gardes du Khan</td>
<td><?php echo $troupes['GardesduKhan']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t42.PNG"></td>

</tr>
	
<tr>
<td>Assassin</td>
<td><?php echo $troupes['Assassin']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t45.PNG"></td>

</tr>
	
<tr>
<td>Tueur de démons</td>
<td><?php echo $troupes['Tueurdedémons']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t61.PNG"></td>

</tr>

<tr>
<td>Guerrier dent-de-requin renégat</td>
<td><?php echo $troupes['Guerrierdentderequinrenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t29.PNG"></td>
</tr>
	
<tr>
<td>Ecrase-pierre renégat</td>
<td><?php echo $troupes['Ecrasepierrerenégat']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t30.PNG"></td>
</tr>	
<tr>
<td>Horreur démoniaque</td>
<td><?php echo $troupes['Horreurdémoniaque']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t1.PNG"></td>

</tr>
	
<tr>
<td>Horreur mortelle</td>
<td><?php echo $troupes['Horreurmortelle']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t31.PNG"></td>

</tr>
	


</tbody>
</table>
<?php	
}}else{
?><div style="margin-top:-2100px"><center><h3>Choisisez le lieu</h3></center>
<?php
$pseudo = $_SESSION['pseudo'];
$reponse = mysql_query("SELECT * FROM chateau WHERE pseudo='$pseudo';") or die(mysql_error());
while($donnees = mysql_fetch_array($reponse))
{
?>
<?php if(isset($donnees['Chateau'])){ echo"
                <li><a href='troupes.php?name=".$donnees['Chateau']."'><span>".$donnees['Chateau']."</span></a></li>";}else{echo"Aucun chateau trouvé";}?>
               <?php if(isset($donnees['avp1'])){ echo"
                <li><a href='troupes.php?name=".$donnees['avp1']."'><span>".$donnees['avp1']."</span></a></li>";}else{}?>
                <?php if(isset($donnees['avp2'])){ echo"
                <li><a href='troupes.php?name=".$donnees['avp2']."'><span>".$donnees['avp2']."</span></a></li>";}else{}?>
                <?php if(isset($donnees['avp3'])){ echo"
                <li><a href='troupes.php?name=".$donnees['avp3']."'><span>".$donnees['avp3']."</span></a></li>";}else{}?>
                <?php if(isset($donnees['chateaug'])){ echo"
                <li><a href='troupes.php?name=".$donnees['chateaug']."'><span>".$donnees['chateaug']."</span></a></li>";}else{}?>
                 <?php if(isset($donnees['chateaui'])){ echo"
                <li><a href='troupes.php?name=".$donnees['chateaui']."'><span>".$donnees['chateaui']."</span></a></li>";}else{}?>
                 <?php if(isset($donnees['chateaus'])){ echo"
                <li><a href='troupes.php?name=".$donnees['chateaus']."'><span>".$donnees['chateaus']."</span></a></li>";}else{}?>
                 <?php if(isset($donnees['chateaup'])){ echo"
                <li><a href='troupes.php?name=".$donnees['chateaup']."'><span>".$donnees['chateaup']."</span></a></li>";}else{}?>
                 <?php if(isset($donnees['autre1'])){ echo"
                <li><a href='troupes.php?name=".$donnees['autre1']."'><span>".$donnees['autre1']."</span></a></li>";}else{}?>
                <?php if(isset($donnees['autre2'])){ echo"
                <li><a href='troupes.php?name=".$donnees['autre2']."'><span>".$donnees['autre2']."</span></a></li>";}else{}?>
                <?php if(isset($donnees['autre3'])){ echo"
                <li><a href='troupes.php?name=".$donnees['autre3']."'><span>".$donnees['autre3']."</span></a></li>";}else{}?>
                </div>
<?php }} ?>
</th>

</tr>
</table>
</center>
</body>
<?php
}
else {echo"<center><h2>Vous n'êtes pas autorisé a voir les troupes de cette personne</h2></center>";
echo "Votre pseudo : ";
echo $pseudos;
echo'<br>';
echo"Le pseudo choisi : ";
echo $donnees['pseudo'];
echo"<br>le lieu choisi : ";
echo $lieu ; 
echo"<br>le chateau dans la bdd : ";
echo $donnees['Chateau'];
}}}

if($_COOKIE['pseudo']){
$pseudos = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudos = $_SESSION['pseudo'];	
}

$datet = date('d/m');
$pseudo = 'pierre151' ;
$date = mysql_query("SELECT * FROM $pseudos WHERE date =(SELECT MAX(date) FROM $pseudos);");
$dated = mysql_fetch_array($date);
if($datet == $dated['date']){
	
}
else{
$troupebbd['nombret'] = mysql_query("SELECT nombret FROM troupes WHERE pseudo='$pseudos'");
date_default_timezone_set('Europe/Paris');
$date = date('d/m');
mysql_query("INSERT INTO $pseudos (t, date) VALUES('$tr', '$date')");
}


?>
<?php

}
else{include('noco.php');}
}
else{include('noco.php');}

?>

