<?php
require_once "../lib/order.php";
$order = new Order();
?>
<?php require_once 'layout/header.php'; ?>
<main>
    <div class="confP">
    <h1>Thank you</h1>
    <h2>Your Order has been confirmed</h2>
    </div>
    <div class="Cost">
    <?php $order->displayCartItems() ?>
    </div>
    <?php require 'layout/footer.php'; ?>