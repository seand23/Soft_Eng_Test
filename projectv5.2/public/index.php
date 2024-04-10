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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

            <section class="featured-items">
                <div class='hotsuits'><h3>Hot Suits Today!</h3></div>
                    <div class="slideshow1-container">

                        <div class="mySlides fade">
                            <a href="store.php"><img src="images/boss.jpg" style="width:50%"></a>    
                        </div>

                        <div class="mySlides fade">
                            <a href="store.php"><img src="images/CK.jpg" style="width:50%"></a>  
                        </div>

                        <div class="mySlides fade">
                            <a href="store.php"><img src="images/gucci.jpg" style="width:50%"></a>   
                        </div>

                        <div class="mySlides fade">
                            <a href="store.php"><img src="images/tedBaker.jpg" style="width:50%"></a>    
                        </div>

                        <div class="mySlides fade">
                            <a href="store.php"><img src="images/tommy.jpg" style="width:50%"></a>   
                        </div>
                    </div>
            </section>

            <div class="newStock">
                <h3>New In Stock!</h3>
                    <div class="slideshow2-container">

                    <div class="mySlide">
                        <img src="images/nsSuit1.jpg" style="width:100%">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlide">
                        <img src="images/nsSuit2.webp" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlide">
                        <img src="images/nsSuit3.jpg" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>

                
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>

                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
    </main>

<?php
require 'layout/footer.php';
?>

