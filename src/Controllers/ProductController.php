<?php
namespace App\Controllers;

use App\Models\Product;
use App\Core\Database;

class ProductController {
    private $productModel;

    public function __construct() {
        $db = Database::getConnection();
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

    // Удаление товара
    public function delete($id) {
        if ($this->productModel->delete($id)) {
            echo json_encode(["message" => "Product $id deleted"]);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Product not found"]);
        }
    }

    // Обновление товара
    public function update($id) {
        $input = json_decode(file_get_contents('php://input'), true);
        if ($this->productModel->update($id, $input)) {
            echo json_encode(["message" => "Product $id updated"]);
        } else {
            http_response_code(400);
            echo json_encode(["message" => "Update failed"]);
        }
    }

    public function show($id) {
        $product = $this->productModel->find($id); // Метод find тоже нужно будет добавить в модель

        if ($product) {
            echo json_encode($product);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Product not found"]);
        }
    }
}
