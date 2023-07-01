const removeProductButtons =
    document.getElementsByClassName("remove-product");
for (var i = 0; i < removeProductButtons.length; i++) {
    removeProductButtons[i].addEventListener("click", function (event) {
        event.target.parentElement.remove();
            updateTotal();
    })
}

function updateTotal() {
    let totalAmount = 0;
    const cartProducts = document.getElementsByClassName("cart-product");

    for (var i = 0; i < cartProducts.length; i++) {
        const productPrice = cartProducts[i].getElementsByClassName("cart-product-price")[0].innerText.replace("R$", "").replace(",", ".");
        const productQuantity = cartProducts[i].getElementsByClassName("product-qtd-input")[0].value;

        totalAmount += (productPrice + productQuantity);
    }

    //arredondar o valor de duas casas decimais
    totalAmount = totalAmount.toFixed(2);

    //substituir o . pela virgula
    totalAmount = totalAmount.replace(".", ",");

    //adicionar valor total ao pop-up
    document.querySelector(".container2 span").innerText = "R$" + totalAmount;
}
