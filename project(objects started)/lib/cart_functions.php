<?php

//check if the user is logged in
function checkLoggedIn() {
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if not logged in
        header('Location: login.php');
        exit();
    }
}
