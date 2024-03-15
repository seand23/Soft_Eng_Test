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

/*

ALL CART FUNCTIONALITIES ARE HERE vvv


*/
function getShoppingCart() {
    $cartItems = [];
    if(isset($_SESSION['cart'])){
        $cartItems = $_SESSION['cart'];
    }
    return $cartItems;
}

function displayProducts()
{
 $suits = get_suits();
 require_once __DIR__ . '../cart.php';
}

function displayCart(){
    $suits = get_suits();
    $cartItems = getShoppingCart();
    if (!empty($cartItems)){
        require_once __DIR__ . '../cart.php';
    } else{
        echo "Your shopping cart is empty.";
    }
}

function addItemToCart($testsuit){
    $cartItems = getShoppingCart();
    $cartItems[$testsuit]= 1;

    $_SESSION['cart'] = $cartItems;
}

function removeItemFromCart($testsuit)
{
    $cartItems = getShoppingCart();
    unset($cartItems[$testsuit]);
    $_SESSION['cart'] = $cartItems;
}

function getQuantity($testsuit, $cart)
{
    if(isset($cart[$testsuit])){
        return $cart[$testsuit];
    } 
    else {
        return 0;
    }
}
function increaseCartQuantity($testsuit)
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($testsuit, $cartItems);
    $newQuantity = $quantity + 1;
    $cartItems[$testsuit] = $newQuantity;
    $_SESSION['cart'] = $cartItems;
}

function reduceCartQuantity($testsuit)
{
    $cartItems = getShoppingCart();
    $quantity = getQuantity($testsuit, $cartItems);
    $newQuantity = $quantity - 1;
    if($newQuantity < 1){
        unset($cartItems[$testsuit]);
    } else {
        $cartItems[$testsuit] = $newQuantity;
    }   
    $_SESSION['cart'] = $cartItems;
}