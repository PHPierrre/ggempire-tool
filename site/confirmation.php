<?php 

//recupération des informtions

$pseudo = ;
$pass = ;
$mail = $_POST[''] ;


// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

// Insertion
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email) VALUES(:pseudo, :pass, :email, CURDATE())');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass_hache,
    'email' => $email));
?>