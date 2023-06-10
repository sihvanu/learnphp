<?php
namespace App;

class Router {
    static $routes = [];
    private $uri;
    public function __construct($uri) {
        $this->uri = $uri;
    }

    public function match() {
        foreach(self::$routes as $route) {
            if($route['path'] === $this->uri) {
                return $route;
            }
        }
        return false;
    }

    static function addRoute($path, $action) {
        self::$routes[] = ['path' => $path, 'action' => $action];
    }
}