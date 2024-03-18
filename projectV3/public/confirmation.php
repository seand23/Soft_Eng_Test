<?php
require_once "../lib/order.php";
$order = new Order();
?>
<?php require_once 'layout/header.php';?>
<main>
<h1>Thank you</h1>
<h2>Your Order has been confirmed</h2>
<?php $order->displayCartItems()?>
<?php require 'layout/footer.php';?>