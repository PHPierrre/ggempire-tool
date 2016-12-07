<?php session_start(); ?>
<html>
<head>
<title>Accueil</title>
<meta charset="UTF-8">
<link href="../styles/styles-b.css" rel="stylesheet" media="all" type="text/css"> 
</head>

<body>
<table><td><div style="width:250px"></div></td><td>
<div  style="background-color:rgba(255,255,255,1.00);width:1000">
<form action="index-membres.php" method="post" class="form-horizontal" >
<fieldset>
<?php
if(isset(htmlspecialchars($_GET(['e'])))){
echo'
<div><font color="#FF0000">Vous devez être connectés afin de voir les outils de l\'alliance.</font></div>';
 }
?>
<!-- Form Name -->

<legend><center>Connexion aux outils de l'alliance</center></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pseudo">Pseudo :</label>  
  <div class="col-md-4">
 
  <input id="pseudo"  name="pseudo" type="text" placeholder="pseudo" class="form-control input-md"  required"" >
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Mot de passe :</label>
  <div class="col-md-4">
    <input required"" required id="password" name="password" type="password" placeholder="mot de passe" class="form-control input-md">
    
  </div>
</div>
<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="checkboxes"></label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="checkboxes-0">
      <input type="checkbox" name="souvenir" id="checkboxes-0" value="">
      Se souvenir de moi?
    </label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="connexion"></label>
  <div class="col-md-4">
    <button id="connexion" name="connexion" class="btn btn-success">Valider</button>
  </div>
</div> </form>
<?php include('dublebouton.html'); ?>
</div>
<br/>
</div></td></table>

</body>
</html>