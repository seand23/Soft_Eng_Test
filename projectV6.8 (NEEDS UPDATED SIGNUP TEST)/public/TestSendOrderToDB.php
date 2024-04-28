<?php
require_once '../lib/checkout.php';
require_once '../lib/order.php';

$checkout = new Checkout();
$order = new Order();
$order -> manageCart();

$_SESSION['username'] = 's';
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

$result = $checkout -> sendOrderToDB();

//verify the outcome
if ($result === true) {
    echo "Order successfully sent to the database.";
} else {
    echo "Error sending order to the database.";
}