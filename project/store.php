<?php
require 'lib/functions.php';
$suits = get_suits();
var_dump($suits);
?>

<?php
require 'layout/header.php';
?>
  <main>
    <h2>Featured Suits</h2>
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
        </blockquote>
      </div>
      <?php }?>
    </div>
  </main>

<?php
require 'layout/footer.php';
?>