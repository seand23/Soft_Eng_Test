<?php 
require_once 'products.php';

class General extends Products {
    public function displayAllSuits() {
        $suits = $this->get_suits();
        
        echo '<div class="product-grid">';
        
        foreach ($suits as $suit) { 
            echo '<div class="product">';
            echo '  <blockquote>';
            echo '  <img src="' . $suit['imageURL'] . '" alt="' . $suit['productName'] . '">';
            echo '    <h2>' . $suit['productName'] . '</h2>';
            echo '    <h2>' . $suit['price'] . '</h2>';
            echo '    <h2>' . $suit['brandName'] . '</h2>';
            echo '    <h2>' . $suit['colors'] . '</h2>';
            echo '    <h2>' . $suit['size'] . '</h2>';
            echo '    <a href="?action=addToCart&id=' . $suit['productID'] . '" class="cartB"><p>Add to Basket</p></a>';
            echo '    <a href="?action=rmCart&id=' . $suit['productID'] . '" class="cartB-rem"><p>Remove from Basket</p></a>';
            echo '  </blockquote>';
            echo '</div>';
        }
        
        echo '</div>';
    }
}
?>
