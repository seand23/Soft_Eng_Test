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
}

function testAddUser()
{
    $user = new User(); // Instantiate your class

    // Test valid user addition
    $password = "Password1@";
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Password1@", "123 Main St", "123-456-7890");
    echo "<p>Valid User Addition: " . ($result ? 'True' : 'False') . "</p>";

    // Test invalid password
    $result = $user->addUser("John", "Doe", "johndoe", "john@example.com", "Pass1@", "123 Main St", "123-456-7890");
    echo "<p>Invalid Password: " . ($result === "Password must be at least 8 characters long and contain at least one special character." ? 'True' : 'False') . "</p>";
}

// Call the test functions
testIsValidPassword();
testAddUser();
?>
