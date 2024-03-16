<?php
require_once 'db_connection.php';
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
    
    function displayProducts(){
        $suits = get_suits();
        require_once __DIR__ . '/../public/store.php';
    }
}