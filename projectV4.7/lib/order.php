<?php
require_once '../lib/products/products.php';
session_start();
class Order
{
    public function addToCart($productId)
    {
        $productObj = new Products();

        $product = $productObj->getProductById($productId);

        if ($product) {
            if (!isset ($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset ($_SESSION['cart'][$productId])) {
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
    public function rmFromCart($productId)
    {
        $productObj = new Products();

        $product = $productObj->getProductById($productId);

        if ($product) {
            if (!isset ($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset ($_SESSION['cart'][$productId])) {
                if ($_SESSION['cart'][$productId]['quantity'] > 0) { // Check if quantity is greater than 0
                    $_SESSION['cart'][$productId]['quantity']--;
                }
            } else {
                $_SESSION['cart'][$productId] = array(
                    'productName' => $product['productName'],
                    'price' => $product['price'],
                    'quantity' => 0
                );
            }
            return true;
        }
        return false;
    }
    public function displayCartItems()
    {
        if (!isset ($_SESSION['cart']) || empty ($_SESSION['cart'])) {
            echo "Your cart is empty.";
            return;
        }
        echo '<div class="product-grid">';
        foreach ($_SESSION['cart'] as $productId => $item) {
            if ($item['quantity'] > 0) {
                $productID = $productId;
                $productName = $item['productName'];
                $price = $item['price'];
                $quantity = $item['quantity'];

                echo '<div class="product">';
                echo '  <blockquote>';
                echo '    <h2>' . $productName . '</h2>';
                echo '    <h2>' . $price . '</h2>';
                echo '    <h2>Quantity: ' . $quantity . '</h2>';
                echo '  </blockquote>';
                echo '</div>';
            }
        }

        echo '</div>';
    }
}
