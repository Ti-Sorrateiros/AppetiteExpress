function buscaCep(){
    let cep = document.getElementById('txtCep').value;
    if((cep !=="")&&(cep.length==8)){
        let url = "https://brasilapi.com.br/api/cep/v1/"+cep;

        let req = new XMLHttpRequest();
        req.open("GET",url);
        req.send();

        //tratar a resposta da requisição 
        req.onload = function(){
            if(req.status === 200){
                let endereco = JSON.parse(req.response);
                document.getElementById("textRua").value = endereco.street; //Rua
                document.getElementById("textBairro").value = endereco.neighborhood; //bairro
                document.getElementById("textEstado").value = endereco.state; //Estado
                document.getElementById("textCidade").value = endereco.city; //Cidade
                
                
                

            }
            else if (req.status === 404){
                alert("CEP inválido");
            }
            else{
                alert("Insira um Cep Valido");
            }
        }

    }
}

window.onload = function(){
    let textCep = document.getElementById("txtCep");
    textCep.addEventListener("blur",buscaCep);
    //blur quando clico fora do campo
}