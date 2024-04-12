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
<?php if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div class='note'><button class='close-btn' onclick='closeNote()'>X</button><h1>Welcome back $username!</h1></div>";
    } else {
    echo "<div class='note'><button class='close-btn' onclick='closeNote()'>X</button><h1>To complete purchase you will need to login/signup!</h1><p>Since you are not logged in, you will be redirected to the login page when you click your cart.</p></div>";
    }
    ?>
  <div class="holder">
    <aside class="filter">
      <h2>Filter Options</h2>
      <div class="filter-option">
      <form action="" method="get">
        <h3>Color</h3>
        <select name="colors">
          <option value="">Any</option>
          <option value="black">Black</option>
          <option value="blue">Blue</option>
          <option value="grey">Grey</option>
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
        <select name="brandName">
          <option value="">Any</option>
          <option value="brand1">Brand 1</option>
          <option value="brand2">Brand 2</option>
          <option value="brand3">Brand 3</option>
        </select>
        <button type="submit">Apply Filters</button>
      </form>
      </div>
    </aside>
    <div class="filteredSuites">
    <?php
                $filters = [
                  'colors' => isset($_GET['colors']) ? $_GET['colors'] : "",
                  'size' => isset($_GET['size']) ? $_GET['size'] : "",
                //'tailored' => isset($_GET['tailored']) ? $_GET['tailored'] : "",
                  'brandName' => isset($_GET['brand']) ? $_GET['brand'] : ""
              ];
    $general->displayFilteredSuits($filters)
    ?>
    </div>
    </main>
    <?php
    require 'layout/footer.php';
    ?>