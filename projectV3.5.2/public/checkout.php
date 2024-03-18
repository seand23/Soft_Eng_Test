<?php   
require_once "../lib/order.php";
$order = new Order();
?>
<?php require_once 'layout/header.php';?>
<main>
<h1>CHECKOUT TEST</h1>
<?php $order->displayCartItems()?>
<body>
    <button><a href="confirmation.php">Confirm purchase</a></button>
</body>
</main>

<?php require 'layout/footer.php';?>
