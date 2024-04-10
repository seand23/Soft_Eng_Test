<?php
require_once "../lib/products/general.php";
$general = new General();
?>

<?php
require_once "../lib/order.php";

$order = new Order();
if (isset($_GET['action']) && $_GET['action'] === 'addToCart' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    $order->addToCart($productId);
}
$rmOrder = new Order();
if (isset($_GET['action']) && $_GET['action'] === 'rmCart' && isset($_GET['id'])) {
    $productId = $_GET['id'];
    $rmOrder->rmFromCart($productId);
}


?>

<?php
require 'layout/header.php';
?>

<main>
  <div class="holder">
    <aside class="filter">
      <h2>Filter Options</h2>
      <div class="filter-option">
        <h3>Color</h3>
        <select name="color">
          <option value="">Any</option>
          <option value="black">Black</option>
          <option value="blue">Blue</option>
          <option value="gray">Gray</option>
        </select>
      </div>
      <div class="filter-option">
        <h3>Size</h3>
        <select name="size">
          <option value="">Any</option>
          <option value="small">Small</option>
          <option value="medium">Medium</option>
          <option value="large">Large</option>
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
        </select>
      </div>
    </aside>
    <?php
    $general->displayAllSuits();
    ?>

    <?php
    require 'layout/footer.php';
    ?>