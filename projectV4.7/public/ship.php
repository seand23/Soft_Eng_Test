<?php
require_once "../lib/user/user.php";
require_once "../lib/order.php";
$order = new Order();
require_once "../lib/checkout.php";
$checkout = new Checkout();
$username = $_SESSION['username'];
$user = new User();
$userId = $user->getUserIdByUsername($username);
    // Retrieve cart information from session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $totalPrice = 0; // Initialize total price
        $datePurchase = date('Y-m-d H:i:s'); // Get current date and time

        // Calculate total price and quantity
        foreach ($_SESSION['cart'] as $productId => $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Send order to database
        $result = $checkout->sendOrderToDB($totalPrice, $datePurchase, $userId);

        if ($result) {
            echo "Order placed successfully.";
        } else {
            echo "Failed to place order.";
        }
    }
if ($userId !== null) {
    echo "User ID: " . $userId;
} else {
    echo "User not found.";
}

?>
<?php require_once 'layout/header.php'; ?>
<main>
    <h1>CHECKOUT TEST</h1>
    <?php $order->displayCartItems() ?>

    <body>
        <form action="" method="post" name="checkout">
        <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $item) {
            if ($item['quantity'] > 0) {
                echo '<input type="hidden" name="products[' . $productId . '][productName]" value="' . $item['productName'] . '">';
                echo '<input type="hidden" name="products[' . $productId . '][price]" value="' . $item['price'] . '">';
                echo '<input type="hidden" name="products[' . $productId . '][quantity]" value="' . $item['quantity'] . '">';
            }
        }
    }
    ?>
            <button type="submit">Confirm purchase</button>
        </form>
    </body>
</main>

<?php require 'layout/footer.php'; ?>