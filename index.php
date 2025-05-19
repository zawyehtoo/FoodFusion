<?php
ob_start();
require_once 'routes.php';

// Get the current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

// Resolve the route
$router->resolve($uri, $method);
ob_end_flush();
?>