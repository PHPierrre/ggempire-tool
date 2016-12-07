<?php
include('site/bdd.php');
date_default_timezone_set('Europe/Paris');
$date = date('d m y \à H:i');
include('site/cssmenu/menu_source/index2.php'); 
?>
<body>
<div style="background-color:#dbc19d">
<style type="text/css">
body{
	width:100%
}
iframe {
    border:none;
	margin:0px;
	padding:0px;
}
.fc{
	border-color:rgba(134,130,130,1.00);
	border-width: 1px;
	border-style: solid;
	border-radius:3px;
	background-color:rgba(99,173,80,1.00);
	/*white-space: nowrap;*/
	width:400px;
	height:150px;
	margin-top:-160px;
	margin-left:0px;
	
}
.fc:hover{
        border-width: 3px;
	border-style: solid;
        border-color:#12EA3D;
}
.fci{
	margin-left:250px;
	margin-top:10px;
	white-space: nowrap;
	
}
h4{
	font-family: 'Lato', sans-serif;
	white-space: nowrap;
	margin-top:-60px;
	color:rgba(255,255,255,1.00);
	margin-left:40px;
}
.hello{
	margin-left:-590px;	
	margin-top:-230px;		
}
.phph{
	margin-top:-210px;
	margin-right:-100px;
	z-index:100000;
	width:700px;
	
}

.deco{
	border-color:rgba(249,154,154,1.00);
	border-width: 1px;
	border-style: solid;
	border-radius:3px;
	background-color:rgba(192,192,192,1.00);
	width:400px;
	height:75px;
	/*margin-top:-200px;;*/
	margin-right:0px

	
}
.deco:hover{
        border-width: 3px;
	border-style: solid;
        border-color:#12EA3D;
}
a:link 
{ 
 text-decoration:none; 
} 
h4{
	font-family: 'Lato', sans-serif;
	white-space: nowrap;
	/*margin-top:-60px;*/
	color:rgba(255,255,255,1.00);
	/*margin-left:40px;*/
}
.c1:hover{
        border-width: 3px;
	    border-style: solid;
        border-color:#12EA3D;
		width:694px;
}
.c1{
	width:700px;
	height:300px;
}
.c2{
	width:500px;
	height:300px;
}

.c2:hover{
        border-width: 3px;
	border-style: solid;
        border-color:#12EA3D;
		width:494px;
}
.t:hover{
        border-width: 3px;
	    border-style: solid;
        border-color:#12EA3D;
		width:825px;
		
}
.t{
	
}
.e:hover{
        border-width: 3px;
	border-style: solid;
        border-color:#12EA3D;
}
﻿.fire{text-align:center;}
table { 
-moz-margin-left:-150px;
-o-text-align: center;
-webkit-text-align: center;
-ms-text-align: center;
text-align:center;
}
</style>
<center>
<table class="fire" width="1200" border="0">
<tr class="fire">
<th width="340"><iframe style="margin-bottom:15px;"  src="site/new.php" width="350px" height="400px" scrolling="yes"></iframe></th>
<th width="400"><a href="npa.php" title="Nos pactes avec les alliances"><div class="fc">
<img class="fci" style="margin-top:40px;"  src="http://X/site/image/accueil/boum.png" height="" width="">
<h4><div style="margin-left:50px;">Nos alliés</div></h4></div></a>
<br>
<a href="site/connect.php"><div class="deco"><center><h3>Se connecter</h3></center></div></a>

</th>
<th width="400">
<div class="hello">
<img class="fci"  src="http://X/site/image/accueil/acc.png" height="" width="">

<div class="phph" align="center">Bonjour , 
Invité ! <br>
<?php
$temps = date('H');
if($temps == '0'){echo"Je suis fatigué";}
elseif($temps == '1'){echo"J'adore mon lit!";}
elseif($temps == '2'){echo"Je rêve ....";}
elseif($temps == '3'){echo"J'ai chaud !";}
elseif($temps == '4'){echo"J'ai froid !";}
elseif($temps == '5'){echo"C'était un cauchemard !";}
elseif($temps == '6'){echo"ah ! ce coq ****";}
elseif($temps == '7'){echo"Pas le boulot, non !";}
elseif($temps == '8'){echo"SNCF de *****";}
elseif($temps == '9'){echo"Je croule de boulot !";}
elseif($temps == '10'){echo"Vivement ce soir !";}
elseif($temps == '11'){echo"Petite reunion";}
elseif($temps == '12'){echo"Miam, je mange !";}
elseif($temps == '13'){echo"Mal au ventre";}
elseif($temps == '14'){echo"Plus que 2 heures !";}
elseif($temps == '15'){echo"Fait chaud non ?";}
elseif($temps == '16'){echo"Fini le boulot";}
elseif($temps == '17'){echo"Ah mon pc !";}
elseif($temps == '18'){echo"Je prend l'apéro";}
elseif($temps == '19'){echo"Ce soir , pizza !";}
elseif($temps == '20'){echo"Miam miam , olive";}
elseif($temps == '21'){echo"J'aime la télévision !";}
elseif($temps == '22'){echo"Demain boulot";}
elseif($temps == '23'){echo"Bientot dodo";}
else{echo'Je suis perdu';}
 ?>
</div></div>
</th> 
</tr>
<tr>
<th scope="row"></th>
<th width="831px"><a href="site/connect.php?e=noco" title="Notre outils troupe"><img class="t" style="margin-top:-200px;margin-left:5px;"  src="http://x/site/image/accueil/troupes.PNG" height="" width=""></a></th>
<th></th>
</tr>
</table>
</div>
<center>
<div style="margin-top:-30px;">
<table width="1200" border="0">
  <tr>
    <th scope="col"><a href="description-alliance.php" title="description alliance"><img class="c1" src="http://X/site/image/accueil/dest.PNG"></a></th>
    <th scope="col"><a href="site/inscription.php" title="Inscription"><div class="c2" style="background-color:#FFFFFF"><img src="http://x/site/image/accueil/annonce.png"></div></a></th>
    <th scope="col"></th>
  </tr>

</table>


</div>
<br>
<div><h5>Ce site web est l'unique propriété de l'alliance   Pour nos frères - Jeux Goodgame Empire.  Toutes les images apartiennent a leurs propriétaires respectif. &copy; 2014 Pour-nos-Frères</h5></div>
</center>
</div>
</body>