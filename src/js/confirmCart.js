//Add cart
function clicar(prodId, nomeProd, prodDesc, imgProd, priceProd) {
    if (confirm("Deseja adicionar o Produto ao carrinho?") == true) {
        $.post('carrinho.php', {
            id: prodId,
            nome: nomeProd,
            desc: prodDesc,
            img: imgProd,
            price: priceProd
        }).
        done(function (response) {
                alert('Produto Inserido!!!!');
                $("#mypar").html(response.amount);
            });
    } else {
        window.location.href = "../views/produtos.php";
    }
}
