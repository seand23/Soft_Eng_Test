<?php
require 'lib/functions.php';
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $brandName = $_POST['brandName'];
        $supplierID = $_POST['supplierID'];
    
        // Call the addProduct function
        if (addProduct($productName, $price, $brandName, $supplierID)) {
            echo "Product added successfully.";
        } else {
            echo "Error: Unable to add product.";
        }
    }
?>

<?php
require 'layout/header.php';
?>
<body>
    <div class="add-product">
        <h1>Add Product</h1>
        <form action="admin.php" method="POST">
            <label for="productName">Product Name:</label><br>
            <input type="text" id="productName" name="productName" required><br>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" min="0.01" step="0.01" required><br>

            <label for="brandName">Brand Name:</label><br>
            <input type="text" id="brandName" name="brandName" required><br>

            <label for="brandName">Supplier ID: (See notes for supplier ID's)</label><br>
            <input type="text" id="supplierID" name="supplierID" required><br>

            <!-- You may add more fields here for additional product information -->

            <input type="submit" value="Add Product">
        </form>
    </div>
</body>
<?php
require 'layout/footer.php';
?>

