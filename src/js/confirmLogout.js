document.getElementById("logout").onclick = function () {
    if (confirm("Deseja mesmo deslogar?") == true) {
        window.location.href = "../controllers/user/logout.php";
    } else {
        window.location.href = "../views/produtos.php";
    }
};
