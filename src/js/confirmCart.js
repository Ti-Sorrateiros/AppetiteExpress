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
                alert('Produto Adicionado com sucesso');
            });
    }
}



// Remover Produto do carrinho
function removerProd(remover) {
    if (confirm("Deseja remover este produto do carrinho?") == true) {
        
        $.post('../controllers/products/cartController.php', { removerProduto: remover })
            .done(function(data) {
                location.reload();  
            });
    }
}