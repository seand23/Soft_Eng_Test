<?php
require_once "../lib/user/user.php";
require_once "../lib/order.php";
require_once "../lib/checkout.php";


$checkout = new Checkout();
$username = $_SESSION['username'];
$order = new Order();
$checkout -> sendOrderToDB();

$user = new User();
$userId = $user->getUserIdByUsername($username);

if ($_SESSION['username'] == false) {
    header("location:login-register.php");
    exit;
}


?>
<?php require_once 'layout/header.php'; ?>
<main>
    <h1>Your Cart:</h1>
    <?php $order -> displayCartItems() ?>

    <body>
        <form action="" method="POST" name="checkout">
        <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $item) {
            if ($item['quantity'] > 0) {
                echo '<input type="hidden" name="products[' . $productId . '][productName]" value="' . $item['productName'] . '">';
                echo '<input type="hidden" name="products[' . $productId . '][price]" value="' . $item['price'] . '">';
                echo '<input type="hidden" name="products[' . $productId . '][quantity]" value="' . $item['quantity'] . '">';
            }
        }
    }
    ?>
            <button type="submit" class="button">Confirm purchase</button>
        </form>
    </body>
</main>

<?php require 'layout/footer.php'; ?>