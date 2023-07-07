//confirmação de deletar produto
function deleteProd(prodId) {
    if (confirm("Deseja deletar o produto " + prodId + "?") == true) {
        window.location.href="../../controllers/products/productController.php?id="+ prodId + "";
    }
}

function deleteUser(userId) {
    if (confirm("Deseja deletar o usuario " + userId + "?") == true) {
        window.location.href="../../controllers/user/userController.php?id="+ userId + "";
    }
}