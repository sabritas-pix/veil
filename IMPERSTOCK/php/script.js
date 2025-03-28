document.addEventListener("DOMContentLoaded", function () {
    const productForm = document.getElementById("product-form");
    const productList = document.getElementById("product-list");
    let productId = 2; 

    productForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const name = document.getElementById("product-name").value;
        const category = document.getElementById("product-category").value;
        const stock = document.getElementById("product-stock").value;
        const price = document.getElementById("product-price").value;

        if (!name || !category || stock <= 0 || price <= 0) {
            alert("Por favor, llena todos los campos correctamente.");
            return;
        }

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${String(productId).padStart(3, "0")}</td>
            <td>${name}</td>
            <td>${category}</td>
            <td>${stock}</td>
            <td>$${price}</td>
            <td><button class="delete-btn">Eliminar</button></td>
        `;

        row.querySelector(".delete-btn").addEventListener("click", function () {
            row.remove();
        });

        productList.appendChild(row);

        productId++;

        productForm.reset();
    });

    document.querySelectorAll(".delete-btn").forEach(button => {
        button.addEventListener("click", function () {
            this.parentElement.parentElement.remove();
        });
    });
});
