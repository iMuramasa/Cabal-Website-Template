<?php
/**
 * Simple PHP Router - Handles routes and loads corresponding controllers
 */

class Router {
    private $routes = [];
    private $currentPage = 'home';
    
    public function __construct() {
        $this->routes = include __DIR__ . '/../config/routes.php';
        $this->determineCurrentPage();
    }
    
    private function determineCurrentPage() {
        $page = $_GET['page'] ?? 'home';
        
        if (!isset($this->routes[$page])) {
            $page = 'home';
        }
        
        $this->currentPage = $page;
    }
    
    public function getCurrentPage() {
        return $this->currentPage;
    }
    
    public function getPageTitle() {
        return $this->routes[$this->currentPage]['title'] ?? 'Cabal Online';
    }
    
    public function getRoutes() {
        return $this->routes;
    }
    
    public function isActivePage($page) {
        return $this->currentPage === $page;
    }
    
    public function dispatch() {
        $route = $this->routes[$this->currentPage];
        $controllerName = $route['controller'];
        $controllerFile = __DIR__ . "/../controllers/{$controllerName}.php";
        
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                return $controller->index();
            }
        }
        
        require_once __DIR__ . "/../controllers/HomeController.php";
        $controller = new HomeController();
        return $controller->index();
    }
    
    public function url($page = 'home') {
        if ($page === 'home') {
            return '/';
        }
        return "/?page={$page}";
    }
}
