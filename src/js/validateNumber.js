/* nao deixar o numero ficar menos que zero */

document.querySelector("#qualquer-coisa").addEventListener("input", el => {


	/* Verifica se o valor alterado é menor que 0 */
	if (el.target.value <= parseInt(el.target.getAttribute("min"))) {
		/* Caso seja, define o valor 0 */
		el.target.value = 0;
	}
	else if (el.target.value === parseInt(el.target.getAttribute(""))) {
		el.target.value = 0;
	}
})