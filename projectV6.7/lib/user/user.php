<?php

require '../lib/user/clean.php';
class User
{

    function isValidPassword($password)
    {
        return strlen($password) >= 8 && preg_match('/[!@#$%^&*]/', $password)===1;
    }

    function isValidNumber($phone)
    {
        return preg_match("/^\d{3}-\d{3}-\d{4}$/", $phone)===1;
    }

    function addUser($firstname, $lastname, $username, $email, $password, $address, $phone)
    {
        $pdo = get_connection();
    
        if (!$this -> isValidPassword($password)) {
            return "Password must be at least 8 characters long and contain at least one special character."; // Password does not meet requirements
        }

        // Check if the phone number matches the XXX-XXX-XXXX format
        if (!$this->isValidNumber($phone)) {
            return "Phone number must be in XXX-XXX-XXXX format";
        }

        // Remove hyphens from the phone number and count digits
        $Digits = preg_replace('/[^0-9]/', '', $phone);

        // Check if the phone number meets the length requirement
        if (strlen($Digits) !== 10) {
            return false; // Invalid phone number length
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

                // Validate phone number
                $phoneValid = $this->isValidNumber($phone);
                if ($phoneValid !== true){
                    echo "<h3 style = 'color: red;' >Phone number must be in XXX-XXX-XXXX format</h3>";
                }
                else{
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
            }
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

