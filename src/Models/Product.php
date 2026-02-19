<?php
// src/Models/Product.php
namespace App\Models;

class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO products (name, sku, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$data['name'], $data['sku'], $data['quantity'], $data['price']]);
    }
}
