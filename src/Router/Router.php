<?php
namespace Src\Router;

use Exception;

use Src\services\MoviesServices;
use Src\Controller\MoviesController;

class Router
{
    public $routes = [];

    public static function load($path)
    {
        $router = new static;
        require $path;
        return $router;
        
    }
    public function direct($uri)
    {

        if(array_key_exists($uri, $this->routes))
        {
            $pointer = (explode("@", $this->routes[$uri]));
            return $this->callAction($pointer[0], $pointer[1]);
        }

        throw new Exception('No routes defined');
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    protected function callAction($controller, $action)
    {
        $controller;

        if($controller === 'MoviesController') {
            $moviesServices = new MoviesServices();
             $controller = new \Src\Controller\MoviesController($moviesServices); 
            return $controller->$action();
        } 
        $controller = new \Src\Controller\CommentsController();

        if(!method_exists($controller, $action)) {
            throw new Exception(
                "this {$controller} does not have this method action"
            );
        }

        
        return $controller->$action();
    }
}

