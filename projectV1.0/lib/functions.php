<?php
include 'db_connection.php';

session_start();
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
