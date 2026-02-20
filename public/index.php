<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\ProductController;

$router = new Router();

// Регистрируем маршруты
$router->add('GET', '/products', [ProductController::class, 'index']);
$router->add('POST', '/products', [ProductController::class, 'store']);
$router->add('GET', '/products/{id}', [ProductController::class, 'show']);
$router->add('PUT', '/products/{id}', [ProductController::class, 'update']);
$router->add('DELETE', '/products/{id}', [ProductController::class, 'delete']);

// Запускаем
$router->dispatch();