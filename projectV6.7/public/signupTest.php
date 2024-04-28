<?php
require_once '../lib/user/user.php'; 

function testIsValidPassword()
{
    $user = new User(); // Instantiate your class

    // Test valid password
    $password = "Password1@";
    $isValid = $user->isValidPassword($password);
    echo "<p>Password: $password - IsValid: " . ($isValid ? 'True' : 'False') . "</p>";

    // Test invalid password (less than 8 characters)
    $password = "Pass1@";
    $isValid = $user->isValidPassword($password);
    echo "<p>Password: $password - IsValid: " . ($isValid ? 'True' : 'False') . "</p>";

    // Test invalid password (no special characters)
    $password = "Password1";
    $isValid = $user->isValidPassword($password);
    echo "<p>Password: $password - IsValid: " . ($isValid ? 'True' : 'False') . "</p>";
    echo "<br>";

    
}

function testIsValidNumber(){
    $user = new User();

    $phone = "123-456-7890";
    $phoneValid = $user->isValidNumber($phone);
    echo "<p>Phone: $phone - IsValid: " . ($phoneValid ? 'True' : 'False') . "</p>";

    $phone = "123456789";
    $phoneValid = $user->isValidNumber($phone);
    echo "<p>Phone: $phone - IsValid: " . ($phoneValid ? 'True' : 'False') . "</p>";

    $phone = "123 456 7890";
    $phoneValid = $user->isValidNumber($phone);
    echo "<p>Phone: $phone - IsValid: " . ($phoneValid ? 'True' : 'False') . "</p>";

    $phone = "123-4567890";
    $phoneValid = $user->isValidNumber($phone);
    echo "<p>Phone: $phone - IsValid: " . ($phoneValid ? 'True' : 'False') . "</p>";
    echo "<br>";

}

function testAddUser()
{
    $user = new User(); // Instantiate your class

    // Test valid user addition
    $password = "Password1@";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Password1@", "123 Main St", "123-456-7890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Password1@, ", "address: 123 Main St, ", "number: 123-456-7890}";
    echo "<p>Valid User Addition: " . ($result ? 'True' : 'False') . "</p>";

    // Test invalid password
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Pass1@", "123 Main St", "123-456-7890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Pass1@, ", "address: 123 Main St, ", "number: 123-456-7890}";
    echo "<p>Invalid Password: " . ($result === "Password must be at least 8 characters long and contain at least one special character." ? 'True' : 'False') . "</p>";
    echo "<br>";

    // Test valid user addition with valid phone number and password
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Password1@", "123 Main St", "123-456-7890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Password1@, ", "address: 123 Main St, ", "number: 123-456-7890}";
    echo "<p>Valid User Addition (Valid Phone Number): " . ($result ? 'True' : 'False') . "</p>";

    // Test valid user addition with invalid phone number (less than 10 digits)
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Password1@", "123 Main St", "1234567890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Pass1@, ", "address: 123 Main St, ", "number: 123456789}";
    echo "<p>Invalid User Addition (Invalid Phone Number - Length): " . ($result === "Phone number must be in XXX-XXX-XXXX format" ? 'True' : 'False') . "</p>";

    // Test valid user addition with invalid phone number (invalid format)
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Pass1@", "123 Main St", "123-4567890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Pass1@, ", "address: 123 Main St, ", "number: 123-4567890}";
    echo "<p>Invalid User Addition (Invalid Phone Number Format): " . ($result === "Phone number must be in XXX-XXX-XXXX format" ? 'True' : 'False') . "</p>";

    // Test valid user addition with invalid phone number (invalid format (spaces))
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Password1@", "123 Main St", "123 456 7890");
    echo "{Fname: John, ", "Lname: Doe, ", "username: johndoe, ", "email: john@example.com, ", "password: Pass1@, ", "address: 123 Main St, ", "number: 123 456 7890}";
    echo "<p>Invalid User Addition (Invalid Phone Number Format (spaces): " . ($result === "Phone number must be in XXX-XXX-XXXX format" ? 'True' : 'False') . "</p>";
}

// Call the test functions
testIsValidPassword();
testIsValidNumber();
testAddUser();
?>
