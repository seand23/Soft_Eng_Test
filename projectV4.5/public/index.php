<?php
require 'layout/header.php';
require '../lib/functions.php';
?>
 
    <main>
    <?php if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div class='centered-text'><h1>Hello $username!</h1></div>";
    } else {
    echo "<div class='centered-text'><h1>Hello Guest!</h1></div>";
    }
    ?>
    <h2>y</h2>
    <h2>y</h2>

            <section class="featured-items">
                <div class='hotsuits'><h3>Hot Suits Today!</h3></div>
                    <div class="slideshow-container">

                        <div class="mySlides fade">
                            <div class="numbertext">1 / 5</div>
                            <a href="store.php"><img src="images/boss.jpg" style="width:50%"></a>    
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 5</div>
                            <a href="store.php"><img src="images/CK.jpg" style="width:50%"></a>  
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 5</div>
                            <a href="store.php"><img src="images/gucci.jpg" style="width:50%"></a>   
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">4 / 5</div>
                            <a href="store.php"><img src="images/tedBaker.jpg" style="width:50%"></a>    
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">5 / 5</div>
                            <a href="store.php"><img src="images/tommy.jpg" style="width:50%"></a>   
                        </div>
                    </div>
            </section>
    </main>

<?php
require 'layout/footer.php';
?>

