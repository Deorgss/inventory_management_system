<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    private $productModel;

    public function __construct($db) {
        $this->productModel = new Product($db);
    }

    // Обработка GET /products
    public function index() {
        $products = $this->productModel->getAll();
        header('Content-Type: application/json');
        echo json_encode($products);
    }

    // Обработка POST /products
    public function store() {
        // Читаем JSON из тела запроса
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['name'], $input['price'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }

        $id = $this->productModel->create($input);
        
        http_response_code(201);
        echo json_encode(["message" => "Product created", "id" => $id]);
    }
}
