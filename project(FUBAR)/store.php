<?php
require 'lib/functions.php';
$suits = get_suits();
$cart = get_cart();

$page = 'store.php';
$action = filter_input(INPUT_GET, 'action');
switch ($action){
  case 'cart':
      displayCart();
      break;
  case 'addToCart':
      $id = filter_input(INPUT_GET, 'id');
      addToCart($id);
      displayCart();
      break;
  case 'removeFromCart':
      $id = filter_input(INPUT_GET, 'id');
      removeFromCart($id);
      displayCart();
      break;
  default:
      displayProducts();
      break;
}
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
    <div class="product-grid">
      <?php foreach ($suits as $suit) { ?>
      <!-- <img src="images/<?php //echo $suit['image'];?>" class="image"/> -->
      <div class="product">
        <blockquote>
          <h2><?php echo $suit['productID']?></h2>
          <h2><?php echo $suit['productName']?></h2>
          <h2><?php echo $suit['price']?></h2>
          <h2><?php echo $suit['brandName']?></h2>
          
          <a href="?action=addToCart&id=<?php echo $suit['productID']; ?>" class="cartB"><p>Add to Basket</p></a>       </blockquote>
      </div>
      <?php }?>
    </div>
  </main>

<?php
require 'layout/footer.php';
?>