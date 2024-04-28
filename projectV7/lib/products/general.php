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
     //setters
     private $imageURL;
     private $productName;
     private $price;
     private $brandName;
     private $colors;
     private $size;
 
     public function setImageURL($url) {
         $this->imageURL = $url;
     }
 
     public function setProductName($prodName) {
         $this->productName = $prodName;
     }
 
     public function setPrice($price) {
         $this->price = $price;
     }
 
     public function setBrandName($brandName) {
         $this->brandName = $brandName;
     }
 
     public function setColors($colors) {
         $this->colors = $colors;
     }
 
     public function setSize($size) {
         $this->size = $size;
     }
 

     public function displaySuits() {
        echo "Validation:";
        echo "<br>";
        echo "Image URL: " . $this->imageURL . "<br>";
        echo "Product Name: " . $this->productName . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Brand Name: " . $this->brandName . "<br>";
        echo "Colors: " . $this->colors . "<br>";
        echo "Size: " . $this->size . "<br>";
        echo "<br>";
    }
    
}
?>
