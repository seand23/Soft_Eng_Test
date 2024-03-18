<?php

require '../lib/config/db_connection.php';

// class Checkout{
//     function sendOrderToDB(){
//         //take order in as an object ///not done
//         //prepare sql statement "INSERT INTO ...." //done?
//         //write order to db
//         //give user confirmation //done
//     }
// }


//*** Orders in the database, I think we should remove the adminID from the foreign key but Idrk what logic we should use ***/
class Checkout {
    function sendOrderToDB($orderID, /*$totalPrice,*/ $datePurchase, $userID){
        try {
        $pdo = get_connection();
        $query ="INSERT INTO orders (orderID, /*totalPrice, */datePurchase, userID) VALUES (:orderID, :totalPrice, :datePurchase, :userID)";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':orderID', $orderID);
        // $stmt->bindParam(':totalPrice', $totalPrice); don't do this yet
        $stmt->bindParam(':datePurchase', $datePurchase);
        $stmt->bindParam(':userID', $userID);

        $stmt -> execute();

        if ($stmt -> rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }  catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}

?>
