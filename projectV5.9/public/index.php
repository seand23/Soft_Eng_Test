<?php
require 'layout/header.php';
require '../lib/functions.php';
?>

<main>
    <?php if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<div class='centered-text'><h1>Hello $username!</h1></div>";
    } else {
        echo "<div class='centered-text'><h1>Hello Guest!</h1></div>";
    }
    ?>

<div class='note2'>
    <h1>Welcome to Blanch Suits</h1>
    <br>
    <p>Click/Tap the image to browse suits now!
    </p>
</div>

<div class="click-me">
    <p><a href="store.php">HOT SUITS! --></a></p>
</div>

    <div class="slideshow1-container">

        <div class="mySlides fade">
            <a href="store.php"><img src="images/sImage.jpg"></a>
        </div>

        <div class="mySlides fade">
            <a href="store.php"><img src="images/sImage2.webp"></a>
        </div>

        <div class="mySlides fade">
            <a href="store.php"><img src="images/sImage3.jpg"></a>
        </div>

        <div class="mySlides fade">
            <a href="store.php"><img src="images/sImage4.jpg"></a>
        </div>

        <div class="mySlides fade">
            <a href="store.php"><img src="images/sImage5.png"></a>
        </div>

    </div>
    <br>
    <br>

    <div class="newStock">
        <h3>New In Stock!</h3>
        <div class="slideshow2-container">

             <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
             
            <div class="mySlide">
                <img src="images/nsSuit1.jpg">
            </div>

            <div class="mySlide">
                <img src="images/nsSuit2.webp">
            </div>

            <div class="mySlide">
                <img src="images/nsSuit3.jpg">
            </div>

            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>


</main>

<?php
require 'layout/footer.php';
?>