<?php

require 'lib/functions.php';
$suits = get_suits();
$cartItems = getShoppingCart();

$page = 'store.php';
$action = filter_input(INPUT_GET, 'action');
if ('cart' == $action){
  $page = 'cart.php';
}
?>

<?php
require 'layout/header.php';
?>
  <main>
    <title>Blanch Suits: <?php $pageTitle ?></title>
  <div class="container">
  <aside class="filter">
  <h2>Filter Options</h2>
  <div class="filter-option">
    <h3>Color</h3>
    <select name="color">
      <option value="">Any</option>
      <option value="black">Black</option>
      <option value="blue">Blue</option>
      <option value="gray">Gray</option>
      <!-- Add more color options as needed -->
    </select>
  </div>
  <div class="filter-option">
    <h3>Size</h3>
    <select name="size">
      <option value="">Any</option>
      <option value="small">Small</option>
      <option value="medium">Medium</option>
      <option value="large">Large</option>
      <!-- Add more size options as needed -->
    </select>
  </div>
  <div class="filter-option">
    <h3>Tailored</h3>
    <select name="tailored">
      <option value="">Any</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>
  <div class="filter-option">
    <h3>Brand</h3>
    <select name="brand">
      <option value="">Any</option>
      <option value="brand1">Brand 1</option>
      <option value="brand2">Brand 2</option>
      <option value="brand3">Brand 3</option>
      <!-- Add more brand options as needed -->
    </select>
  </div>
</aside>
    <div class="product-grid">
      <?php foreach ($suits as $testsuit => $product) :
        $price = number_format($product['productID'],2); ?>
      <!-- <img src="images/<?php //echo $testsuit['image'];?>" class="image"/> -->
      <div class="product">
        <blockquote>
          <h2><?php echo $product['userID']?></h2>
          <h2><?php echo $product['adminID']?></h2>
          <h2><?php echo $product['productID']?></h2>
          <h2><?php echo $product['productName']?></h2>
          <h2><?php echo $product['price']?></h2>
          <h2><?php echo $product['brandName']?></h2>
          <button class="cartB" onclick="addToCart('<?php echo $product['productName']?>', <?php echo $product['price']?>)" type="submit">Mock Review</button>
          <form action="/?action=addToCart&id<?= $testsuit?>">
          <!-- <form action="cart.php" method="post"> -->
        <button>Add to Cart</button>
      </form>
        </blockquote>
      </div>
      <?php endforeach;?>
    </div>
  </main>

  <!-- Cart Popup -->
  <div id="cartPopup" style="display: none;">
    <h2>Cart</h2>
    <table id="cartItems">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="cartItemsBody">
        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                <td id="totalPrice">0</td>
            </tr>
        </tfoot>
    </table>
    <button onclick="closeCart()">Close</button>
  </div>

<?php
require 'layout/footer.php';
?>