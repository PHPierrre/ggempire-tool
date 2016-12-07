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
	        if($_SESSION['pseudo'] == 'pierre151' || $_SESSION['pseudo'] == 'Kpout' || $_SESSION['pseudo'] == 'Illig' || $_SESSION['pseudo'] == 'Elsa45' || $_SESSION['pseudo'] == 'sys-007' || $_SESSION['pseudo'] == 'wtv666' || $_SESSION['pseudo'] == 'g1adoff'){
			?>
            <?php
$tr = mysql_query("SELECT SUM(nombret) AS total FROM troupes;");
$nf = mysql_fetch_array($tr);			
$voir = mysql_query("SELECT * FROM troupes WHERE nombret = (SELECT MAX(nombret) FROM troupes);");
$base = mysql_fetch_array($voir);	

?>
<center>
<table width="1200" bgcolor="#FFFFFF">
  <tr>
    <th width="800px" style="background-color:#FFFFFF">
 <div style="margin-left:100px;margin-top:-3000px;">Nombre de troupes enregistrées :  <?php  echo $nf['total']; ?>  <br>
   Qui a le plus de troupes :  <?php echo $base['pseudo'] ; ?> avec <?php echo $base['nombret'] ; ?> troupes.
   <br>
Oui oui , il n'y a pas de bug
   </div>
    
    
    
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<?php
$lieu = $_GET['lieu'];
$pseudos =  $_GET['pseudo'];
$quet = mysql_query("SELECT * FROM troupes WHERE pseudo='$pseudos' AND ou='$lieu';") or die(mysql_error());
while($troupes = mysql_fetch_assoc($quet)){
?>	
<center>
<table class="pure-table" style="margin-top:700px">
<tbody>


<tr>
<td>Troupes :</td>
<td><?php echo $troupes['nombret']; ?></td>
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
<td><?php echo $troupes['Massedelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t12.PNG"></td>

</tr>
	
<tr>
<td>Arbalétrier de l'ombre</td>
<td><?php echo $troupes['Arbalétrierdelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t37.PNG"></td>

</tr>
	
<tr>
<td>Fripouille de l'ombre</td>
<td><?php echo $troupes['Fripouilledelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t13.PNG"></td>

</tr>
	
<tr>
<td>Félon de l'ombre</td>
<td><?php echo $troupes['Félondelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t14.PNG"></td>

</tr>
	
<tr>
<td>Scélérat de l'ombre</td>
<td><?php echo $troupes['Scélératdelombre']; ?></td>
<td><img height="50px" width="40px" src="http://x/site/image/troupes/icones/t57.PNG"></td>

</tr>
	
<tr>
<td>Vaurien de l'ombre</td>
<td><?php echo $troupes['Vauriendelombre']; ?></td>
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
    
</tr></tbody></table></center>
<?php } ?>

</th>
    <th width="400px" style="background-color:#FFFFFF">
    <h2>Joueur, chateau, lieu</h2>
<?php
$quete = mysql_query("SELECT * FROM chateau") or die(mysql_error());
while($donnees = mysql_fetch_array($quete)){
?>
    
    <li><?php echo $donnees['pseudo']; ?></li>
    <ul>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['Chateau']; ?>"><?php echo $donnees['Chateau']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['avp1']; ?>"><?php echo $donnees['avp1']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['avp2']; ?>"><?php echo $donnees['avp2']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['avp3']; ?>"><?php echo $donnees['avp3']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['chateaug']; ?>"><?php echo $donnees['chateaug']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['chateaui']; ?>"><?php echo $donnees['chateaui']; ?></a></li>
    <li><a href="admin-troupes.php?pseudo=<?php echo $donnees['pseudo']; ?>&lieu=<?php echo $donnees['chateaus']; ?>"><?php echo $donnees['chateaus']; ?></a></li>
    
    </ul>
    
    
  <?php
} ?>
<div style="margin-top:2800px;"></div>
    </th>
  </tr>
</table>
</center>

<?php
include('cont.php');
}else{echo"";}
}else{include('noco.php');}
}else{include('noco.php');}

?>
