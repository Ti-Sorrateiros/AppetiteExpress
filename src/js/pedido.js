let prato;
let bebida;


function escolherProduto1(){
    document.getElementById("selecionarProd").style.borderColor = "#8c060f";
    document.getElementById("selecionarProd1").style.borderColor = "white";
    prato = "selecionarProd";
}

function escolherProduto2() {
    document.getElementById("selecionarProd1").style.borderColor = "#8c060f";
    document.getElementById("selecionarProd").style.borderColor = "white";
    prato = "selecionarProd";

}

function escolherBebida1() {
    document.getElementById("selecionarBebi").style.borderColor = "#8c060f";
    document.getElementById("selecionarBebi1").style.borderColor = "white";
    bebida = "selecionarBebi";
}

function escolherBebida2() {
    document.getElementById("selecionarBebi1").style.borderColor = "#8c060f";
    document.getElementById("selecionarBebi").style.borderColor = "white";
    bebida = "selecionarBebi1";

}

function finalizarPedido(){
    alert("Olá, Seu pedido é: " + prato + ", " + bebida);
}