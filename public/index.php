<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;
use App\Controllers\ProductController;

$config = [
    'host' => 'localhost',
    'db'   => 'inventory_db',
    'user' => 'root',
    'pass' => ''
];

$db = Database::getConnection($config);
$controller = new ProductController($db);

// Простейший роутинг
$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($requestUri === '/products' && $requestMethod === 'GET') {
    $controller->index();
} elseif ($requestUri === '/products' && $requestMethod === 'POST') {
    $controller->store();
} else {
    http_response_code(404);
    echo json_encode(["message" => "Route not found"]);
}
