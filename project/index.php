<?php
require 'layout/header.php';
require 'lib/functions.php';
?>
    <main>
        <div class="container">
            <h1>Hello <?php echo $_SESSION['username']; ?>!</h1>
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

