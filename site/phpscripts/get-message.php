<?php
session_start();
include('functions.php');
// bdd
$db = db_connect();
?>
<?php

$checkUser = $db->prepare("SELECT * FROM chat_accounts WHERE account_id = :id AND account_login = :login ");
$checkUser->execute(array(
	'id' => $_SESSION['id'],
	'login' => $_SESSION['pseudo']
));	
$countUser = $checkUser->rowCount();
if($countUser == 0) {
	// On indique qu'il y a une erreur de type unlog
	// donc que l'utilisateur connecté n'a pas de compte
	$json['error'] = 'unlog';
	// On supprime les sessions
	unset($_SESSION['time']);
	unset($_SESSION['id']);
	unset($_SESSION['login']);
} else {
	// On indique qu'il n'y a aucune erreur
	$json['error'] = '0';
	// ON PEUT CONTINUER !!!
}
$checkUser->closeCursor();

// Encodage de la variable tableau json et affichage
echo json_encode($json);
?>
<?php
// Affichage de l'annonce //////////////////////////////////////////
$query = $db->query("SELECT * FROM chat_annonce LIMIT 0,1");
while ($data = $query->fetch())
	$json['annonce'] = $data['annonce_text'];
$query->closeCursor();
?>