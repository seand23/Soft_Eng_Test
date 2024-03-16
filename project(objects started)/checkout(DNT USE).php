<?php
require_once 'lib/cart_functions.php'; // Include file with cart functions
checkLoggedIn(); // Assuming this function checks if the user is logged in
//$cartItems = get_cart(); // Get cart items
?>
<?php require_once 'layout/header.php'; // Include header ?>
<main>
    <div class="container">
        <?php
        $total = calculateTotalPrice($cartItems); // Calculate total price
        ?>
        <h2>Shopping Cart</h2>
        <div class="row">
            <div class="col font-weight-bold text-center">
                Image
            </div>
            <div class="col font-weight-bold">
                Item
            </div>
            <div class="col font-weight-bold text-right">
                Price
            </div>
            <div class="col font-weight-bold text-center">
                Quantity
            </div>
            <div class="col font-weight-bold text-right">
                Subtotal
            </div>
            <div class="col font-weight-bold">
                Action
            </div>
        </div>
        <?php foreach ($cartItems as $id => $item) { ?>
            <div class="row border-top">
                <div class="col product text-center">
                    <!-- Placeholder for Image -->
                    <img src="/images/placeholder.jpg" alt="Placeholder">
                </div>
                <div class="col">
                    <?php if(isset($item['name'])) { ?>
                        <h4><?php echo $item['name']; ?></h4>
                        <?php echo $item['description']; ?>
                    <?php } else { ?>
                        <p>No product information available.</p>
                    <?php } ?>
                </div>
                <div class="col price text-right align-self-center">
                    <?php if(isset($item['price'])) { ?>
                        $<?php echo number_format($item['price'], 2); ?>
                    <?php } else { ?>
                        Price not available
                    <?php } ?>
                </div>
                <div class="col text-center align-self-center">
                    <?php echo $item['quantity']; ?>
                </div>
                <div class="col price text-right align-self-center">
                    <?php if(isset($item['subtotal'])) { ?>
                        $<?php echo number_format($item['subtotal'], 2); ?>
                    <?php } else { ?>
                        Subtotal not available
                    <?php } ?>
                </div>
                <div class="col align-self-center">
                    <!-- Form to remove item from cart -->
                    <form action="/?action=removeFromCart&id=<?php echo $id; ?>" method="post">
                        <button class="btn btn-danger btn-sm">
                            Remove
                        </button>
                    </form>
                </div>
            </div>
        <?php } ?>
        <div class="row border-top">
            <div class="col-10 price text-right">
                Total: $<?php echo number_format($total, 2); ?>
            </div>
            <div class="col font-weight-bold">
                Total
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="checkout.php" class="button primary">Checkout</a>
            </div>
        </div>
    </div>
</main>
<?php require 'layout/footer.php'; // Include footer ?>
