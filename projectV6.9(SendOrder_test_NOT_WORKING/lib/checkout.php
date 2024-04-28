<?php
require_once 'order.php';
// class Checkout{
//     function sendOrderToDB(){
//         //take order in as an object ///not done
//         //prepare sql statement "INSERT INTO ...." //done?
//         //write order to db
//         //give user confirmation //done
//     }
// }


//*** Orders in the database, I think we should remove the adminID from the foreign key but Idrk what logic we should use ***/
class Checkout extends Order{

        function sendOrderToDB(){
            
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the user is logged in and if the cart is not empty
        if (!isset($_SESSION['username']) || empty($_SESSION['username']) || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Invalid user or empty cart.";
            return false;
        }
        // Get the username from the session
        $username = $_SESSION['username'];

        // Get the user ID from the username
        $user = new User();
        $userID = $user->getUserIdByUsername($username);

        // Check if the user ID exists
        if ($userID === null) {
            echo "User ID not found.";
            return false;
        }

            $totalPrice = 0;
            foreach ($_SESSION['cart'] as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }

            $username = $_SESSION['username'];
            $user = new User();
            $userID = $user->getUserIdByUsername($username);
            
            if ($userID === null) {
                echo "User ID not found.";
                return false;
            }

            $pdo = get_connection();
            $query ="INSERT INTO orders (totalPrice, datePurchase, userID) VALUES (:totalPrice, :datePurchase, :userID)";
            $stmt = $pdo -> prepare($query);
            $stmt->bindParam(':totalPrice', $totalPrice);
            //$stmt->bindParam(':delAddress', $delAddress);
            $stmt->bindParam(':datePurchase', $datePurchase);
            $datePurchase= date("Y-m-d H:i:s");
            $stmt->bindParam(':userID', $userID);


            if ($stmt -> execute()) {
                //unset($_SESSION['cart']);
                header("location: confirmation.php");
                return true;
            } else {
                return false;
            }
        }
    }
private $totalPrice;
private $datePurchase;
private $userID;

public function setTotalPrice($totalPrice) {
    $this->totalPrice = $totalPrice;
}

public function setDatePurchase($datePurchase) {
    $this->datePurchase = $datePurchase;
}

public function setUserID($userID) {
    $this->userID = $userID;
}

public function displayOrderDetails() {
    echo "Order Details:";
    echo "<br>";
    echo "Total Price: " . $this->totalPrice . "<br>";
    echo "Date of Purchase: " . $this->datePurchase . "<br>";
    echo "User ID: " . $this->userID . "<br>";
    echo "<br>";
}
}



