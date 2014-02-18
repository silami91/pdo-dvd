<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
</head>
<body>
<?php

require __DIR__ . '/vendor/autoload.php';

$session = new Session();
$session->start();

if($session->email != null)
{
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}
?>
<form name="login" action='login-process.php' method="post">
	Username: <input type="text" name="username"> 
	Password: <input type="password" name="password">
	<input type="submit" value="Submit"> //submit ot login process
    <?php foreach ($view['session']->getFlash('notice') as $message): ?>
        <div class="flash-notice">
            <?php echo "<div class='flash-error'>$message</div>" ?>
        </div>
    <?php endforeach; ?>
</form>
</body>
</html>