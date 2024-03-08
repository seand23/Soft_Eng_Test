<?php
require 'lib/functions.php';
$suits = get_suits();
?>

<?php
require 'layout/header.php';
?>
  <main>
    <h1>Featured Suits</h1>
    <div class="product-grid">
      <?php foreach ($suits as $testsuit) { ?>
      <!-- <img src="images/<?php //echo $testsuit['image'];?>" class="image"/> -->
      <div class="product">
        <blockquote>
          <h2><?php echo $testsuit['userID']?></h2>
          <h2><?php echo $testsuit['adminID']?></h2>
          <h2><?php echo $testsuit['productID']?></h2>
          <h2><?php echo $testsuit['productName']?></h2>
          <h2><?php echo $testsuit['price']?></h2>
          <h2><?php echo $testsuit['brandName']?></h2>
          <button class="cartB" onclick="addToCart('<?php echo $testsuit['productName']?>', <?php echo $testsuit['price']?>)">Add to Basket</button>
        </blockquote>
      </div>
      <?php }?>
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