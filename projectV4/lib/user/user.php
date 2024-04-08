<?php
require '../lib/config/db_connection.php';
class User{
    function addUser($firstname, $lastname, $username, $email, $password, $address, $phone) {
        $pdo = get_connection();
    

        
        //insert user into database
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

            //improve this with html and css this is just purely functional - SD
            if ($this->addUser($firstname, $lastname, $username, $email, $password, $address, $phone)) {
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
            if($user){
                //vrify the submitted password with the password from the database
                if ($password === $user['password']) {
                    $_SESSION['username'] = $username;
                    header("location:index.php");//redirect to homepage
                    exit;//stop running code when redirect
                } else {
                    echo 'Incorrect username or password';
                }
            } 
            else {
                echo 'User does not exist';
            }
        }
    }
}