<?php
try
{
	$bdd = new PDO('mysql:host=x;dbname=x', 'x', 'x');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>