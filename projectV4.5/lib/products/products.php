<?php
require_once '../lib/config/db_connection.php';
class Products {
    public function get_suits($limit = null){
        $pdo = get_connection();
    
        $query = 'SELECT * FROM products';
        if($limit){
            $query = $query .' LIMIT :resultLimit';
        }
        $stmt = $pdo->prepare($query);
        if($limit){
            $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
        }
        $stmt->execute();
        $suits = $stmt->fetchAll();
    
        return $suits;
    }

    public function getProductById($productId) {
        $pdo = get_connection();
    
        $query = 'SELECT * FROM products WHERE productID = :productId';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $product;
    }
        
}