<?php
require 'lib/functions.php';
$suits = get_suits();
$suits = array_reverse($suits);
?>

<?php
require 'layout/header.php';
?>
    <main>
        <div class="container">
            <section class="featured-items">
                <h2>Featured Suits</h2>
                <div class="featured-suits">
                    <img src="images/stock.jpg" alt="Featured suit 1">
                    <img src="images/stock.jpg" alt="Featured suit 2">
                </div>
            </section>
        </div>
    </main>

<?php
require 'layout/footer.php';
?>

