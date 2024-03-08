<?php
require 'layout/header.php';
require 'lib/functions.php';
require 'style/basket.css';
?>
 <script src="/js/basket.js"></script>

 <div id="cartPopup">
    <h2>Cart</h2>
    <table id="cartItems">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                <td id="totalPrice">0</td>
            </tr>
        </tfoot>
    </table>
    <button onclick="closeCart()">Close</button>
</div>


<?php
require 'layout/footer.php';
?>