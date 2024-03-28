<?php
require_once 'user.php';
session_start();
class Admin extends User{
    function addProduct($productName, $price, $brandName) {
        $pdo = get_connection();
    
        //insert product into database
        $query = "INSERT INTO products (productName, price, brandName) VALUES (:productName, :price, :brandName)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':brandName', $brandName);
    
        if ($stmt->execute()) {
            return true; //product added successfully
        } else {
            return false; //errror adding product
        }
    }
    
    public function deleteProduct($productName, $brandName) {
        $pdo = get_connection();
    
        // Delete the product from the database
        $query = "DELETE FROM products WHERE productName = :productName AND brandName = :brandName";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':brandName', $brandName);
    
        if ($stmt->execute()) {
            return true; // Product deleted successfully
        } else {
            return false; // Error deleting product
        }
    }
    function handleProducts($admin) {
        // Check if the form for adding a product is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['addProduct'])) {
                // Retrieve form data
                $productName = $_POST['productName'];
                $price = $_POST['price'];
                $brandName = $_POST['brandName'];
            
                // Call the addProduct function
                if ($admin->addProduct($productName, $price, $brandName)) {
                    echo "Product added successfully.";
                } else {
                    echo "Error: Unable to add product.";
                }
            } elseif (isset($_POST['deleteProduct'])) {
                // Retrieve form data
                $productName = $_POST['productName'];
                $brandName = $_POST['brandName'];
                
                // Call the deleteProduct function
                if ($admin->deleteProduct($productName, $brandName)) {
                    echo "Product deletion successful.";
                } else {
                    echo "Error: Unable to delete product.";
                }
            }
        }
    }

    function userLogin(){
        $pdo = get_connection();
        if(isset($_POST['Submit'])){
            //get the submitted username and password
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            //prepare a SELECT query to fetch the admin's data
            $query = "SELECT * FROM admins WHERE username LIKE :username";
            $statement = $pdo->prepare($query);
            $statement->bindParam(':username', $username);
            $statement->execute();
            $admin = $statement->fetch(PDO::FETCH_ASSOC);
            if($admin){
                //verify the submitted password with the password from the database
                if ($password === $admin['password']) {
                    $_SESSION['admin_username'] = $username;
                    header("location:addproduct.php");
                    exit;//stop running code when redirect
                } else {
                    echo 'Incorrect username or password';
                }
            } 
            else {
                echo 'Admin does not exist';
            }
        }
    }

    function handleLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['loginType'])) {
                $loginType = $_POST['loginType'];
                if ($loginType === 'user') {
                    $user = new user();
                    $user->userLogin();
                } elseif ($loginType === 'admin') {
                    $admin = new admin();
                    $admin->userLogin();
                }
            }
        }
    }
}