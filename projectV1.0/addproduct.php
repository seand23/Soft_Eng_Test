<?php
require 'lib/user.php';
require 'lib/admin.php';
    $admin = new admin();
    $admin->productFormHandler();
?>

<?php
require 'layout/header.php';
?>
<body>
    <div class="add-product">
        <h1>Add Product</h1>
        <form action="addproduct.php" method="POST">
            <label for="productName">Product Name:</label><br>
            <input type="text" id="productName" name="productName" required><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>

            <label for="brandName">Brand Name:</label><br>
            <input type="text" id="brandName" name="brandName" required><br>

            <label for="suplierID">Supplier ID: (See notes for supplier ID's)</label><br>
            <input type="text" id="supplierID" name="supplierID" required><br>

            <!-- You may add more fields here for additional product information -->

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
<?php
require 'layout/footer.php';
?>

