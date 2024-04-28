<?php
require_once '../lib/user/user.php';
$user = new User();
//smple data for testing
$firstname = "John";
$lastname = "Doe";
$username = "johndoe";
$email = "johndoe@example.com";
$password = "Test@123";
$address = "123 Main St";
$phone = "555-555-5555";

//call the addUser function with sample data
$result = $user -> addUser($firstname, $lastname, $username, $email, $password, $address, $phone);

echo "User added successfully.<br>";
echo "First name: " . $firstname . "<br>";
echo "Last Name: " . $lastname . "<br>";
echo "Username: " . $username . "<br>";
echo "Email: " . $email . "<br>";
echo "Password: " . $password . "<br>"; 
echo "Address: " . $address . "<br>";
echo "Phone: " . $phone . "<br>";