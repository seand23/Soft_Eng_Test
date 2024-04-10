<?php
require '../lib/user/admin.php';
$admin = new admin();
$admin->handleProducts($admin);
if ($_SESSION['admin'] == false) {
    header("location:login-register.php");
    exit;
}
?>

<?php
require 'layout/header.php';
?>

<body>
    <div class="admin-panel">
        <div class="add-product">
            <h1>Add Product</h1>
            <form action="addproduct.php" method="POST">
                <label for="productName">Product Name:</label><br>
                <input type="text" id="productName" name="productName" required><br>

                <label for="price">Price:</label><br>
                <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>

                <label for="brandName">Brand Name:</label><br>
                <input type="text" id="brandName" name="brandName" required><br>

                <label for="colors">Color:</label><br>
                <input type="text" id="colors" name="colors" required><br>

                <label for="size">Size:</label><br>
                <input type="text" id="size" name="size" required><br>

                <input type="submit" name="addProduct" value="Add Product">
            </form>
        </div>


        <div class="add-product">
            <h1>Delete Product</h1>
            <form action="addproduct.php" method="POST">
                <label for="productName">Product Name:</label><br>
                <input type="text" id="productName" name="productName" required><br>

                <label for="brandName">Brand Name:</label><br>
                <input type="text" id="brandName" name="brandName" required><br>

                <input type="submit" name="deleteProduct" value="Delete Product">
            </form>
        </div>
    </div>
</body>
<?php
require 'layout/footer.php';
?>