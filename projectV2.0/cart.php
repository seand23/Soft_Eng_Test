<?php
require 'layout/header.php';
require 'lib/functions.php';
require 'style/basket.css';
$total = 0;

$pageTitle = 'Your Cart';
$suits  = get_suits();
$cartItems = getShoppingCart();

$action = filter_input(INPUT_GET, 'action');
switch ($action) {
  case 'cart':
    displayCart();
 
    break;
 
    case 'addToCart':

      $testsuit = filter_input(INPUT_GET, 'id');
      addItemToCart($testsuit);
      displayCart() ;   
      break;

    case 'removeFromCart':

      $testsuit = filter_input(INPUT_GET, 'id');
      removeItemFromCart($testsuit);
      displayCart() ;  
      break;

    case 'changeCartQuantity':

      $testsuit = filter_input(INPUT_GET, 'id');
      $amount = filter_input(INPUT_POST, 'amount');

      if ($amount == 'increase'){
        increaseCartQuantity($testsuit);
      }
      else {
        reduceCartQuantity( $testsuit );  
      }
      break;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart: <?php $pageTitle ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    t
    <h1>Checkout</h1>
    
    <h2>Cart Items:</h2>
    <div class="row">
 <div class="col font-weight-bold text-center">
 Image
 </div>
 <div class="col font-weight-bold">
 Item
 </div>
 <div class="col font-weight-bold text-right">
 Price
 </div>
 <div class="col font-weight-bold text-center">
 Quantity
 </div>
 <div class="col font-weight-bold text-right">
 Subtotal
 </div>
 <div class="col font-weight-bold">
 Action
 </div>

 <?php
foreach($cartItems as $id => $quantity):
$suits = $testsuits[$id];
$price = $testsuit['price'];
$subtotal = $quantity * $price;
 // update total
$total += $subtotal;
 // format prices to 2 d.p.
$price = number_format($price, 2);
 $subtotal = number_format($subtotal, 2);

?>

 </div>
<?php endforeach; ?>
</div>
    <ul>
        <?php
        
        ?>
    </ul>

    <!-- <h2>Total Price: <?php //echo calculateTotalPrice($cart); ?></h2> -->

    <h2>Enter Your Details:</h2>
    <form action="process_checkout.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>
        
        <input type="submit" value="Complete Purchase">
    </form>
</body>
</html>
<?php
require 'layout/footer.php';
?>