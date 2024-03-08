let cart = [];

    function addToCart(productName, productPrice) {
        cart.push({ name: productName, price: productPrice });
        updateCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1); // Remove item at given index
        updateCart();
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