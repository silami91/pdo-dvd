<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
<?php

require __DIR__ . '/vendor/autoload.php';

use \Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;


$session = new Session();
$session->start();

if($session->get('password') != null)
{
    $response = new RedirectResponse('dashboard.php');
    $response->send();
}
?>
<form name="login" action='login-process.php' method="post">
	Username: <input type="text" name="username">
    <br>
	Password: <input type="password" name="password">
    <br>
	<input type="submit" value="Submit">
    <br>
    <?php foreach($session->getFlashbag()->get('errorLogin') as $message):
          echo $message;
          endforeach ?>
</form>
</body>
</html>