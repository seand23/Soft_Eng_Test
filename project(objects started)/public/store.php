<?php
require_once '../lib/functions.php';
require_once "../lib/general.php";
$general = new General();
$suits = get_suits();
displayProducts();

?>

<?php
require 'layout/header.php';
?>
  <main>
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
<?php
  $general->displayAllSuits();
  ?>
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