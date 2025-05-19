<?php
class Router
{
    private $routes = [];

    // Define a GET route
    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    // Define a POST route
    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    // Handle the incoming request
    public function resolve($uri, $method)
    {
        // Normalize the URI (remove trailing slashes)
        $uri = rtrim($uri, '/');
        $uri = str_replace("/FoodFusion", "", $uri);

        $uri = $uri === '' ? '/' : $uri;
        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        if (is_callable($action)) {
            call_user_func($action);
        } elseif (is_array($action)) {
            $controller = new $action[0]();
            $method = $action[1];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Call the method without passing $_POST as arguments
                call_user_func([$controller, $method]);
            } else {
                call_user_func([$controller, $method]);
            }
        } else {
            echo "Invalid route action.";
        }
    }
}
