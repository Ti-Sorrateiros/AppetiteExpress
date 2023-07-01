if (document.readyState == "loading ") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready()
}


function ready() {
    //botão de remover produto
    const removeProductButtons =
        document.getElementsByClassName("remove-product");
    for (var i = 0; i < removeProductButtons.length; i++) {
        removeProductButtons[i].addEventListener("click", removeProduct)
    }

    //campo de quantidade de produto
    const quantityInputs = document.getElementsByClassName("product-qtd-input");
    for(var i = 0; i < quantityInputs.length; i++){
        quantityInputs[i].addEventListener("change" , updateTotal)
    }

    //adicionar ao carrinho
    const addToCartButtons = document.getElementsByClassName("button-");
    for( var i = 0; i < addToCartButtons.length; i++){
        addToCartButtons[i].addEventListener("click", addProductToCart);
    }
}

function addProductToCart(event){
    const button = event.target
    //pegar os elementos 
    const productInfos = button.parentElement.parentElement
    //retornar imagem
    const productImage = productInfos.getElementsByClassName("product-image")[0].src
    //retornar o nome do produto
    const productTitle = productInfos.getElementsByClassName("product-title")[0].innerText
    //pegar valor do produto
    const productPrice = productInfos.getElementsByClassName("product-price")[0].innerText
}

function removeProduct(event) {
    event.target.parentElement.remove();
    updateTotal();
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



