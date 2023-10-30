document.getElementById("logout").onclick = function () {
    if (confirm("Deseja mesmo sair do sistema?") == true) {
        window.location.href = "../../controllers/user/logout.php";
    } else {
        location.reload();
    }
};