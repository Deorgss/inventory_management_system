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

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update($id, $data) {
        // Упрощенный пример обновления
        $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['price'], $id]);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
