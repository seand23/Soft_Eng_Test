<?php
require_once '../lib/order.php';
$order = new Order();
$order -> manageCart();
// Simulate  a cart session
$_SESSION['cart'] = array(
    '1' => array(
        'productName' => 'Test Product A',
        'price' => 10.00,
        'quantity' => 3
    ),
    '2' => array(
        'productName' => 'Test Product B',
        'price' => 20.00,
        'quantity' => 1
    ),
    '3' => array(
        'productName' => 'Test Product C',
        'price' => 100.00,
        'quantity' => 5
    )
);

$order -> displayCartItems();
