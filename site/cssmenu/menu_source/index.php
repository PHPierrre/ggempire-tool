<?php
$pseudo = $_SESSION['pseudo'];
$reponse = mysql_query("SELECT * FROM chateau WHERE pseudo='$pseudo';") or die(mysql_error());
while($donnees = mysql_fetch_array($reponse))
{
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="http://x/favicon.PNG" />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<link rel='stylesheet' type='text/css' href='http://x/site/cssmenu/menu_source/styles.css' />
</head>
<center>
<div id='cssmenu'>
<ul>
   <li><a href='http://x/site/accueil.php'><span>Accueil</span></a></li>
   <li class='has-sub'><a href=''><span>Cartes</span></a>
      <ul>
         <li class='has-sub'><a href=''><span>Ou sommes nous?</span></a>
            <ul>
               <li class='last'><a href='http://x/site/carte-lge.php'><span>Le Grand Empire</span></a> </li>
               <li class='last'><a href='http://x/site/carte-ge.php'><span>Glacier Eternel</span></a></li>
               <li class='last'><a href='http://x/site/carte-lio.php'><span>Les îles orageuses</span></a></li>
               <li class='last'><a href='http://x/site/carte-lsb.php'><span>Les sables brûlants</span></a></li>
            </ul>
       </li>
        <li class='has-sub'><a href=''><span><s>Centre de pouvoir</s></span></a>
            <ul>
               <li><a href=''><span><s>Troupes</s></span></a></li>
               <li class='last'><a href=''><span><s>Grade</s></span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   
   
 <li class='has-sub'><a href=''><span>Attaque</span></a>
       <ul>
         <li class='has-sub'><a href=''><span>Fiéffés Coquin</span></a>
            <ul>
               <li><a href='http://x/site/fc.php'><span>Le Grand Empire</span></a></li>
               <li class='last'><a href='http://x/site/fc1.php'><span>Glacier Eternel</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href='#'><span>Les conseils de Sys-007</span></a>
            <ul>
               <li><a href=''><span></span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href=''><span>Défence</span></a>
      <ul>
         <li class='has-sub'><a href=''><span>Les conseils de Sys-007</span></a>
            <ul>
               <li><a href='http://x/site/dslm.php'><span>Répartir sa defence sur les murs</span></a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Troupes</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Mes troupes</span></a>
            <ul>
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
            </ul>
            <?php 
			if($_SESSION['pseudo'] == 'pierre151'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'Kpout'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'illig'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'Elsa45'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'sys-007'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'wtv666'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			elseif($_SESSION['pseudo'] == 'g1adoff'){echo"
            <li class='last'><a href='admin-troupes.php'><span>Troupes de l'alliance</span></a></li>";}
			else{echo"
            <li class='last'><a href='' title='Vous n'êtes pas autoriser a voir  cette section'><span><s>Troupes de l'alliance</s></span></a></li>";}
			
			?>
            <li class='last'><a href='espions.php'><span>Les espions</span></a></li>
         </li>
      </ul>
   </li>
   <li class='has-sub'><a href=''><span>Alliance</span></a>
      <ul>
         <li class='has-sub'><a href=''><span>Alliance sur le site</span></a>
            <ul>
               <li><a href='http://x/site/profils/index.php'><span>Membres du site</span></a></li>
            </ul>
         </li>
         <li class='has-sub'><a href=''><span>Alliance sur le jeux</span></a>
            <ul>
               <li><a href='http://x/site/npa.php'><span>Pactes</span></a></li>
               <li><a href='http://x/site/imfneo.php'><span>alliance neo en image</span></a></li>
            </ul>
         </li>

      </ul>
   </li>
   
   <li><a href='information.php'><span>Informations</span></a></li>
   <li><a href='information.php'><span>...</span></a></li>
   <li>
<?php  include('s.php');?>
   </li>
</ul>
</div>
</center>
<br />
</body>
</html>
<?php
}
?>