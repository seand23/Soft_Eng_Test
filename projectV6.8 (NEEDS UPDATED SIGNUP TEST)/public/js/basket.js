let cart = [];

function addToCart(productName, productPrice) {
    cart.push({ name: productName, price: productPrice });
    updateCart();
    saveCartToLocalStorage(); // Save cart data to localStorage
}

function removeFromCart(index) {
    cart.splice(index, 1); // Remove item at given index
    updateCart();
    saveCartToLocalStorage(); // Save cart data to localStorage
}

function updateCart() {
    const cartItemsElement = document.getElementById("cartItemsBody");
    const totalPriceElement = document.getElementById("totalPrice");

    cartItemsElement.innerHTML = "";
    let totalPrice = 0;

    cart.forEach((item, index) => {
        const row = document.createElement("tr");
        const nameCell = document.createElement("td");
        const priceCell = document.createElement("td");
        const removeCell = document.createElement("td"); // Cell for remove button

        nameCell.textContent = item.name;
        priceCell.textContent = item.price.toFixed(2);

        const removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.classList.add("button", "remove-button"); // Add button styling
        removeButton.addEventListener("click", () => {
            removeFromCart(index);
        });

        removeCell.appendChild(removeButton);

        row.appendChild(nameCell);
        row.appendChild(priceCell);
        row.appendChild(removeCell); // Append remove button cell to the row

        cartItemsElement.appendChild(row);

        totalPrice += item.price;
    });

    totalPriceElement.textContent = totalPrice.toFixed(2);

    // Display cart popup
    document.getElementById("cartPopup").style.display = "block";
}

function closeCart() {
    document.getElementById("cartPopup").style.display = "none";
}

//save cart data to localStorage
function saveCartToLocalStorage() {
    localStorage.setItem("cart", JSON.stringify(cart));
}

//load cart data from localStorage
function loadCartFromLocalStorage() {
    const storedCart = localStorage.getItem("cart");
    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCart();
    }
}

function getCartItems() {
    return cart;
}

// Load cart data from localStorage when the page loads
loadCartFromLocalStorage();
