<?php
namespace App\Core;

class Router {
    private array $routes = [];

    // Регистрируем маршрут (метод, путь, контроллер и метод)
    public function add(string $method, string $path, array $handler) {
        // Превращаем /products/{id} в регулярку /products/(\d+)
        $path = preg_replace('/\{id\}/', '(\d+)', $path);
        $this->routes[] = [
            'method' => $method,
            'path' => "#^" . $path . "$#",
            'handler' => $handler
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Наша универсальная очистка пути (из прошлого шага)
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        $uri = '/' . trim(str_replace($basePath, '', $uri), '/');

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['path'], $uri, $matches)) {
                array_shift($matches);
                [$controllerClass, $action] = $route['handler'];
                
                // Передаем базу при создании контроллера
                $controller = new $controllerClass(); 
                return $controller->$action(...$matches);
            }
        }

        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
    }
}