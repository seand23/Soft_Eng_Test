<?php   
require_once "../lib/order.php";
$order = new Order();
?>
<?php require_once 'layout/header.php';?>
<main>
<h1>CHECKOUT TEST</h1>
<?php $order->displayCartItems()?>
</main>
<?php require 'layout/footer.php';?>
