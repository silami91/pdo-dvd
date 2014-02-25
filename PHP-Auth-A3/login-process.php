<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;
use ITP\Auth\Auth;

$session = new Session();
$session->start();
$request = Request::createFromGlobals();

$auth = new Auth();

$userName = $request->request->get('username');
$password = $request->request->get('password');

if($session->get('password') != null)
{
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}

if($auth->attempt($userName, $password) == true)
{
    $session->set('userName',$userName);
    $session->set('password', $password);
    $session->set('loginTime', Carbon::now());
    $session->getFlashBag()->set('successfulLogin', 'You have successfully logged in.');
    $response = new RedirectResponse('dashboard.php');
    $response->send();
    /*login*/
}
else
{
    $session->getFlashBag()->set('errorLogin', 'Error logging in. Please check your username and password.');
    $response = new RedirectResponse('login.php');
    $response->send();
    /*flash message Cant login*/
}

