<?php
ob_start();
session_start();
include('bdd.php');

if(!empty($_COOKIE['pseudo']) && !empty($_COOKIE['password']) && !empty($_COOKIE['id'])){
if(isset($_COOKIE['pseudo']) && isset($_COOKIE['password']) && isset($_COOKIE['id'])){

$pseudo = mysql_real_escape_string(htmlspecialchars($_COOKIE['pseudo']));
$passe = mysql_real_escape_string(htmlspecialchars($_COOKIE['password']));
$sec = 1;
	
$quete = mysql_query("SELECT pseudo FROM validation WHERE pseudo='$pseudo';");
$resultat = mysql_fetch_array($quete);
if($pseudo == $resultat['pseudo']){

$quete = mysql_query("SELECT pass FROM validation WHERE pass='$passe';");
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
date_default_timezone_set('Europe/Paris');
$date = date('d m y \à H:i');
$quete = mysql_query("UPDATE validation SET date ='$date' WHERE pseudo='$pseudo';");
include('cssmenu/menu_source/index.php'); 

?><body>
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
.pro-mss{
	margin-left:-350px;
	margin-top:100px;

}
.pro-mss1{
	
	
	
}
.lien{
	height:53px;
	width:56px;
	}
	.rond{
    border-radius:90px;
    background-color:#d90000;
    width:30px;
    height:30px;
    text-align:center;
	margin-left:100px;
	margin-top:-100px;
}

</style>
<center>
<table class="fire" width="1200" border="0">
<tr class="fire">
<th width="340"><iframe style="margin-bottom:15px;"  src="new.php" width="350px" height="400px" scrolling="yes"></iframe></th>
<th width="400"><a href="fc.php"><div class="fc">
<img class="fci"  src="http://x/site/image/accueil/fc1.gif" height="" width="">
<h4>Les Fieffés Coquins</h4></div></a>
<br>
<a href="deconnexion.php"><div class="deco"><center><h3>Déconnexion</h3></center></div></a>
</th>
<th width="400">

<div class="hello">

<img class="fci"  src="http://x/site/image/accueil/acc.png" height="" width="">

<div class="phph" align="center">Bonjour , 
<?php echo $_SESSION['pseudo'];?> ! <br>
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
<div class="pro-mss">
<a href="http://x/site/profils/<?php echo $_SESSION['pseudo']; ?>.php"><img src="http://x/site/image/accueil/profil.png" height="53" width="56"></a>
<a href="messagerie.php">
<?php
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}

$reponse = mysql_query("SELECT lu FROM message WHERE desti='$pseudo' AND lu='1';") or die(mysql_error());
while($tout = mysql_fetch_array($reponse))
{
$lu == $tout['lu'];
$i = '3';
?><div class="rond"><font color="white"><h2>!</h2></font></div><span style="margin-left:60px;">
 <?php } ?>


<img style="border-radius:10px;" src="http://x/site/image/accueil/message.png" height="53" width="56">
<?php if($i =='3'){ ?></span> <?php } ?></a>
</div>

</th> 
</tr>
<tr>
<th scope="row"></th>
<th width="831px"><a href="troupes.php"><img class="t" style="margin-top:-200px;margin-left:5px;"  src="http://x/site/image/accueil/troupes.PNG" height="" width=""></a></th>
<th></th>
</tr>
</table>
</div>

<center>
<div style=" margin-top:-30px;">
<table width="1200" border="0">
  <tr>
    <th scope="col"><a href="carte-lge.php"><img class="c1" src="http://x/site/image/accueil/cap1.PNG"></a></th>
    <th scope="col"><a href="carte-ge.php"><img class="c2" src="http://x/site/image/accueil/cap2.PNG"></a></th>
    <th scope="col"></th>
  </tr>

</table>
<table width="1200">
  <tr>
    <th width="400"><div class="e" align="center" style="margin-top:50px;margin-bottom:50px;background-color:#FFFFFF;border-radius:3px;height:175px;"><a href="espions.php"><img src="http://x/site/image/accueil/spy.PNG"></a></div></th>
    <th width="800"> <div style="background-color:#FFFFFF;border-radius:3px;margin-left:30px;">
    
    <center>
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
                        width: 550, height: 300,
                        vAxis: {maxValue: 30}}
                );
      }
      

      google.setOnLoadCallback(drawVisualization);
    </script>
  </head>   
    <div id='visualization' style='width: 550px; height:300px;font-family: Arial;border: 0 none;'></div>
</div>
</center>
    </div>
    </th>
  </tr>
</table>
</div>
</center>
<script language="javascript" type="text/javascript">
URL = "chatt.php"; 
     var xhr=null;
     function rafraichir() 
     {
        if (window.XMLHttpRequest) 
   {
   xhr = new XMLHttpRequest();
   }
        else if (window.ActiveXObject) 
   {
   xhr = new ActiveXObject('Microsoft.XMLHTTP');
   }
        else alert('JavaScript : votre navigateur ne supporte pas les objets XMLHttpRequest...');
 
        xhr.open('GET',URL,true);
        xhr.onreadystatechange = ajaxReponse;
        xhr.send(null);
     }
     function ajaxReponse() 
     {
        if (xhr.readyState == 4) 
        {
                document.getElementById("chat").innerHTML=xhr.responseText;
                var timer=setTimeout(rafraichir,10000);
        }
     }
rafraichir();
</script>
<center>
<div style="width:1200px;background-color:#FFFFFF;border-radius:3px;" id="pews">

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<h3 align="left">Mini chat</h3><hr>
<style>
    form
    {
        text-align:center;
    }
	#pews{
		right:inherit;
		left:inherit;
		
		
	}
    </style>
<?php include('chatt.php'); ?>
<script type="text/javascript">
function insertTag(startTag, endTag, textareaId, tagType) {
    var field  = document.getElementById(textareaId); 
    var scroll = field.scrollTop;
    field.focus();
        
    if (window.ActiveXObject) { // C'est IE
        var textRange = document.selection.createRange();            
        var currentSelection = textRange.text;
                
        textRange.text = startTag + currentSelection + endTag;
        textRange.moveStart("character", -endTag.length - currentSelection.length);
        textRange.moveEnd("character", -endTag.length);
        textRange.select();     
    } else { // Ce n'est pas IE
        var startSelection   = field.value.substring(0, field.selectionStart);
        var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);
        var endSelection     = field.value.substring(field.selectionEnd);
                
        field.value = startSelection + startTag + currentSelection + endTag + endSelection;
        field.focus();
        field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);
    } 

    field.scrollTop = scroll; // et on redéfinit le scroll.
}
function preview(textareaId, previewDiv) {
	var field = textareaId.value;
	if (document.getElementById('previsualisation').checked && field) {
		
		var smiliesName = new Array(':))', ':[', ':D', ':/', ';)', ':O', 'mdr', 'degage', ';(', ':.');
		var smiliesUrl  = new Array('1.gif', '2.gif', '3.gif', '4.gif', '5.gif', '6.gif', '7.gif', '8.gif', '9.gif', '10.gif','12.gif','14.gif');
		var smiliesPath = "http://x/site/image/smilies/";
	
		field = field.replace(/&/g, '&amp;');
		field = field.replace(/</g, '&lt;').replace(/>/g, '&gt;');
		field = field.replace(/\n/g, '<br />').replace(/\t/g, '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
		
		field = field.replace(/&lt;gras&gt;([\s\S]*?)&lt;\/gras&gt;/g, '<strong>$1</strong>');
		field = field.replace(/&lt;italique&gt;([\s\S]*?)&lt;\/italique&gt;/g, '<em>$1</em>');
		field = field.replace(/&lt;lien&gt;([\s\S]*?)&lt;\/lien&gt;/g, '<a href="$1">$1</a>');
		field = field.replace(/&lt;lien url="([\s\S]*?)"&gt;([\s\S]*?)&lt;\/lien&gt;/g, '<a href="$1" title="$2">$2</a>');
		field = field.replace(/&lt;image&gt;([\s\S]*?)&lt;\/image&gt;/g, '<img src="$1" alt="Image" />');
		field = field.replace(/&lt;citation nom=\"(.*?)\"&gt;([\s\S]*?)&lt;\/citation&gt;/g, '<br /><span class="citation">Citation : $1</span><div class="citation2">$2</div>');
		field = field.replace(/&lt;citation lien=\"(.*?)\"&gt;([\s\S]*?)&lt;\/citation&gt;/g, '<br /><span class="citation"><a href="$1">Citation</a></span><div class="citation2">$2</div>');
		field = field.replace(/&lt;citation nom=\"(.*?)\" lien=\"(.*?)\"&gt;([\s\S]*?)&lt;\/citation&gt;/g, '<br /><span class="citation"><a href="$2">Citation : $1</a></span><div class="citation2">$3</div>');
		field = field.replace(/&lt;citation lien=\"(.*?)\" nom=\"(.*?)\"&gt;([\s\S]*?)&lt;\/citation&gt;/g, '<br /><span class="citation"><a href="$1">Citation : $2</a></span><div class="citation2">$3</div>');
		field = field.replace(/&lt;citation&gt;([\s\S]*?)&lt;\/citation&gt;/g, '<br /><span class="citation">Citation</span><div class="citation2">$1</div>');
		field = field.replace(/&lt;taille valeur=\"(.*?)\"&gt;([\s\S]*?)&lt;\/taille&gt;/g, '<span class="$1">$2</span>');
		
		for (var i=0, c=smiliesName.length; i<c; i++) {
			field = field.replace(new RegExp(" " + smiliesName[i] + " ", "g"), "&nbsp;<img src=\"" + smiliesPath + smiliesUrl[i] + "\" alt=\"" + smiliesUrl[i] + "\" />&nbsp;");
		}
		
		document.getElementById(previewDiv).innerHTML = field;
	}
}
</script><br><br>
<link rel="stylesheet" media="screen" type="text/css" href="couleur/css/colorpicker.css" />
<script type="text/javascript" src="couleur/js/colorpicker.js"></script>
<form action="trait.php" method="post">
        <p>
        <input type="hidden" name="pseudo" value="<?php echo $_SESSION['pseudo']; ?>" />
        <label for="message">Message</label> :  <textarea maxlength="149"  onkeyup="preview(this, 'previewDiv');" onselect="preview(this, 'previewDiv');" style="width:900px;height:50px;" name="message" id="textarea"></textarea>

        <input type="submit" style="width:200px;" value="Envoyer" />
	</p>
    </form>
    <br />
    <script type="text/javascript">
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
    <style type="text/css">
	.button1{
		border-radius:3px;
	}
	.button2{
		border-radius:3px;
	}
	</style>
    <input type="button" class="button2" onclick="bascule('1');return false;" value="Smileys">
    <div id="1" style='display:none;'>
    
    <img src="http://x/site/image/smilies/1.gif" onclick="insertTag(':))', '', 'textarea');" alt="1" />
    <img src="http://x/site/image/smilies/2.gif" onclick="insertTag(':[', '', 'textarea');" alt="2" />
    <img src="http://x/site/image/smilies/3.gif" onclick="insertTag(':D', '', 'textarea');" alt="3" />
    <img src="http://x/site/image/smilies/4.gif" onclick="insertTag(':/', '', 'textarea');" alt="4" />
    <img src="http://x/site/image/smilies/5.gif" onclick="insertTag(';)', '', 'textarea');" alt="5" />
    <img src="http://x/site/image/smilies/6.gif" onclick="insertTag(':O', '', 'textarea');" alt="6" />
    <img src="http://x/site/image/smilies/7.gif" onclick="insertTag('mdr', '', 'textarea');" alt="7" />
    <img src="http://x/site/image/smilies/8.gif" onclick="insertTag('degage', '', 'textarea');" alt="8" />
    <img src="http://x/site/image/smilies/9.gif" onclick="insertTag(';(', '', 'textarea');" alt="9" />
    <img src="http://x/site/image/smilies/10.gif" onclick="insertTag(':.', '', 'textarea');" alt="10" />
    <img src="http://x/site/image/smilies/12.gif" onclick="insertTag('!', '', 'textarea');" alt="12" />
    <img src="http://x/site/image/smilies/14.gif" onclick="insertTag('?', '', 'textarea');" alt="14" />
    <img src="http://x/site/image/smilies/001.gif" onclick="insertTag('+1', '', 'textarea');" alt="15" />
    <img src="http://x/site/image/smilies/002.gif" onclick="insertTag('merci', '', 'textarea');" alt="16" />
    <img src="http://x/site/image/smilies/003.gif" onclick="insertTag('adminyes', '', 'textarea');" alt="17" />
    <img src="http://x/site/image/smilies/004.gif" onclick="insertTag('o_O', '', 'textarea');" alt="18" />
    <img src="http://x/site/image/smilies/005.gif" onclick="insertTag('aielemur', '', 'textarea');" alt="19" />
    <img src="http://x/site/image/smilies/006.gif" onclick="insertTag('horsujet', '', 'textarea');" alt="20" />
    <img src="http://x/site/image/smilies/007.gif" onclick="insertTag('svp', '', 'textarea');" alt="21" />
    <img src="http://x/site/image/smilies/008.gif" onclick="insertTag('idea', '', 'textarea');" alt="22" />
    <img src="http://x/site/image/smilies/009.gif" onclick="insertTag('nosms', '', 'textarea');" alt="23" /></div>
    

			<span id="loading" >
<script type="text/javascript">
<!--
function effacer()
{
 document.getElementById("textarea").value="";
}
 
//-->
function Copier(){
// script valable que sous IE
document.getElementById("textarea").focus();
document.getElementById("textarea").select();
var CopiedTxt = document.selection.createRange();
CopiedTxt.execCommand("Copy");
}

function copier(txt)
{
var txtR = document.body.createTextRange();
txtR.moveToElementText(txt);
txtR.execCommand("Copy");
}
</script> <input type="button" class="button1" value="Gras" onclick="insertTag('<b>','</b>','textarea');" />
<input type="button" class="button1" value="Italique" onclick="insertTag('<i>','</i>','textarea');" />
<input type="button" class="button1" value="Souligné" onclick="insertTag('<u>','</u>','textarea');" />
<input type="button" class="button1" value="Barré" onclick="insertTag('<s>','</s>','textarea');" />

            <input onclick="effacer();" class="button1" type="button" value="Reinialiser"/>
				<button class="button1" onclick="javascript:location.reload();">Actualiser</button>
                
                <input onclick="Copier();" class="button1" type="button" value="Selectionner"/>
                <img src="ajax-loader.gif" alt="patientez...">
				
				
			</span></div>
            
</div>
</div>
</body>

<style type="text/css">
#popupNews{ 
        display: none; 
        background-color:#000; 
        opacity:0.8;
        filter : alpha(opacity=80);
	position: fixed; 
	left: 0; 
	top: 0;
	width: 100%; 
	height: 100%;
	z-index: 2000;

}
#popupNews_content{
	text-align: justify;
	position: fixed;
	top:30%;
	width: 400px;
	background-color:#000; 
	z-index:2001;
	padding:3px 10px;
	margin:0px auto;
	display: none;
	border: 1px solid #303030;
	border-radius:15px;
	box-shadow: 5px 5px 12px #444;
}
#popupNews_content h2.orangeh2{
	line-height:1.5em;
	margin:0 0 0.5em 4px;
	padding-bottom:1px;
	padding-left:1em;
	text-align:left;
	font-size:1.5em;
	color: #9D501E;
}

#popupNews_close{
	text-decoration: none;
	text-indent: -999em;
	float: right;
	height: 30px;
	width: 30px;
	margin-right: -15px;
	margin-top: -15px;
	cursor: pointer;
	background:url(close.png) no-repeat;
}
.popupNewsSummary{
    border-left: 1px dotted #CCCCCC;
    font-size: 1.2em;
    line-height: 1.1em;
    margin: 5px 0 15px 5px;
    padding-left: 10px;
}
#popupNews_content a.popup_more{
    border-left: 1px dotted #888888;
    cursor: pointer;
    display: block;
    padding: 0 0 0 10px;
text-decoration: none;
color: #A3A0A0;
font-size: 0.9em;
margin-bottom: 10px;
}

.popupNews_content a{
    color: #FFFFFF;
    text-decoration: underline;
}

a.popupNews_more{
}

*html #popupNews{
position: absolute;
}
*html #popupNews_content {
position: absolute;
}
</style>
<div id="popupNews"></div>
<div id="popupNews_content"><div id='popupNews_close'>fermer</div>
<h2 class="orangeh2">Présentation du site !</h2>



<!--<div>{News number=1 summarytemplate='popup' showdraft='1'}</div>-->
Voici ce que la mise a jour 2.0 apporte :<br><br>

Amélioration sur le site (visible) : <br>
<br>
Amélioration des profils des utilisateurs.<br>
Amélioration du mini chat.<br>
Un raccourci pour votre profil sur la page d'accueil.<br>
Boite de messagerie en version beta.<br>
Possibilité de modifié son profil.<br>
<br>
Non visible (technique) :<br>
Amélioration de la vitesse des pages.<br>
Amélioration de divers bug du mini chat.<br>
Failles de sécurité patché.<br><br>



Maintenant voici desormais les outils du site. <br>
Une boite de messagerie.<font color="#FF0004">news !</font><br>
Un chat<br>
Un outils troupes<br>
Des cartes<br>
Des graphiques sur vos troupes<br>
Et des futurs encyclopédie sur le jeu.

<?php
$html = "";
if (!isset($_COOKIE['cmsms']) || $_COOKIE['cmsms']!="1"){ ?>

<script type="text/javascript">

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", (($(window).height() - this.outerHeight()) / 2) + 
                                                $(window).scrollTop() + "px");
    this.css("left", (($(window).width() - this.outerWidth()) / 2) + 
                                                $(window).scrollLeft() + "px");
    return this;
}


$(document).ready(function() {
$('#popupNews , #popupNews_content').show();
$('#popupNews_content').center();

$('#popupNews, #popupNews_close').click(function() {
    $('#popupNews , .popupNews_content').fadeOut(function() {
		$('#popupNews , #popupNews_content').remove(); 
    });
    return false;
});



});
</script>
<?php
} 

// on crée le cookie systeme news,
setcookie('cmsms','1', time()+30*24*60*60, '/');// 2592000 secondes = 30 jours

?>

</div>

<?php
include('cont.php');

}
else{include('noco.php');}
}
else{include('noco.php');}
ob_end_flush();
?>
