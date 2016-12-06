<?php
session_start();

require_once 'settings.php';
require_once 'includes.php';

$controller = 'Index';
$action = 'Index';
$parameters = null;

if (isset($_GET['route'])) {
    $route = explode('/', $_GET['route']);
    if (isset($route[0]))
    {
        $controller = $route[0];
    }
    if (isset($route[1]))
    {
        $action = $route[1];
    }
    if (isset($route[2]))
    {
        $parameters = $route[2];
    }
}

$controllerName = "\\Controller\\{$controller}Controller";

$controllerObj = new $controllerName();

if (is_callable(array($controllerObj, $action)))
{
    $controllerObj->$action($parameters);
} else {
    echo 'Starting default!';
    $controllerObj->index($parameters);
}
