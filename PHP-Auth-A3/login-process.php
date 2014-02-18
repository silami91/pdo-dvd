//use a class called auth and method called attempt
//start with pdo
<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();

$request = Request::createFromGlobals();
$auth = new ITP\Auth();
$userName = $request->request->get('username');
$email = $request->request->get('email');
if($session->get('email') != null)
{
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}

if($auth->attempt($userName, $email) == 1)
{
    $session->set('email',$userName);
    $session->set('username', $email);
    $session->set('loginTime', time());
    $session->getFlashBag()->set('successfulLogin', 'You have successfully logged in.');
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
    //login
}
else
{
    $session->getFlashBag()->set('errorLogin', 'Error logging in. Please check your username and password.');
    $response = new RedirectResponse('login.php');
    return $response->send();
    //flash message"Cant login"
}

