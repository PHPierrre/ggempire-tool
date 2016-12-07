<?php
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
include('cssmenu/menu_source/index.php');
if($_COOKIE['pseudo']){
$pseudo = $_COOKIE['pseudo'];	
}
elseif($_SESSION['pseudo']){
$pseudo = $_SESSION['pseudo'];	
}
?>
<br>
<center>
<div style="border-radius:3px; width:1200px;background-color:#FFFFFF;">
<table width="1200" border="0">
  <tbody>
    <tr>
      <td width="200px">
      <div style="margin-left:40px;">
      <a href="messagerie.php?ou=rum" title="Rédiger un message">Rédiger un message</a><br><br>
      <a href="messagerie.php?ou=bdr" title="Boite de réception">Boite de réception</a><br><br>
      <a href="messagerie.php?ou=bde" title="Boite d'envoi">Boite d'envoi</a>
      </div>
      
      
      </td>
      <?php
	  if($_GET['confirm'] =='ok'){ ?>
      Votre message a été envoyé.
      <?php } if($_GET['confirm'] =='msg'){ ?>
      Votre message ne contient pas de texte.
      <?php } if($_GET['confirm'] =='desti'){ ?>
      Aucun destinataire mentionné.
      <?php
	  } if($_GET['confirm'] =='titre'){ ?>
	  Aucun titre au message.Votre message dois comporter un titre.
	  
<?php	 }if($_GET['confirm'] =='suppr'){ ?>
	  Message supprimés avec succes
	  
<?php	 }  if($_GET['ou'] =='rum'){ ?>
		  
		  <td width="800"><script type="text/javascript">
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
</script>
<style type="text/css">
	.button1{
		border-radius:3px;
	}
	</style>
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
</script>
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
	</script><br>
          <form method="post" action="post-mp.php">
		  <div class="form-group">
          <label class="col-md-2 control-label" for="desti">Destinataire : </label>  
          <div class="col-md-5">
          <input id="desti" name="desti" type="text" placeholder="" value="<?php echo htmlspecialchars($_GET['pseudo']); ?>" class="form-control input-md" required="">
		  </div>
          </div><br><br>
          <div class="form-group">
          <label class="col-md-2 control-label" for="titre">Sujet : </label>  
          <div class="col-md-8">
          <input id="titre" name="titre" type="text" 
          <?php
          if(isset($_GET['titre']) AND !empty($_GET['titre'])){
			  echo 'value="';
			  echo 'Re : ';
			  echo htmlspecialchars($_GET['titre']);
			  echo'"';
		  }else{}
          ?>
           placeholder="" class="form-control input-md" required="">
          </div>
          </div><br><br>
          
<center>
<input type="button" class="button1" onclick="bascule('1');return false;" value="Smileys">
    <div id="1" style='display:none;'>
    
    <img src="http://x/site/image/smilies/1.gif" onclick="insertTag(':))', '', 'textarea');" alt="1" />
    <img src="http://x/site/image/smilies/2.gif" onclick="insertTag(':[', '', 'textarea');" alt="2" />
    <img src="http://x/site/image/smilies/3.gif" onclick="insertTag(':D', '', 'textarea');" alt="3" />
    <img src="http://x/site/image/smilies/4.gif" onclick="insertTag(':/', '', 'textarea');" alt="4" />
    <img src="http://x/site/image/smilies/5.gif" onclick="insertTag(';)', '', 'textarea');" alt="5" />
    <img src="http://x/site/image/smilies/6.gif" onclick="insertTag(':O', '', 'textarea');" alt="6" />
    <img src="http://x/site/image/smilies/7.gif" onclick="insertTag('mdr', '', 'textarea');" alt="7" />
    <img src="http://x/site/image/smilies/8.gif" onclick="insertTag'degage', '', 'textarea');" alt="8" />
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
<input type="button" class="button1" value="Gras" onclick="insertTag('<b>','</b>','textarea');" />
<input type="button" class="button1" value="Italique" onclick="insertTag('<i>','</i>','textarea');" />
<input type="button" class="button1" value="Souligné" onclick="insertTag('<u>','</u>','textarea');" />
<input type="button" class="button1" value="Barré" onclick="insertTag('<s>','</s>','textarea');" />
<input onclick="effacer();" class="button1" type="button" value="Reinialiser"/>
<input onclick="Copier();" class="button1" type="button" value="Selectionner"/>
</center>
<br>  
		  
          <div class="form-group">
          <label class="col-md-2 control-label" for="message">Message :</label>
          <div class="col-md-9">                     
          <textarea class="form-control" rows="10" id="textarea" name="message"></textarea>
          </div>
          </div>	<br><br><br><br>
          <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton"></label>
          <div class="col-md-4">
          <button id="singlebutton" type="submit" class="btn btn-success">Envoyer</button>
          </div>
          </div>
  </form>
		  </div>
	<?php  }?>
      <?php
	  if($_GET['ou'] =='bdr'){
		  ?> <td width="800">
		<?php
      $quete = mysql_query("SELECT envoi, desti, titre, message, lu, time, id FROM message WHERE desti='$pseudo' ORDER BY id DESC;") or die(mysql_error());
      while($don = mysql_fetch_array($quete)){
		  ?>
          
          <div style="border-radius:5px;<?php if($don['lu'] == '0'){?>background-color:#47a447;<?php } elseif($don['lu'] == '1'){ ?>background-color:#f6a447;<? } ?>"><hr><a href="voir-mp.php?id=<?php echo $don['id']; ?>">
          <span id="envoi"><font color="#FFFFFF">De : <strong><?php echo $don['envoi']; ?></strong></font></span>
          <span style="margin-left:200px;width:800px;"  id="titre"><font color="#FFFFFF"><u><?php echo $don['titre']; ?></u></font></span></a><hr></div>
          <?php } ?>
          
         
          <td width="200" height="600px" nowrap>
          <?php
      $quete = mysql_query("SELECT time, lu, id FROM message WHERE desti='$pseudo' ORDER BY id DESC;") or die(mysql_error());
      while($don = mysql_fetch_array($quete)){
		  ?>
          <div style="border-radius:5px;<?php if($don['lu'] == '0'){ ?>background-color:#47a447;<? } elseif($don['lu'] == '1'){?> background-color:#f6a447;<?php } ?>"><hr><span id="time"><font color="#FFFFFF"><?php echo $don['time']; ?></font></span><hr></div>
          
	<?php }?> </td> 
    <style type="text/css">
.carre1{
	background-color:#47a447;
	border:solid;
	border-width:1px;
	width:30px;
	height:30px;	
}
.carre2{
	background-color:#f6a447;
	border:solid;
	border-width:1px;
	width:30px;
	height:30px;	
}
</style>
<center>
<table width="400" border="0">
  <tbody>
    <tr>
      <td> Message lu par vous : </td>
      <td><div nowrap class="carre1"></div></td>
      <td>Message non lu par vous :</td>
      <td><div nowrap class="carre2"></div></td>
    </tr>
  </tbody>
</table>
</center>
 <?php }?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
      <?php
	  if($_GET['ou'] =='bde'){
	  ?>
      <td width="800">
		<?php
      $quete = mysql_query("SELECT envoi, desti, titre, message, lu, id FROM message WHERE envoi='$pseudo' ORDER BY id DESC;") or die(mysql_error());
      while($don = mysql_fetch_array($quete)){
		  ?>
          
          <div style="border-radius:5px;<?php if($don['lu'] == '0'){?>background-color:#47a447;<?php } elseif($don['lu'] == '1'){ ?>background-color:#f6a447;<? } ?>"><hr>
          <span id="envoi"><font color="#FFFFFF">De : <strong><?php echo $don['envoi']; ?></strong></font></span>
          <span style="margin-left:200px;width:800px;"  id="titre"><a href="voir-mp.php?id=<?php echo $don['id']; ?>"><font color="#FFFFFF"><u><?php echo $don['titre']; ?></u></font></a></span><hr></div>
          <?php } ?>
          
         
          <td width="200" height="600px" nowrap>
          <?php
      $quete = mysql_query("SELECT time, lu, id FROM message WHERE envoi='$pseudo' ORDER BY id DESC;") or die(mysql_error());
      while($don = mysql_fetch_array($quete)){
		  ?>
          <div style="border-radius:5px;<?php if($don['lu'] == '0'){ ?>background-color:#47a447;<? } elseif($don['lu'] == '1'){?> background-color:#f6a447;<?php } ?>"><hr><span id="time"><font color="#FFFFFF"><?php echo $don['time']; ?></font></span><hr></div>
          <?php } ?></td>
<style type="text/css">
.carre1{
	background-color:#47a447;
	border:solid;
	border-width:1px;
	width:30px;
	height:30px;	
}
.carre2{
	background-color:#f6a447;
	border:solid;
	border-width:1px;
	width:30px;
	height:30px;	
}
</style>
<center>
<table width="500" border="0">
  <tbody>
    <tr>
      <td> Message lu par le destinataire : </td>
      <td><div nowrap class="carre1"></div></td>
      <td>Message non lu par le destinataire :</td>
      <td><div nowrap class="carre2"></div></td>
    </tr>
  </tbody>
</table>     
	<?php }?> 
      
      
      
      </td>
      
      
    </tr>
  </tbody>
</table>





</div>
</center>
<?php
include('cont.php');
}
else{include('noco.php');}
}
else{include('noco.php');}

?>