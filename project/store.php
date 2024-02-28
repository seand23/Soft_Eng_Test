<?php
require 'lib/functions.php';
$suits = get_suits();
$suits = array_reverse($suits);
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
                <h2><?php echo $testsuit['name']?></h2>
              </blockquote>
              <?php }?>
        </div>
    </main>

<?php
require 'layout/footer.php';
?>