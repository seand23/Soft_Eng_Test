<?php
include 'db_connection.php';
session_start();
function get_suits($limit = null){
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
        if (addProduct($productName, $price, $brandName, $supplierID)) {
            echo "Product added successfully.";
        } else {
            echo "****Error**** Unable to add product.";
        }
    }
}

function addUser($firstname, $lastname, $username, $email, $password, $address, $phone) {
    $pdo = get_connection();

    //insert user into database
    //maybe password needs a special way of being put in???????
    $query = "INSERT INTO users (firstname, lastname, username, email, password, address, phone) VALUES (:firstname, :lastname, :username, :email, :password, :address, :phone)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);

    if ($stmt->execute()) {
        return true; //user added successfully
    } else {
        return false; //errror adding user
    }
}
function userFormHandler(){
    //check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //retrieve form data
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
    
        //call the addProduct function
        //improve this with html and css this is just purely functional - SD
        if (addUser($firstname, $lastname, $username, $email, $password, $address, $phone)) {
            echo "User added successfully.";
        } else {
            echo "****Error**** Unable to add user.";
        }
    }
}

function userLogin(){
    $pdo = get_connection();
    if(isset($_POST['Submit'])){
        //get the submitted username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        //prepare a SELECT query to fetch the user's data
        $query = "SELECT * FROM users WHERE username LIKE :username";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            //vrify the submitted password with the password from the database
            if ($password) {
                $_SESSION['username'] = $username;
                header("location:index.php");//redirect to homepage
                exit;//stop running code when redirect
            } else {
                echo 'Incorrect username or password';
            }
        } else {
            echo 'User does not exist';
        }
    }
}