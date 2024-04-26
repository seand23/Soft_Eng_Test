<?php

require '../lib/user/clean.php';
class User
{

    function isValidPassword($password)
    {
    //     // Debugging message to check the length of the password
    // echo "Password Length: " . strlen($password) . "<br>";

    // // Debugging message to check if the password contains special characters
    // echo "Contains Special Character: " . (preg_match('/[!@#$%^&*]/', $password) === 1 ? 'Yes' : 'No') . "<br>";

    // Password must be at least 8 characters long and contain at least one special character
        // Password must be at least 8 characters long and contain at least one special character
        return strlen($password) >= 8 && preg_match('/[!@#$%^&*]/', $password)===1;
    }

    function addUser($firstname, $lastname, $username, $email, $password, $address, $phone)
    {
        $pdo = get_connection();
    
        if (!$this -> isValidPassword($password)) {
            return "Password must be at least 8 characters long and contain at least one special character."; // Password does not meet requirements
        }
    
        $encryptPass =  password_hash($password, PASSWORD_DEFAULT); //Reintech.io //PASSWORD_DEFAULT uses bcrypt
    
        //insert user into database
        $query = "INSERT INTO users (firstname, lastname, username, email, password, address, phone) VALUES (:firstname, :lastname, :username, :email, :password, :address, :phone)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $encryptPass);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
    
        if ($stmt->execute()) {
            return true; //user added successfully
        } else {
            return false; //errror adding user
        }
    }
    
    function userFormHandler()
    {
        $message = ""; // Initialize message variable
    
        //check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //retrieve form data if its from register form
            if (isset($_POST['signup'])) {
                $firstname =    escape($_POST['firstname']);
                $lastname =     escape($_POST['lastname']);
                $username =     escape($_POST['username']);
                $email =        escape($_POST['email']);
                $password =     escape($_POST['password']);
                $address =      escape($_POST['address']);
                $phone =        escape($_POST['phone']);
    
                $passwordValid = $this->isValidPassword($password);
                if ($passwordValid !== true) {
                    echo "<h3 style='color: red;' >Password must be at least 8 characters long and contain at least one special character. Please sign up again</h3>";
                } else {
                
                    //improve this with html and css this is just purely functional - SD
                    if ($this->addUser($firstname, $lastname, $username, $email, $password, $address, $phone)) {
                        echo "User added successfully."; 
                    } else {
                        echo "****Error**** Unable to add user."; 
                    }
                }
            }
            
            echo "<p>$message</p>"; 
        }
    }
    
    

    function userLogin()
    {
        $pdo = get_connection();
        if (isset($_POST['Submit'])) {
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
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $username;
                    header("location:ship.php"); //redirect to cart
                    exit; //stop running code when redirect
                } else {
                    echo 'Incorrect username or password';
                }
            } else {
                echo 'User does not exist';
            }
        }
    }

    function getUserIdByUsername($username)
    {
        $pdo = get_connection();

        // Prepare a SELECT query to fetch the user's ID based on the username
        $query = "SELECT userID FROM users WHERE username = :username";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['userID']; // Return the user ID
        } else {
            return null; // Return null if user not found
        }
    }
}

