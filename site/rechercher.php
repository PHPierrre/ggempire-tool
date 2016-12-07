<?
session_start();
include('bdd.php');
if(isset($_POST['requete']) && $_POST['requete'] != NULL){
$requete = htmlspecialchars($_POST['requete']); 
$query = mysql_query("SELECT * FROM fonctions WHERE nom_fonction LIKE '%$requete%' ORDER BY id DESC") or die (mysql_error());
$nb_resultats = mysql_num_rows($query); 
if($nb_resultats != 0) 
{
include('cssmenu/menu_source/index.php'); 	
?>
<div style="background-color:#dbc19d">
<h3 style="margin-left:300px">Résulats pour : "<?php echo $requete ;?>"</h3><br/><br/>
</div>
<?php $search ='
<center><div style="width:1000px">
<form action="rechercher.php" method="Post">
<div class="input-group custom-search-form">
   
<input name="requete" type="text" class="form-control" placeholder="Entrer votre recherche : ">
<span class="input-group-btn">
<button class="btn btn-default" type="submit" >
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form>
</div></center>';
echo $search;
?>
<div style="background-color:#dbc19d">
<center>
<p>Nous avons trouvé <? echo $nb_resultats; 
if($nb_resultats > 1) { echo ' résultats'; } else { echo ' résultat'; } 
?>
 pour la recherche : "  <? echo $requete ?> "</p></center><br/></div>
<?
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<div style="background-color:#dbc19d">
<br/>
<h4 style="margin-left:400px"><? echo $donnees['nom_fonction']; ?></h4><br/>
<h6 style="margin-left:400px"><? echo $donnees['texte']; ?><br/><a href="<? echo $donnees['lien']; ?>"><? echo $donnees['lien']; ?></a>
</h6></div>
<?
} // fin de la boucle
?><div style="background-color:#dbc19d"><br/><br/><br/><br/><br/><br/><br/><br/>
<br/>
<center>
<a href="rechercher.php">Faire une nouvelle recherche</a></center></p></div>
<?
} // pas de recherches
else
{ include('cssmenu/menu_source/index.php');
?>
<div style="background-color:#dbc19d">
<h3 style="margin-left:300px">Pas de résultats</h3><br/><br/>
<center><div style="width:1000px">
<form action="rechercher.php" method="Post">
<div class="input-group custom-search-form">
   
<input name="requete" type="text" class="form-control" placeholder="Entrer votre recherche : ">
<span class="input-group-btn">
<button class="btn btn-default" type="submit" >
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form>
</div></center><center>
<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="rechercher.php">Réessayez</a> avec autre chose.</p></center>
</div>
<?
}
mysql_close(); 
}
else
{
include('cssmenu/menu_source/index.php');
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .custom-search-form{
    margin-top:5px;
} 
</style>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<center><p><h3><b>Entrer votre recherche : </b></h3></p></center>


<center><div style="width:1000px">
<form action="rechercher.php" method="Post">
<div class="input-group custom-search-form">
   
<input name="requete" type="text" class="form-control" placeholder="Entrer votre recherche : ">
<span class="input-group-btn">
<button class="btn btn-default" type="submit" >
<span class="glyphicon glyphicon-search"></span>
</button>
</span>
</div>
</form>
</div></center>
<?php
}

?>