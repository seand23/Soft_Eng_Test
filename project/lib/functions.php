<?php
function get_suits($limit = null){
    require 'db_connection.php';
    $pdo = get_connection();

    $query = 'SELECT * FROM suits';
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

function updateSuit(){
    require 'db_connection.php';
    $pdo = get_connection();

    
}