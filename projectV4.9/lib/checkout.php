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
    function sendOrderToDB($delAddress, $datePurchase, $userID, $totalPrice){
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "Your cart is empty.";
            return false;
        }

        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        $pdo = get_connection();
        $query ="INSERT INTO orders (totalPrice, delAddress, datePurchase, userID) VALUES (:totalPrice, :delAddress, :datePurchase, :userID)";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':totalPrice', $totalPrice);
        $stmt->bindParam(':delAddress', $delAddress);
        $stmt->bindParam(':datePurchase', $datePurchase);
        $stmt->bindParam(':userID', $userID);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_purchase'])) {
            // Assume delAddress, datePurchase, and userID are obtained from the form submission
            $delAddress = $_POST['delAddress'];
            $datePurchase = $_POST['datePurchase'];
            $totalPrice = $_POST['totalPrice'];
            $userID = $_POST['userID'];
            // Call the sendOrderToDB function
            $result = $checkout->sendOrderToDB($delAddress, $datePurchase, $userID, $totalPrice);
            
            // Handle the result
            if ($result) {
                echo "Order placed successfully.";
                // Optionally redirect the user to a confirmation page
                // header("Location: confirmation.php");
                // exit();
            } else {
                echo "Failed to place order.";
            }
        }
        if ($stmt -> execute()) {
            unset($_SESSION['cart']);
            return true;
        } else {
            return false;
        }
    }
}

