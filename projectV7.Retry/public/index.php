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
    <p>You can browse our website to find the best suit for you at a great pirce!
        Are you looking for a new tailored or branded suit to enhance your style? Blanch suits has the answer!.
        We have fully customisable stylish suits at the click of a button!. If you are looking for just a branded suit 
        we have that also. you can find all these stylish suits on our store page.
</p>
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