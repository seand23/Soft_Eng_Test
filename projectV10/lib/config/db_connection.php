<?php
//getting connection to db -- to be tested -SD
//uses config.php to store db credentials
function get_connection(){
    require 'config.php';
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        //connection errors
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}
