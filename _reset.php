<?php 

require_once 'function.php';
require_once 'db_config.php';

// logged_only();


if(isset($_GET['id']) && isset($_GET['reset_token']))
{
	session_start();


	$user_id = $_GET['id'];
	$reset_token = $_GET['reset_token'];

	$query = ("SELECT * FROM users WHERE id = '$user_id' AND reset_token = '$reset_token' AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE) ");

	$result = mysqli_query($connexion, $query);

	if(!$result)
	{
		printf("La requête n'a pas aboutie %s", mysqli_error($connexion));
		exit();
	}

	$user = mysqli_fetch_row($result);


	if($user)
	{
		if(!empty($_POST))
		{
			if(!empty($_POST['password']) && $_POST['password'] === $_POST['password2'] )
			{
				$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
				$id = $_GET['id'];

				$query = "UPDATE users SET password = $password WHERE id =  $id ";

				if(mysqli_query($connexion, $query))
				{

					$_SESSION['flash']['success'] = "Votre mot de passe a bien été mis à jour";

					$_SESSION['auth'] = $user;

					header("Location: account.php");
					exit();
				}
			}else{

				$_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas";
			}
		}
		else{

			$_SESSION['flash']['danger'] = "Vous devez saisir les mots de passe";
			header("Location: reset.php");
		}
		
	}
	else{

		// session_start();

		$_SESSION['flash']['danger'] = "Ce lien n'est pas valide";
		header("Location: index.php");
		exit();
	}

}
else{

	header("Location: index.php");
	exit();

}


?>

<br>
<p>Voulez-vous vraiment réinitialiser votre mot de passe</p>

<form method="POST" action="account.php">

	<div>
		<input type="password" name="password1">
	</div>

	<div>
		
		<input type="password" name="password2">

	</div>
	<input type="submit" name="valider" value="Réinitialiser">
</form>