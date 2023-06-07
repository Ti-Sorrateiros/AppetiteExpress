const btn_cardapio = document.querySelector("button")
const openCard = document.querySelector("dialog")
const closeCard = document.querySelector("dialog")


const toggleModal = () => {
    btn_cardapio.classList.toggle("hide");
}

btn_cardapio.onclick = function(){
    openCard.show()
}

closeCard.onclick = function(){
    openCard.close()
}