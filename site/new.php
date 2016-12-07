<head>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#dbc19d">
<?php
include('bdd.php');
$reponse = mysql_query('SELECT * FROM news ORDER BY id DESC') or die(mysql_error());
while($donnees = mysql_fetch_array($reponse))
{
?>





<div style="background-color:#dbc19d">
<div style="width:330px;" class="<?php echo $donnees['icone']; ?>"><span class="<?php echo $donnees['style']; ?>"></span> <?php echo $donnees['par']; ?> : <?php echo $donnees['date']; ?><br><?php echo $donnees['texte']; ?></div><br/><br/>
</div>

<?php
}
?>

</body>