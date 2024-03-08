<?php
class admin extends user{
    //additional methods specific to the admin class can be added here
    function deleteUser($userId) {
        $pdo = get_connection();

        // Delete user from the database
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $userId);
        
        if ($stmt->execute()) {
            return true; // User deleted successfully
        } else {
            return false; // Error deleting user
        }
    }

    function addProduct($productName, $price, $brandName, $supplierID) {
        $pdo = get_connection();
    
        //insert product into database
        $query = "INSERT INTO products (productName, price, brandName, supplierID) VALUES (:productName, :price, :brandName, :supplierID)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':brandName', $brandName);
        $stmt->bindParam(':supplierID', $supplierID);
    
        if ($stmt->execute()) {
            return true; //product added successfully
        } else {
            return false; //errror adding product
        }
    }
    
    function productFormHandler(){
        //check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //retrieve form data
            $productName = $_POST['productName'];
            $price = $_POST['price'];
            $brandName = $_POST['brandName'];
            $supplierID = $_POST['supplierID'];
        
            //call the addProduct function
            //improve this with html and css this is just purely functional - SD
            if ($this->addProduct($productName, $price, $brandName, $supplierID)) {
                echo "Product added successfully.";
            } else {
                echo "****Error**** Unable to add product.";
            }
        }
    }

    // Override the userFormHandler if necessary
    // function userFormHandler() {
    //     // Custom logic for admin user form handling
    // }

    // Override the userLogin if necessary
    // function userLogin() {
    //     // Custom logic for admin user login
    // }
}