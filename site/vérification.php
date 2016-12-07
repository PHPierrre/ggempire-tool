<?php
//Attribution des variables de session
$lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
$id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
$pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';
if (isset ($_COOKIE['pseudo']) && empty($id))
{
$_SESSION['pseudo'] = $_COOKIE['pseudo']; 

/* On créé la variable de session à partir du cookie pour ne pas avoir à vérifier 2 fois sur les pages qu'un membre est connecté. */

}
if (isset ($_COOKIE['pseudo']) && !empty($id))
{
echo'connexion ok';
}
if (!isset ($_COOKIE['pseudo']) && empty($id))
{
	echo'pas ok';
//echo'T\'as cru voir les secrets de l\'alliance par touts les moyens, sauf que celui qui a fait ce site a bien veillez a ce que des gens comme toi y accede pas , espion! ,  taupe! oust ! ';
}

?>