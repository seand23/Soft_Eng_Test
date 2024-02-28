<?php
require 'lib/functions.php';
$suits = get_suits();
var_dump($suits);
?>

<?php
require 'layout/header.php';
?>
    <main>
        <div class="container">
                <h2>Featured Suits</h2>
                <?php foreach ($suits as $testsuit) { ?>
              <blockquote class="test">
                <h2><?php echo $testsuit['id']?></h2>
                <h2><?php echo $testsuit['suit_name']?></h2>
                <h2><?php echo $testsuit['brand']?></h2>
                <h2><?php echo $testsuit['price']?></h2>
              </blockquote>
              <img src="images/<?php echo $testsuit['image'];?>" class="image"/>
              <?php }?>
        </div>
    </main>

<?php
require 'layout/footer.php';
?>