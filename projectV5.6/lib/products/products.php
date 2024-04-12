<?php
require_once '../lib/config/db_connection.php';
class Products {
    public function get_suits($limit = null){
        $pdo = get_connection();
    
        $query = 'SELECT * FROM products';
        if($limit){
            $query = $query .' LIMIT :resultLimit';
        }
        $stmt = $pdo->prepare($query);
        if($limit){
            $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
        }
        $stmt->execute();
        $suits = $stmt->fetchAll();
    
        return $suits;
    }

    public function getProductById($productId) {
        $pdo = get_connection();
    
        $query = 'SELECT * FROM products WHERE productID = :productId';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $product;
    }

    public function displayFilteredSuits($filters) {
        $pdo = get_connection();

    $query = "SELECT * FROM products WHERE 1=1";

/************************************************/
    // Append conditions for each filter
    if (!empty($filters['colors'])) {
        $query .= " AND colors = :colors";
    }
    if (!empty($filters['size'])) {
        $query .= " AND size = :size";
    }
    if (!empty($filters['tailored'])) {         //Tailored suits not made yet
        $query .= " AND tailored = :tailored";
    }
    if (!empty($filters['brandName'])) {
        $query .= " AND brandName = :brandName";
    }
    // Add conditions for other filters if needed

    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind parameters
    if (!empty($filters['colors'])) {
        $stmt->bindParam(':colors', $filters['colors']);
    }
    if (!empty($filters['size'])) {
        $stmt->bindParam(':size', $filters['size']);
    }
    if (!empty($filters['tailored'])) {
        $stmt->bindParam(':tailored', $filters['tailored']);
    }
    if (!empty($filters['brandName'])) {
        $stmt->bindParam(':brandName', $filters['brandName']);
    }
/************************************************/


    //Code from lines 38 - 69 was off chat purely because the 
    //filtering system was becoming to difficult

    // Execute the SQL query
    $stmt->execute();
    $suits = $stmt->fetchAll();

    // Display the filtered suits
    echo '<div class="product-grid">';
    foreach ($suits as $suit) {
        $suits = $this->get_suits();
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
    return $suits;
    }


}
        
