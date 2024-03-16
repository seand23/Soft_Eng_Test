<?php
require_once '../lib/products/products.php';
session_start();
class Order{
    public function addToCart($productId) {
        $productObj = new Products();
        
        $product = $productObj->getProductById($productId);
        
        if ($product) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                $_SESSION['cart'][$productId] = array(
                    'productName' => $product['productName'],
                    'price' => $product['price'],
                    'quantity' => 1
                );
            }
            return true;
        }
        return false;
    }
        public function displayCartItems() {
            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Your cart is empty.";
                return;
            }
    
            foreach ($_SESSION['cart'] as $productId => $item) {
                echo "Product ID: $productId, Name: {$item['productName']}, Price: {$item['price']}, Quantity: {$item['quantity']} <br>";
            }
        }
}
