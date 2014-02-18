<?php

require __DIR__ . '/vendor/autoload.php';

$session = new Session();
$session->start();
$session->destroy();

?>