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
        <form action="" method="get">
        <h3>Color</h3>
        <select name="colors">
          <option value="">Any</option>
          <option value="black">black</option>
          <option value="blue">blue</option>
          <option value="gray">grey</option>
        </select>
      </div>
      <div class="filter-option">
        <h3>Size</h3>
        <select name="size">
          <option value="">Any</option>
          <option value="S">Small</option>
          <option value="M">Medium</option>
          <option value="L">Large</option>
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
          <option value="brand1">Brand1</option>
          <option value="brand2">Brand2</option>
          <option value="brand3">Brand3</option>
        </select>
      </div>
      <button type="submit">Apply Filters</button>
      </form>
    </aside>
    <?php
            $filters = [
              'colors' => isset($_GET['colors']) ? $_GET['colors'] : "",
              'size' => isset($_GET['size']) ? $_GET['size'] : "",
            //'tailored' => isset($_GET['tailored']) ? $_GET['tailored'] : "",
              'brandName' => isset($_GET['brand']) ? $_GET['brand'] : ""
          ];
    //$general->displayAllSuits();
    $general->displayFilteredSuits($filters);
    ?>

    <?php
    require 'layout/footer.php';
    ?>