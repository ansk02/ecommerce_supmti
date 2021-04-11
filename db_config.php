<?php 

$host = "localhost";
$username = "abdul";
$password ="keita";
$database = "tuto2";

define('FB_APP_ID', '203699678220487');
define('FB_SECRET', 'df6608ed70e3e7e00136ed8cccf7b654');
define('FB_REDIRECT_URI', 'http://localhost/account.php');


$connexion = mysqli_connect($host, $username, $password, $database);

if(!$connexion)
{
	die("Impossible d'établir la connexion...");
	exit();
}


?>