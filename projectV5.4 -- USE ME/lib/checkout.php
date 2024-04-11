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
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Your cart is empty.";
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
            return true;
        } else {
            return false;
        }
    }
}
}



