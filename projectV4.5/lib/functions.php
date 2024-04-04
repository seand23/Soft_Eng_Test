<?php
include 'config/db_connection.php';

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

function displayProducts(){
    $suits = get_suits();
    require_once __DIR__ . '/../public/store.php';
}

// function get_cart(){
//     $cartItems = [];
//     if(isset($_SESSION['cart'])){
//         $cartItems = $_SESSION['cart'];
//     }

//     return $cartItems;
// }

// function addToCart($id){
//     $cartItems = get_cart();
//     $cartItems[$id] = 1;
//     $_SESSION['cart'] = $cartItems;
// }
// function removeFromCart($id){
//     $cartItems = get_cart();
//     unset($cartItems[$id]);
//     $_SESSION['cart'] = $cartItems;
// }
