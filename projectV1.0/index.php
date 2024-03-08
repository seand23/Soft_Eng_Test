<?php
require 'layout/header.php';
require 'lib/functions.php';
?>
 
    <main>
        <div class="container">
            <h1>Hello <?php echo $_SESSION['username']; ?>!</h1>
            <section class="featured-items">
                <h3>Hot Suits Today!</h3>
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
        </div>
    </main>

<?php
require 'layout/footer.php';
?>

