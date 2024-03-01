<?php
include 'db_connection.php';
function get_suits($limit = null){
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

function addProduct($productName, $price, $brandName, $supplierID) {
    $pdo = get_connection();

    //insert product into database
    $query = "INSERT INTO products (productName, price, brandName, supplierID) VALUES (:productName, :price, :brandName, :supplierID)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':productName', $productName);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':brandName', $brandName);
    $stmt->bindParam(':supplierID', $supplierID);

    if ($stmt->execute()) {
        return true; //product added successfully
    } else {
        return false; //errror adding product
    }
}