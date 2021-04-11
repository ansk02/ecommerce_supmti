<?php 

require_once 'db_config.php';
require_once 'function.php';

$user_id = $_GET['id'];
$token = $_GET['token'];


$query = "SELECT * FROM users WHERE id = $user_id ";

$result = mysqli_query($connexion, $query);

if(!$result)
{
	printf("Requête non aboutie %s", mysqli_error($connexion));
	exit();
}

$user = mysqli_fetch_array($result);

session_start();

if($user && $user['confirmation_token'] == $token){

	$query = "UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = $user_id ";

	if(mysqli_query($connexion, $query))
	{

		$_SESSION['flas']['success'] = "Votre compte a bien été validé";
		$_SESSION['auth'] = $user;
		header("Location: account.php");
		exit();
	}
}
else{
	
	$_SESSION['flash']['danger'] = "Ce lien de confirmation n\'est plus valide, car il a déjà été utilisé";
    header("Location: login.php");
    exit();
}


?>