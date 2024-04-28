<?php
require_once '../lib/checkout.php';


class TestSendOrderToDB {
    public function testSendOrder() {
        // Simulate a POST request
        $_SERVER["REQUEST_METHOD"] = "POST";

        $checkout = new Checkout();
        $order = new Order();
        $order->manageCart();

        $_SESSION['username'] = 'john_doe';
        $_SESSION['cart'] = array(
            '1' => array(
                'productName' => 'SUPER OBVIOUS',
                'price' => 420.00,
                'quantity' => 3
            ),
            '2' => array(
                'productName' => 'Test Product B',
                'price' => 1.00,
                'quantity' => 1
            ),
            '3' => array(
                'productName' => 'Test Product C',
                'price' => 1.00,
                'quantity' => 5
            )
        );

        $result = $checkout->sendOrderToDB();

        // Verify the outcome
        if ($result === true) {
            echo "Order successfully sent to the database.";
        } else {
            echo "Error sending order to the database.";
        }
    }
}

// Create an instance of the test class and run it
$test = new TestSendOrderToDB();
$test->testSendOrder();
?>
