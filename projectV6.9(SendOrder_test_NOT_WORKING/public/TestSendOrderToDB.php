<?php
require_once '../lib/checkout.php';

function testSendOrderToDB() {
    $order =  new Checkout();
    $totalPrice = 100.00;
    $datePurchase = "2024-04-26 12:00:00"; // Hardcoded date and time for testing
    $userID = 3;

    $result = $order->sendOrderToDB();

    // Display the test result
    echo "{Total: $totalPrice, Date is: $datePurchase, User ID: $userID}";
    echo "<p>Order confirmed: " . ($result ? 'True' : 'False') . "</p>";
}

// Call the test function
testSendOrderToDB();
