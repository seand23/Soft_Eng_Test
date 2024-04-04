<?php
require_once "../lib/order.php";
$order = new Order();
require_once "../lib/checkout.php";
$checkout = new Checkout();
if (isset ($_POST['checkout'])) {
    $totalPrice = $_POST['totalPrice'];
    $datePurchase = $_POST['datePurchase'];
    $userID = $_POST['userID'];

    $result = $checkout->sendOrderToDB($totalPrice, $datePurchase, $userID);

    if ($result) {
        echo "Order placed successfully.";
    } else {
        echo "Failed to place order.";
    }
}
?>
<?php require_once 'layout/header.php'; ?>
<main>
    <h1>CHECKOUT TEST</h1>
    <?php $order->displayCartItems() ?>

    <body>
        <form action="confirmation.php" method="post">
            <input type="hidden" name="totalPrice" value="49.98">
            <input type="hidden" name="datePurchase" value="2024-02-28 15:30:00">
            <input type="hidden" name="userID" value="1">
            <button type="submit" name="checkout">Confirm purchase</button>
        </form>
    </body>
</main>

<?php require 'layout/footer.php'; ?>